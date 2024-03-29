<?php

namespace App\Http\Controllers\Buyer;

use App\Events\NewOrderStoreEvent;
use App\Events\OnCancelOrderItem;
use App\Helpers\OrderHelper;
use App\Helpers\TemplateHelper;
use App\Models\BillingInfo;
use App\Models\OrderItem;
use App\Models\PaymentInfo;
use App\Models\Product;
use App\Models\Order;
use App\Models\ProductVariation;
use App\Models\ShippingInfo;
use App\Models\Size;
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
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        if(empty($this->template_name)){
            $this->template_name = config('app.default_template');
        }
        $this->middleware('auth');
    }

    public function index(Request $request){
        return view('templates.'.$this->template_name.'.buyer.order.my_orders');
    }

    public function order_list(Request $request){
        $orders = OrderHelper::order_list($request);
        if(!empty($orders)){
            // TODO Order Collection added
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $orders);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_OK, 'No Order Found');
        }
    }

    public function show($order_id){
        $orderInfo = Order::where('order_id', $order_id)->first();
        if(empty($orderInfo)){
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view('templates.'.$this->template_name.'.buyer.order.order_details',[
            'orderId'=>$orderInfo->order_id,
        ]);

    }

    public function Order_details($orderId)
    {
        $orderInfo = Order::where('order_id', $orderId)
            ->with(['buyer.user','billing', 'shipping', 'payment', 'orderItems'=>function($query){
                return $query->with('product', 'seller.shop', 'image');
            } ])->first();

        if(!empty($orderInfo)) {
            return ResponserTrait::singleResponse($orderInfo, 'success', Response::HTTP_OK, 'Order Details Found');
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Order Details Not Found');
        }

    }

    public function order_store(Request $request){
        // TODO check Cart is empty or not
        if(empty(Cart::content())){
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'Your Cart is Empty');
        }
        // TODO check Validation
        $validator = Validator::make($request->all(),[
            'billing_address'=>'array',
            'shipping_address'=>'required|array',
            'shipping_method_id'=>'required',
            'payment_method_id'=>'required',
        ]);

        if($validator->passes()){
            // if validation pass
            try{
                DB::beginTransaction();
                // get session cart details
                $carts = Cart::content();
//                return \response()->json(Cart::subtotal());
                $buyer = auth()->guard('web')->user()->buyer;
                //store data on order table
                // TODO Check is have any error
                $order = Order::create([
                    'order_no'=>uniqid(),
                    'buyer_id'=>$buyer->buyer_id,
                    'total_qty'=>Cart::count(),
                    'sub_total'=>0,
                    'discount'=>$request->discount,
                    'voucher_id'=>$request->voucher_id,
                    'voucher_price'=>$request->voucher_price,
                    'delivery_charge'=>$request->delivery_charge,
                    'total'=>0,
                    'order_date'=>now(),
                    'order_status'=>config('app.active'),
                    'shipping_method'=>(!empty($request->shipping_method_id))?$request->shipping_method_id:1,
                ]);

                if(!empty($order)){
                    $orderItemsArray = [];
                    $productUpdateArray = array();
                    $orderTotal = 0;
                    // get single cart product
                        foreach ($carts as $cart){
                            // get product, brand, size, color details
                            $product = Product::where('product_id',$cart->id)->with('brand', 'singleVariation')->first();
                            if($product->product_type == Product::ProductType['Variation'] && !empty($cart->options->sizeId) && !empty($cart->options->colorId)){
                                $variationProduct = ProductVariation::where('product_id', $cart->id)
                                    ->where('pri_id', $cart->options->colorId)
                                    ->where('sec_id', $cart->options->colorId)->first();
                                $currentQty = $variationProduct->quantity;
                                $variation_id = $variationProduct->variation_id;
                            }else{
                                if($product->product_type === Product::ProductType['Simple']){
                                    $currentQty = $product->product_qty;
                                    $variation_id = '';
                                }else{
                                    $currentQty = $product->singleVariation->quantity;
                                    $variation_id= $product->singleVariation->variation_id;
                                }
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
                                'buyer_id'=>$buyer->buyer_id,
                                'seller_id'=>$product->seller_id,
                                'product_id'=>$product->product_id,
                                'product_name'=>$product->product_name,
                                'size_id'=>$cart->options->sizeId??null,
                                'size'=>$cart->options->size??null,
                                'color_id'=>$cart->options->colorId??null,
                                'color'=>$cart->options->color??null,
                                'brand_id'=>$product->brand_id,
                                'brand'=>(!empty($product->brand))?$product->brand->brand_name:'',
                                'price'=>$cart->price,
                                'qty'=>$cart->qty,
                                'subtotal'=>($cart->qty*$cart->price),
                                'discount'=>0,
                                'total_price'=>($cart->qty*$cart->price),
                                'image_id'=> $cart->options->image_id
                            ]);
                            $orderTotal += ($cart->qty*$cart->price);
                        }

                    // Store order items
                    if(!empty($orderItemsArray)){
                        $orderItems = OrderItem::insert($orderItemsArray);
                    }else{
                        throw new \Exception('Cart Item Not Found.', Response::HTTP_BAD_REQUEST);
                    }

                    if(!empty($orderItems)){

                        // TODO store order billing details
                         $billingInfo = (Object) $request->get('billing_address');
                        if(!empty($request->get('billing_address'))){
                            $billing = BillingInfo::create([
                                'order_id'=>$order->order_id,
                                'buyer_id'=>$buyer->buyer_id,
                                'address_id'=>$request->billing_address_id,
                                'first_name'=>$billingInfo->first_name,
                                'last_name'=>$billingInfo->last_name,
                                'phone_no'=>$billingInfo->phone_no,
                                'address'=>$billingInfo->address,
                                'city'=>$billingInfo->city,
                                'state'=>$billingInfo->state,
                                'district'=>$billingInfo->district,
                                'region'=>$billingInfo->region,
                                'postal_code'=>$billingInfo->postal_code,
                                'country'=>'somalia',
                            ]);

                            if(empty($billing)){
                                throw new \Exception('Order Not Place', Response::HTTP_BAD_REQUEST);
                            }
                        }

                        // TODO store order shipping details
                        $shippingInfo = (Object) $request->get('shipping_address');
                        $shipping = ShippingInfo::create([
                            'order_id'=>$order->order_id,
                            'buyer_id'=>$buyer->buyer_id,
                            'address_id'=>$request->shipping_address_id,
                            'first_name'=>$shippingInfo->first_name,
                            'last_name'=>$shippingInfo->last_name,
                            'phone_no'=>$shippingInfo->phone_no,
                            'address'=>$shippingInfo->address,
                            'city'=>$shippingInfo->city,
                            'state'=>$shippingInfo->state,
                            'district'=>$shippingInfo->district,
                            'region'=>$shippingInfo->region,
                            'postal_code'=>$shippingInfo->postal_code,
                            'country'=>'somalia',
                        ]);

                        if(empty($shipping)){
                            throw new \Exception('Invalid Shipping Information',Response::HTTP_BAD_REQUEST);
                        }

                        // TODO store order payment details
                        $payment = PaymentInfo::create([
                            'order_id'=>$order->order_id,
                            'buyer_id'=>$buyer->buyer_id,
                            'total_price'=>$order->total,
                            'invoice_no'=>uniqid(),
                            'paid_by'=>$request->payment_method_id,
                            'payment_track_id'=>null,
                            'paid_at'=>now(),
                            'payment_status'=>config('app.active'),
                        ]);

                        if(empty($payment)){
                            throw new \Exception('Invalid Payment Information', Response::HTTP_BAD_REQUEST);
                        }

                        // TODO Sent invoice to buyer email address

                        // TODO return buyer panel invoice page

                        ## Product Qty Update
                        foreach ($productUpdateArray as $productInfo){
                            $newQty = $productInfo['curtQty'] - $productInfo['orderQty'];
                            $status = $productInfo['status'];
                            if($newQty<=0){
                                $newQty = 0;
                                $status = Product::ProductStatus['Out of Stock'];
                            }
                            if(!empty($productInfo['variation_id'])){
                                $updateArray = [
                                    'product_status'=>$status
                                ];
                                ProductVariation::where('variation_id', $productInfo['variation_id'])
                                    ->update([
                                        'quantity'=>$newQty,
                                    ]);
                            }else{
                                $updateArray = [
                                    'product_qty'=>$newQty,
                                    'product_status'=>$status
                                ];
                            }
                            Product::where('product_id', $productInfo['id'])->update($updateArray);
                        }
                        $user = User::where('user_id', auth()->id())->with('buyer')->first();
                        event(new NewOrderStoreEvent($user,$order));
                        $order = $order->update([
                            'sub_total'=>$orderTotal,
                            'total'=>$orderTotal+$request->delivery_charge
                        ]);
                        if(!empty($order)){
                            DB::commit();
                            Cart::destroy();
                            //TODO Change to Invoice Page url
                            return ResponserTrait::allResponse('success', Response::HTTP_CREATED, 'Your Order Place Successfully', '', route('buyer.order.index'));
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
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
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
