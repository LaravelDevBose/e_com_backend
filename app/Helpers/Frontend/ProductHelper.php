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

class ProductHelper
{
    public static function products_list($request=null){
        $request = (object)$request;
        $products = Product::isActive();


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
