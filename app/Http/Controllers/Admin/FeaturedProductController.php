<?php

namespace App\Http\Controllers\Admin;

use App\Models\FeatureInfo;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FeaturedProductController extends Controller
{
    public $route = 'admin.feature_products.';
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    public function latest_deals()
    {
        return view('admin_panel.'.$this->template_name.'.feature_products.latest_deals');
    }

    public function hot_deals()
    {
        return view('admin_panel.'.$this->template_name.'.feature_products.hot_deals');
    }

    public function get_feature_products(Request $request){
        $featuredProducts = FeatureInfo::where('feature_type', $request->feature_type)->with(['featuredProducts'=>function($query){
            return $query->with('product.brand', 'product.category', 'product.singleVariation', 'product.thumbImage')->isActive();
        }])->isActive()->first();

        if(!empty($featuredProducts)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $featuredProducts);
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Group Product Not Found');
        }
    }

    public function edit($id, $type){
        return view('admin_panel.'.$this->template_name.'.feature_products.create_edit',[
            'id'=>$id,
            'type'=>$type
        ]);
    }

    public function update(Request $request, $id)
    {

    }
}
