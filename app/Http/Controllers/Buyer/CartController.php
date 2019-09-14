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
        $this->middleware('auth');
    }

    public function cart_details(){

    }

    public function product_add_to_cart(Request $request){
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
                    $carts = Cart::content();
                    return ResponserTrait::singleResponse($cart, 'success', Response::HTTP_OK, 'Product Add To Cart Successfully');
                }else{
                    throw new Exception('Invalid Information!', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('success', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }

    }

    public function product_remove_to_cart(){

    }
}
