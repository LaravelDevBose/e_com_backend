<?php

namespace App\Http\Controllers\Buyer;

use App\Events\NewOrderStoreEvent;
use App\Events\OnCancelOrderItem;
use App\Helpers\OrderHelper;
use App\Http\Resources\Frontend\order\OrderCollection;
use App\Http\Resources\Frontend\order\OrderResource;
use App\Models\CouponCode;
use App\Models\DeliveryMethod;
use App\Models\OrderItem;
use App\Models\PaymentInfo;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductVariation;
use App\Models\ShippingInfo;
use App\Models\UsedCoupon;
use App\Traits\ApiResponser;
use App\Traits\ResponserTrait;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function order_list(Request $request){
        $orders = Order::with( 'shipping')->where('user_id', $request->user()->user_id)->latest();
        $list = ApiResponser::MakeCollectionResponse($request, $orders);
        if(!empty($list)){
            $coll = new OrderCollection($list);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('error', Response::HTTP_OK, false, 'No Order Found');
        }
    }


    public function Order_details($orderNo)
    {
        $orderInfo = Order::where('order_no', $orderNo)
            ->with(['user','shipping', 'payment', 'deliveryMethod', 'orderItems'=>function($query){
                return $query->with('product', 'image');
            }])->first();

        if(!empty($orderInfo)) {
            $data = new OrderResource($orderInfo);
            return ApiResponser::SingleResponse($data, 'success', Response::HTTP_OK, true);
        }else{
            return ApiResponser::AllResponse('error', Response::HTTP_NOT_FOUND, false,'Order Details Not Found');
        }

    }

    public function order_store(Request $request){
        // TODO check Cart is empty or not
        if(empty(Cart::content())){
            return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false, 'Your Cart is Empty');
        }
        // TODO check Validation
        $validator = Validator::make($request->all(),[
            'shipping_info'=>'required',
            'delivery_method_id'=>'required',
            'shipping_info.first_name'=>'required|string',
            'shipping_info.phone_no'=>'required|string',
            'shipping_info.address'=>'required|string',
            'shipping_info.postal_code'=>'required|integer',
        ], [
            'shipping_info.required'=>'Shipping Information is required',
            'delivery_method_id.required'=>'Delivery Method is required',
            'shipping_info.first_name.required'=>'Shipping First Name is required',
            'shipping_info.phone_no.required'=>'Shipping Phone No is required',
            'shipping_info.address.required'=>'Shipping Address is required',
            'shipping_info.postal_code.required'=>'Shipping Postal Code is required',

            'shipping_info.first_name.string'=>'Shipping First Name Must string',
            'shipping_info.phone_no.string'=>'Shipping Phone No Must string',
            'shipping_info.address.string'=>'Shipping Address Must string',
            'shipping_info.postal_code.integer'=>'Shipping Postal Code Must Number',
        ]);

        if($validator->passes()){
            // if validation pass
            try{
                DB::beginTransaction();
                // get session cart details
                $carts = Cart::content();

                //get Selected Delivery Information
                $deliveryMethod = DeliveryMethod::where('delivery_id', $request->delivery_method_id)->first();
                if (empty($deliveryMethod)){
                    throw new \Exception('Invalid Delivery Information', Response::HTTP_BAD_REQUEST);
                }
                $orderTotal = Cart::total();
                $discount = 0;
                if (!empty($request->coupon_id)){
                    $coupon = CouponCode::where('coupon_id', $request->coupon_id)->first();
                    if (empty($coupon)){
                        throw new \Exception('Invalid Coupon Information', Response::HTTP_BAD_REQUEST);
                    }else{
                        $discount = $coupon->coupon_amount;
                        $orderTotal = $orderTotal - $coupon->coupon_amount;
                    }
                }

                //store data on order table
                // TODO Check is have any error
                $order = Order::create([
                    'order_no'=>Order::order_no_generate(),
                    'user_id'=>$request->user()->user_id,
                    'total_qty'=>Cart::count(),
                    'sub_total'=>Cart::subtotal(),
                    'discount'=>$discount,
                    'total'=>$orderTotal+$deliveryMethod->cost_price,
                    'delivery_charge'=>$deliveryMethod->cost_price,
                    'delivery_method_id'=>$request->delivery_method_id,
                    'order_date'=>now(),
                    'order_status'=>Order::OrderStatus['Un-paid'],
                ]);

                if(!empty($order)){
                    $orderItemsArray = [];
                    $productUpdateArray = array();
                    // get single cart product
                    foreach ($carts as $cart){
                        // get product, brand, size, color details
                        $product = Product::where('product_id',$cart->id)->with('brand', 'variation')->first();
                        if($product->product_type == Product::ProductType['Variation'] && !empty($cart->options->sizeId) && !empty($cart->options->colorId)){
                            $variationProduct = ProductVariation::where('product_id', $cart->id)
                                ->where('color_id', $cart->options->colorId)
                                ->where('size_id', $cart->options->colorId)->first();
                            $currentQty = $variationProduct->quantity;
                            $variation_id = $variationProduct->variation_id;
                            $sellerSku = $variationProduct->seller_sku;
                        }else{
                            $currentQty = $product->variation->quantity;
                            $variation_id= $product->variation->variation_id;
                            $sellerSku = $product->variation->seller_sku;
                        }

                        array_push($productUpdateArray,[
                            'id'=>$product->product_id,
                            'curtQty'=>$currentQty,
                            'orderQty'=>$cart->qty,
                            'variation_id'=>$variation_id,
                            'status'=>$product->product_status,
                        ]);
                        array_push($orderItemsArray,[
                            'order_id'=>$order->order_id,
                            'user_id'=>$request->user()->user_id,
                            'seller_id'=>$product->seller_id,
                            'seller_sku'=>$sellerSku??null,
                            'product_id'=>$product->product_id,
                            'product_name'=>$product->product_name,
                            'size_id'=>$cart->options->sizeId??null,
                            'color_id'=>$cart->options->colorId??null,
                            'price'=>$cart->price,
                            'qty'=>$cart->qty,
                            'subtotal'=>($cart->options->old_price > 0)?($cart->qty*$cart->options->old_price): ($cart->qty*$cart->price),
                            'discount'=>$cart->options->discount * $cart->qty,
                            'total_price'=>($cart->qty*$cart->price),
                            'image_id'=> $cart->options->image_id
                        ]);
                    }

                    // Store order items
                    if(!empty($orderItemsArray)){
                        $orderItems = OrderItem::insert($orderItemsArray);
                    }else{
                        throw new \Exception('Cart Item Not Found.', Response::HTTP_BAD_REQUEST);
                    }

                    if(!empty($orderItems)){
                        // TODO store order shipping details
                        $shippingInfo = (Object) $request->get('shipping_info');
                        $shipping = ShippingInfo::create([
                            'order_id'=>$order->order_id,
                            'user_id'=>$request->user()->user_id,
                            'first_name'=>$shippingInfo->first_name,
                            'last_name'=>$shippingInfo->last_name,
                            'phone_no'=>$shippingInfo->phone_no,
                            'address'=>$shippingInfo->address,
                            'district'=>$shippingInfo->district,
                            'region'=>$shippingInfo->division,
                            'postal_code'=>$shippingInfo->postal_code
                        ]);

                        if(empty($shipping)){
                            throw new \Exception('Invalid Shipping Information',Response::HTTP_BAD_REQUEST);
                        }

                        if (!empty($request->coupon_id)){
                            UsedCoupon::create([
                                'coupon_id'=>$request->coupon_id,
                                'order_id'=>$order->order_id,
                                'user_id'=>$request->user()->user_id,
                                'coupon_amount'=> $discount,
                            ]);
                        }


                        $user = User::where('user_id', $request->user()->user_id)->first();
                        event(new NewOrderStoreEvent($user, $order, $productUpdateArray));
                        if(!empty($order)){
                            DB::commit();
                            Cart::destroy();
                            $data = new OrderResource($order);
                            return ApiResponser::AllResponse('success',
                                Response::HTTP_CREATED,
                                true,
                                'Your Order Place Successfully',
                                $data
                            );
                        }else{
                            throw new \Exception('Order Not Place. Try Again.', Response::HTTP_BAD_REQUEST);
                        }

                    }else{
                        throw new \Exception('Order Item Not Insert.', Response::HTTP_BAD_REQUEST);
                    }

                }else{
                    throw new \Exception('Order Not Place.Error Found.', Response::HTTP_BAD_REQUEST);
                }

            }catch (\Exception $ex){
                DB::rollBack();
                return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::validationResponse($errors,'validation', Response::HTTP_BAD_REQUEST);
        }
    }

    public function order_item_cancel($item_id)
    {
        try {
            DB::beginTransaction();

            $orderItem = OrderItem::where('item_id',$item_id)->first();
            $orderId = $orderItem->order_id;
            if(empty($orderItem)){
                throw new \Exception('Invalid Order Item Information', Response::HTTP_NOT_FOUND);
            }
            if(!empty($orderItem) && $orderItem->item_status !== OrderItem::ItemStatus['Active']){
                throw new \Exception('Not able To Cancel. Contract With Admin.', Response::HTTP_NOT_ACCEPTABLE);
            }

            $orderItem = $orderItem->update([
                'item_status'=>OrderItem::ItemStatus['Cancel'],
                'cancel_by'=>OrderItem::CancelBy['Buyer'],
            ]);

            if(!empty($orderItem)){
                ## TODO Order History Added,
                ## TODO Check if All Item Are Cancel then update the order status as Cancel
                event(new OnCancelOrderItem($item_id));
                $notCancelItem = OrderItem::where('order_id', $orderId)->where('item_status', '!=', OrderItem::ItemStatus['Cancel'])->count();
                if($notCancelItem == 0){
                    $order = Order::where('order_id', $orderId)
                        ->update([
                            'order_status'=>Order::OrderStatus['Cancel'],
                        ]);
                    if(empty($order)){
                        throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                    }
                }
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Order Item Cancel Successfully');
            }else{
                throw new \Exception('Some Error Found. Try Again.', Response::HTTP_BAD_REQUEST);
            }
        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
        }
    }

    public function order_cancel($orderId)
    {
        try {
            DB::beginTransaction();

            $order = Order::where('order_id', $orderId)->with('orderItems')->first();

            if(empty($order)){
                throw new \Exception('Invalid Order Information', Response::HTTP_NOT_FOUND);
            }
            if(!empty($order) && $order->order_status !== Order::OrderStatus['Active']){
                throw new \Exception('Not able To Cancel This. Contract With Admin.', Response::HTTP_NOT_ACCEPTABLE);
            }
            $totalOrderItem = $order->orderItems->count();
            $itemStatus = $order->orderItems->where('item_status', OrderItem::ItemStatus['Active'])->count();

            if($totalOrderItem !== $itemStatus){
                throw new \Exception('Not Able To Cancel this Order. Contract With Admin.', Response::HTTP_NOT_ACCEPTABLE);
            }
            $order = $order->update([
                'order_status'=>Order::OrderStatus['Cancel'],
            ]);

            if(!empty($order)){
                $activeItems = OrderItem::where('order_id', $orderId)->where('item_status', OrderItem::ItemStatus['Active'])->get();
                foreach ($activeItems as $item){
                    event(new OnCancelOrderItem($item->item_id)); // Update Product qty if cancel order
                }
                $items = $activeItems->update([
                    'item_status'=>OrderItem::ItemStatus['Cancel'],
                    'cancel_by'=>OrderItem::CancelBy['Buyer'],
                ]);
                if(!empty($items)){
                    ## TODO ADd Order History
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Order Item Cancel Successfully');
                }else{
                    throw new \Exception('Some Error Found. Try Again.', Response::HTTP_BAD_REQUEST);
                }
            }else{
                throw new \Exception('Some Error Found. Try Again.', Response::HTTP_BAD_REQUEST);
            }
        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
        }
    }
}
