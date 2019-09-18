<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\TemplateHelper;
use App\Models\BillingInfo;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Order;
use App\Models\ShippingInfo;
use App\Models\Size;
use App\Traits\ResponserTrait;
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
        $this->middleware('auth');
    }


    public function order_store(Request $request){
        // TODO check Cart is empty or not
        if(empty(Cart::content())){
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'Your Cart is Empty');
        }
        // TODO check Validation
        $validator = Validator::make($request->all(),[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'phone_no'=>'required|string',
            'address'=>'required|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'postal_code'=>'required|string',
            'country'=>'required|string',
            'address_type'=>'required',
        ]);

        if($validator->passes()){
            // if validation pass
            try{
                DB::beginTransaction();
                // get session cart details
                $carts = Cart::content();
                $buyer = auth()->guard('web')->user()->buyer;
                //store data on order table
                // TODO Check is have any error
                $order = Order::create([
                    'order_no'=>uniqid(),
                    'buyer_id'=>$buyer->buyer_id,
                    'total_qty'=>Cart::count(),
                    'sub_total'=>Cart::subtotal(),
                    'discount'=>$request->discount,
                    'voucher_id'=>$request->voucher_id,
                    'voucher_price'=>$request->voucher_price,
                    'total'=>Cart::total(),
                    'order_date'=>now(),
                    'order_status'=>config('app.active'),
                    'shipping_method'=>$request->shipping_method
                ]);

                if(!empty($order)){
                    $orderItemsArray = [];
                    // get single cart product
                        foreach ($carts as $cart){
                            // get product, brand, size, color details
                            $product = Product::where('product_id',$cart->id)->with('brand')->first();

                            array_push($orderItemsArray,[
                                'order_id'=>$order->order_id,
                                'buyer_id'=>$buyer->buyer_id,
                                'seller_id'=>$product->seller_id,
                                'product_id'=>$product->product_id,
                                'product_name'=>$product->product_name,
                                'size_id'=>(!empty($cart->options->size_id))?$cart->options->size_id:null,
                                'size'=>(!empty($cart->options->size))?$cart->options->size:null,
                                'color_id'=>(!empty($cart->options->color_id))?$cart->options->color_id:null,
                                'color'=>(!empty($cart->options->color))?$cart->options->color:null,
                                'brand_id'=>$product->brand_id,
                                'brand'=>$product->brand->brand_name,
                                'qty'=>$cart->qty,
                                'subtotal'=>($cart->qty*$cart->price),
                                'discount'=>0,
                                'total_price'=>($cart->qty*$cart->price)
                            ]);
                        }

                    // Store order items
                    if(!empty($orderItemsArray)){
                        $orderItems = OrderItem::insert($orderItemsArray);
                    }else{
                        throw new \Exception('Cart Item Not Found.', Response::HTTP_BAD_REQUEST);
                    }

                    if(!empty($orderItems)){
                        // TODO store order billing details
                        $billingInfo = $request->get('billing_address');
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
                            'postal_code'=>$billingInfo->postal_code,
                            'country'=>$billingInfo->country,
                        ]);

                        // TODO store order shipping details
                        $shippingInfo = $request->get('shipping_address');
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
                            'postal_code'=>$shippingInfo->postal_code,
                            'country'=>$shippingInfo->country,
                        ]);
                        // TODO store order payment details

                        // TODO Sent invoice to buyer email address

                        // TODO return buyer panel invoice page
                    }else{
                        throw new \Exception('Order Item Not Insert.', Response::HTTP_BAD_REQUEST);
                    }

                }


                if($address){
                    DB::commit();
                    return ResponserTrait::singleResponse($address, 'success', Response::HTTP_OK,'Address Store Successfully');
                }else{
                    throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
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
}
