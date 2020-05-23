<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\Frontend\ProductHelper;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\WishList;
use App\Traits\ResponserTrait;
use App\User;
use Exception;
use App\Helpers\TemplateHelper;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        if(empty($this->template_name)){
            $this->template_name = config('app.default_template');
        }
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

    public function cart_suggested_products()
    {
        if(!empty(Cart::content())){
            $productIds = Arr::pluck(Cart::content(), 'id');
            $cartProducts = Product::whereIn('product_id', $productIds)->get();
            $reqData = [
                'productIds'=>$productIds,
                'productIdsType'=>'remove',
                'brandIds'=>$cartProducts->pluck('brand_id')->toArray(),
                'categoryIds'=>$cartProducts->pluck('category_id')->toArray(),
                'take'=>8
            ];
            $sugProducts = ProductHelper::products_list($reqData);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $sugProducts);
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
                if(empty($product)){
                    throw new Exception('Invalid Product Information', Response::HTTP_NOT_FOUND);
                }

                if(Auth::check()){
                    if(Auth::user()->account_type == User::AccountType['seller'] || Auth::user()->is_seller == 1){
                        throw new Exception("Using Seller Account You Con't Buy Product", Response::HTTP_BAD_REQUEST);
                    }

                    if(Auth::user()->account_type == User::AccountType['both'] && Auth::user()->seller->seller_id == $product->seller_id) {
                        throw new Exception("You Are the Owner this Product. You Con't Buy Product", Response::HTTP_BAD_REQUEST);
                    }
                }

                $image_id = $product->thumbImage->attachment_id;
                $image = $product->thumbImage->image_path;

                $colorName = '';
                $sizeName = '';
                if($product->product_type == 2){
                    if(!empty($request->colorId)){
                        $colorName = Color::where('color_id', $request->colorId)->value('color_name');
                    }
                    if(!empty($request->sizeId)){
                        $sizeName = Size::where('size_id', $request->sizeId)->value('size_name');
                    }

                    $productImage = ProductImage::where('product_id', $product->product_id)->where('pri_id', $request->colorId)->with('attachment')->first();
                    if (!empty($productImage)) {
                        $image_id = $productImage->attachment_id;
                        $image = $productImage->attachment->image_path;
                    }

                }
                $cartProduct = [
                    'id'=>$request->id,
                    'name'=>$product->product_name,
                    'qty'=>$request->qty,
                    'price'=>$request->price,
                    'weight'=>0,
                    'options' => [
                        'sizeId' => (!empty($request->sizeId))?$request->sizeId:'',
                        'size' => $sizeName,
                        'colorId' => (!empty($request->colorId))?$request->colorId:'',
                        'color' => $colorName,
                        'image'=>$image,
                        'image_id'=>$image_id
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

    public function wishList_to_cart_all_products()
    {
        if(auth()->guard('web')->check()){
            try{
                $wishlists = WishList::isActive()->with(['product'=>function($query){
                     return $query->isActive()->with('thumbImage', 'singleVariation');
                }])->where('buyer_id', auth()->guard('web')->user()->buyer->buyer_id)->get();

                if(empty($wishlists)){
                    throw new Exception('Your Wish List is Empty', Response::HTTP_BAD_REQUEST);
                }
                $cartArray = array();

                foreach ($wishlists as $wishlist){
                    if(!empty($wishlist->product)){
                        $colorName = '';
                        $sizeName = '';
                        if($wishlist->product->product_type == 2){
                            if(!empty($wishlist->product->singleVariation->pri_id)){
                                $colorName = Color::where('color_id', $wishlist->product->singleVariation->pri_id)->value('color_name');
                            }
                            if(!empty($wishlist->product->singleVariation->sec_id)){
                                $sizeName = Size::where('size_id', $wishlist->product->singleVariation->sec_id)->value('size_name');
                            }
                        }

                        $cartProduct = [
                            'id'=>$wishlist->product->product_id,
                            'name'=>$wishlist->product->product_name,
                            'qty'=>1,
                            'price'=>($wishlist->product->product_type == 1)? $wishlist->product->product_price : $wishlist->product->singleVariation->price,
                            'weight'=>0,
                            'options' => [
                                'sizeId' => ($wishlist->product->product_type == 2)? $wishlist->product->singleVariation->sec_id:'',
                                'size' => $sizeName,
                                'colorId' => ($wishlist->product->product_type == 2)? $wishlist->product->singleVariation->pri_id:'',
                                'color' => $colorName,
                                'image'=>$wishlist->product->thumbImage->image_path
                            ]
                        ];
                        array_push($cartArray, $cartProduct);
                    }
                }

                if(!empty($cartArray)){
                    $cart = Cart::add($cartArray);

                    if(!empty($cart)){
                        DB::commit();
                        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Wish list Products Add To Cart Successfully', '', route('front.cart'));
                    }else{
                        throw new Exception('Invalid Information!', Response::HTTP_BAD_REQUEST);
                    }
                }else{
                    throw new Exception('Invalid Cart Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_UNAUTHORIZED, 'Unauthorized Request.', '', route('login'));
        }

    }
}
