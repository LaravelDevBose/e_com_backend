<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\OrderHelper;
use App\Helpers\TemplateHelper;
use App\Models\BillingInfo;
use App\Models\OrderItem;
use App\Models\PaymentInfo;
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

    public function show(Request $request, $order_no){
        $orderInfo = Order::where('order_no', $order_no)->with('buyer.user', 'orderItems.product','orderItems.seller', 'billing', 'shipping', 'payment')->first();

        if($request->ajax()){
            if(!empty($orderInfo)) {
                return ResponserTrait::singleResponse($orderInfo, 'success', Response::HTTP_OK, 'Order Details Found');
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Order Details Not Found');
            }
        }else{
            if(empty($orderInfo)){
                return abort(Response::HTTP_NOT_FOUND);
            }
            return view('template.'.$this->template_name.'.order.show',[
                'order_no'=>$order_no,
            ]);
        }
    }

    public function order_store(Request $request){
        // TODO check Cart is empty or not
        if(empty(Cart::content())){
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'Your Cart is Empty');
        }
        // TODO check Validation
        $validator = Validator::make($request->all(),[
            'billing_address'=>'required|array',
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
                    'shipping_method'=>$request->shipping_method_id
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
                                'brand'=>(!empty($product->brand))?$product->brand->brand_name:'',
                                'price'=>$cart->price,
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
                        $billingInfo = (Object) $request->get('billing_address');

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
                            'postal_code'=>$shippingInfo->postal_code,
                            'country'=>$shippingInfo->country,
                        ]);
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

                        // TODO Sent invoice to buyer email address

                        // TODO return buyer panel invoice page
                        DB::commit();
                        Cart::destroy();
                        //TODO Change to Invoice Page url
                        return ResponserTrait::allResponse('success', Response::HTTP_CREATED, 'Your Order Place Successfully', '', route('buyer.order.index'));
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
}
