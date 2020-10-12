<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\ProductHelper;
use App\Http\Resources\Frontend\product\ProductCollection;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\WishList;
use App\Traits\ApiResponser;
use App\Traits\ResponserTrait;
use App\User;
use Cloudinary\Api;
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
    public function cart_list(){
        $carts = $this->cart_content();
        if(!empty($carts)){
            return ApiResponser::SingleResponse($carts,'success', Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'Cart is Empty');
        }
    }

    public function cart_suggested_products()
    {
        if(!empty(Cart::content())){
            $productIds = Arr::pluck(Cart::content(), 'id');
            $cartProducts = Product::whereIn('product_id', $productIds)->get();
            $brandIds = $cartProducts->pluck('brand_id')->toArray();
            $catIds = $cartProducts->pluck('category_id')->toArray();
            $products = Product::where('product_status', config('app.active'))
                ->whereNotIn('product_id', $productIds)
                ->whereIn('category_id', $catIds)
                ->whereIn('brand_id', $brandIds)
                ->with(['variation', 'thumbImage', 'discount'])
                ->take(18)->get();

            $sugProducts = new ProductCollection($products);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK,  $sugProducts);
        }else{
            return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false,'Cart is Empty');
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

                    $productImage = ProductImage::where('product_id', $product->product_id)
                        ->where('color_id', $request->colorId)
                        ->with('attachment')
                        ->first();
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
                        'slug'=> $product->product_slug,
                        'sizeId' => (!empty($request->sizeId))?$request->sizeId:'',
                        'size' => $sizeName,
                        'colorId' => (!empty($request->colorId))?$request->colorId:'',
                        'color' => $colorName,
                        'image'=>$image,
                        'image_id'=>$image_id,
                        'old_price'=>$request->oldPrice,
                        'discount'=>$request->discount,
                    ]
                ];

                $cart = Cart::add($cartProduct);

                if(!empty($cart)){
                    DB::commit();
                    $carts = $this->cart_content();
                    return ApiResponser::AllResponse( 'success', Response::HTTP_OK, true, 'Product Add To Cart Successfully', $carts);
                }else{
                    throw new Exception('Invalid Information!', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ApiResponser::allResponse('error', Response::HTTP_BAD_REQUEST,false, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::ValidationResponse($errors,'validation', Response::HTTP_BAD_REQUEST);
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
                    return ApiResponser::AllResponse( 'success', Response::HTTP_OK, true,'Product Update Cart Successfully', $carts);
                }else{
                    throw new Exception('Invalid Information!', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::ValidationResponse($errors,'validation', Response::HTTP_BAD_REQUEST);
        }
    }
    public function remove_from_cart($rowId){
        try{
            $cartRemove = Cart::remove($rowId);
            if(empty($cartRemove)){
                $carts = $this->cart_content();
                return ApiResponser::AllResponse('success', Response::HTTP_OK, true,'Product Remove From Cart.', $carts);
            }else{
                throw new Exception('Product Not Remove From Cart', Response::HTTP_BAD_REQUEST);
            }

        }catch (Exception $ex){
            return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
        }
    }

    public function cart_destroy(){
        try{
            $carts = Cart::destroy();
            if(empty($carts)){
                return ApiResponser::allResponse('success', Response::HTTP_OK, true,'Cart Destroy Successfully', []);
            }else{
                throw new Exception('Cart Not Destroyed.', Response::HTTP_BAD_REQUEST);
            }
        }catch (Exception $ex){
            return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
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
