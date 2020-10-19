<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Product;
use App\Models\WishList;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Frontend\product\ProductCollection;

class WishListController extends Controller
{

    public function wish_lists(Request  $request){
        $wishListProductIDs = WishList::isActive()->where('user_id', $request->user()->user_id)->pluck('product_id');
        if(empty($wishListProductIDs)){
           return ApiResponser::AllResponse('success', Response::HTTP_OK, false, 'Wish List is Empty');
        }

        $products = Product::whereIn('product_id', $wishListProductIDs)
            ->with(['thumbImage', 'brand', 'discount'])->isActive()->get();

        if(!empty($products)){
            $collection = new ProductCollection($products);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $collection);
        }

        return ApiResponser::AllResponse('success', Response::HTTP_OK, false, 'Wish List is Empty');
    }

    public function add_to_wish_list(Request $request, $slug){

        try{
            DB::beginTransaction();
            if(!empty($slug)){
                $product = Product::where('product_slug', $slug)->first();
            }

            if(!empty($request->product_id)){
                $product = Product::where('product_id', $request->product_id)->first();
            }

            if(empty($product)){
                throw new \Exception('Product Not Found', Response::HTTP_BAD_REQUEST);
            }

            $wishList = WishList::updateOrCreate(
                [
                    'user_id'=>$request->user()->user_id,
                    'product_id'=> $product->product_id
                ],
                [
                    'status'=>config('app.active')
                ]
            );

            if(!empty($wishList)){
                $wishlist = WishList::where('user_id', $request->user()->user_id)->where('status',config('app.active'))->pluck('product_id');
                DB::commit();
                return ApiResponser::AllResponse('success', Response::HTTP_OK, true, 'Product Added To Wish List', $wishlist);
            }else{
                throw new \Exception('Not Added To Wish list', Response::HTTP_BAD_REQUEST);
            }

        }catch (\Exception $ex){
            DB::rollBack();
            return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
        }

    }

    public function remove_from_wish_list(Request $request, $slug){
        try{
            DB::beginTransaction();
            if(!empty($slug)){
                $product = Product::where('product_slug', $slug)->first();
            }

            if(!empty($request->product_id)){
                $product = Product::where('product_id', $request->product_id)->first();
            }

            if(empty($product)){
                throw new \Exception('Product Not Found', Response::HTTP_BAD_REQUEST);
            }

            $wishList = WishList::updateOrCreate(
                [
                    'user_id'=>$request->user()->user_id,
                    'product_id'=> $product->product_id
                ],
                [
                    'status'=>config('app.inactive')
                ]
            );

            if(!empty($wishList)){
                $wishlist = WishList::where('user_id', $request->user()->user_id)->where('status',config('app.active'))->pluck('product_id');
                DB::commit();
                return ApiResponser::AllResponse('success', Response::HTTP_OK, true, 'Product Removed From Wish List', $wishlist);
            }else{
                throw new \Exception('Not Remove From Wish list', Response::HTTP_BAD_REQUEST);
            }

        }catch (\Exception $ex){
            DB::rollBack();
            return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
        }
    }
}
