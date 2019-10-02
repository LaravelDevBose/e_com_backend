<?php
/**
 * Created by PhpStorm.
 * User: tokin
 * Date: 9/7/2019
 * Time: 5:45 PM
 */


namespace App\Helpers\Frontend;


use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;

class ProductHelper
{
    public static function products_list($request=null){
        $request = (object)$request;
        $products = Product::isActive()->with(['brand', 'category', 'thumbImage', 'singleVariation']);


        if(!empty($request->category_id)){
            $categoriesID = array();
            $firstArray = [(int)$request->category_id];
            $categoriesID= array_merge($categoriesID,$firstArray);
            $category = Category::isActive()->with('children')->where('category_id', $request->category_id)->first();
            if(!empty($category->children)){
                $childIds = Category::where('parent_id', $category->category_id)->isActive()->with('children')->pluck('category_id')->toArray();
                $categoriesID= array_merge($categoriesID, $childIds);
                if(!empty($childIds->children)){
                    $childId = Category::where('parent_id', $category->category_id)->isActive()->pluck('category_id')->toArray();
                    $categoriesID= array_merge($categoriesID, $childId);
                }
            }
            $products = $products->whereIn('category_id', $categoriesID);
        }


        if(!empty($request->brand_id)){
            $products = $products->where('brand_id', $request->brand_id);
        }

        if(!empty($request->brandIds) && is_array($request->brandIds)){
            $products = $products->whereIn('brand_id', $request->brandIds);
        }

        // TODO Product Sorting Recheck and more efficient
        if(!empty($request->sorting) && $request->sorting == 'yes'){
            $productIds = $products->pluck('product_id');
            return $varProIds = ProductVariation::whereIn('product_id', $productIds)->get();


            $varProIds = $varProIds->reject(function ($product,$request){
                $colorIds = $request->colorIds;
                $sizeIds = $request->sizeIds;
                if($product->pri_model == 1 && $product->pri_model == 2){
                    if(!in_array($product->pri_id, $colorIds) && !in_array($product->sec_id, $sizeIds)){
                        return $product;
                    }
                }else if($product->pri_model == 2 && $product->pri_model == 1){
                    if(!in_array($product->pri_id, $sizeIds) && !in_array($product->sec_id, $colorIds)){
                        return $product;
                    }
                }
            });

            $varProIds = $varProIds->pluck('product_id');
            $products = $products->whereIn('product_id', $varProIds);
        }

        if(!empty($request->product_id)){
            $products = $products->where('product_id', '!=', $request->product_id);
        }

        if(!empty($request->productIds)){
            $products = $products->whereNotIn('product_id', $request->productIds);
        }

        if(!empty($request->order_by)){
            if(!empty($request->sort_column)){
                $products = $products->orderBy($request->sort_column, $request->order_by);
            }else{
                $products = $products->orderBy('product_id', $request->order_by);
            }
        }

        if(!empty($request->take)){
            $products= $products->take($request->take);
        }

        if(!empty($request->paginate)){
            $products = $products->paginate($request->paginate);
        }else{
            $products = $products->get();
        }

        return $products;

    }
}
