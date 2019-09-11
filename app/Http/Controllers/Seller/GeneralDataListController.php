<?php

namespace App\Http\Controllers\Seller;

use App\Http\Resources\Admin\Category as CategoryResource;
use App\Models\Brand;
use App\Traits\CommonData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralDataListController extends Controller
{
    public function all_category_tree_list(){
        $categories = CommonData::category_tree();
        return CategoryResource::collection($categories);
    }

    public function brand_list(){
        $brands = Brand::isActive()->select('brand_id as id', 'brand_name as text')->latest()->get();
        return response()->json($brands);
    }
}
