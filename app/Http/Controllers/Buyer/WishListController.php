<?php

namespace App\Http\Controllers\Buyer;


use App\Helpers\TemplateHelper;
use App\Http\Resources\Frontend\product\ProductCollection;
use App\Models\Product;
use App\Models\WishList;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WishListController extends Controller
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

    public function wish_lists(){
        $wishListProductIDs = WishList::isActive()->where('buyer_id', auth()->user()->buyer->buyer_id)->pluck('product_id');
        if(empty($wishListProductIDs)){
           return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Wish List is Empty');
        }

        $products = Product::whereIn('product_id', $wishListProductIDs)->isActive()->get();

        if(!empty($products)){
            $collection = ProductCollection::collection($products);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $collection);
        }
    }

    public function add_to_wish_list(Request $request){

        try{
            DB::beginTransaction();
            if(!empty($request->product_slug)){
                $product = Product::where('product_slug', $request->product_slug)->first();
            }

            if(!empty($request->product_id)){
                $product = Product::where('product_id', $request->product_id)->first();
            }

            if(empty($product)){
                throw new \Exception('Product Not Found', Response::HTTP_BAD_REQUEST);
            }

            $wishList = WishList::updateOrCreate(
                [
                    'buyer_id'=>auth()->user()->buyer->buyer_id,
                    'product_id'=> $product->product_id
                ],
                [
                    'status'=>config('app.active')
                ]
            );

            if($wishList){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Product Added To Wish List');
            }else{
                throw new \Exception('Not Added To Wish list', Response::HTTP_BAD_REQUEST);
            }

        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }

    }

    public function remove_from_wish_list(Request $request){
        try{
            DB::beginTransaction();
            if(!empty($request->product_slug)){
                $product = Product::where('product_slug', $request->product_slug)->first();
            }

            if(!empty($request->product_id)){
                $product = Product::where('product_id', $request->product_id)->first();
            }

            if(empty($product)){
                throw new \Exception('Product Not Found', Response::HTTP_BAD_REQUEST);
            }

            $wishList = WishList::updateOrCreate(
                [
                    'buyer_id'=>auth()->user()->buyer->buyer_id,
                    'product_id'=> $product->product_id
                ],
                [
                    'status'=>config('app.inactive')
                ]
            );

            if($wishList){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Product Removed From Wish List');
            }else{
                throw new \Exception('Not Remove From Wish list', Response::HTTP_BAD_REQUEST);
            }

        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
