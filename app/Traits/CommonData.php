<?php

namespace App\Traits;


use App\Http\Resources\Frontend\category\CategoryCollection;
use App\Models\Category;
use Illuminate\Http\Response;

trait CommonData
{
    public static function category_tree_list($request=null){
        $categories = Category::isActive()->isParent()->with(['attachment','children'=>function($query){
            return $query->isActive()->with('children');
        }])->get();

        if(!empty($categories)){
            $collection = CategoryCollection::collection($categories);
            return $collection;
        }else{
            return [];
        }
    }
}
