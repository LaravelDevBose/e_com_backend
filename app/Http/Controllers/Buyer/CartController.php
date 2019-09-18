<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Product;
use App\Traits\ResponserTrait;
use Exception;
use App\Helpers\TemplateHelper;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
    }

    private function cart_content(){
        return [
            'carts'=>Cart::content(),
            'weight'=>Cart::weight(),
            'qty'=>Cart::count(),
            'subtotal'=>Cart::subtotal(),
            'discount'=>Cart::discount(),
            'total'=>Cart::total(),
        ];
    }
    public function cart_details(){
        $carts = $this->cart_content();
        if(!empty($carts)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $carts);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'Cart is Empty');
        }
    }

    public function add_to_cart(Request $request){
        $validator = Validator::make($request->all(),[
            'id'=>'required',
            'qty'=>'required',
            'price'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $product = Product::where('product_id',$request->id)->with('thumbImage')->first();
                $cartProduct = [
                    'id'=>$request->id,
                    'name'=>$request->name,
                    'qty'=>$request->qty,
                    'price'=>$request->price,
                    'weight'=>0,
                    'options' => [
                        'size' => 'large',
                        'image'=>$product->thumbImage->image_path
                    ]
                ];

                $cart = Cart::add($cartProduct);

                if(!empty($cart)){
                    DB::commit();
                    $carts = $this->cart_content();
                    return ResponserTrait::singleResponse($carts, 'success', Response::HTTP_OK, 'Product Add To Cart Successfully');
                }else{
                    throw new Exception('Invalid Information!', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }

    }

    public function cart_update(Request $request){
        $validator = Validator::make($request->all(),[
            'rowId'=>'required|string',
            'qty'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $cart = Cart::update($request->rowId,$request->qty);

                if(!empty($cart)){
                    DB::commit();
                    $carts = $this->cart_content();
                    return ResponserTrait::singleResponse($carts, 'success', Response::HTTP_OK, 'Product Update Cart Successfully');
                }else{
                    throw new Exception('Invalid Information!', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }
    public function remove_from_cart($rowId){
        try{
            $cartRemove = Cart::remove($rowId);
            if(empty($cartRemove)){
                $carts = $this->cart_content();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Product Remove From Cart.', $carts);
            }else{
                throw new Exception('Product Not Remove From Cart', Response::HTTP_BAD_REQUEST);
            }

        }catch (Exception $ex){
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }

    public function cart_destroy(){
        try{
            $carts = Cart::destroy();
            if(empty($carts)){
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Cart Destroy Successfully', []);
            }else{
                throw new Exception('Cart Not Destroyed.', Response::HTTP_BAD_REQUEST);
            }
        }catch (Exception $ex){
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }

    }
}
