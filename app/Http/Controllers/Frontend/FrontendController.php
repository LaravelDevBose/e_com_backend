<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Frontend\ProductHelper;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Traits\CommonData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FrontendController extends Controller
{
    use CommonData;

    public function index(){
        $sliders = CommonData::slider_list();
        return view('frontend.home',[
            'sliders'=>$sliders
        ]);
    }

    public function category_wish_products($category_slug){
        $category = Category::where('category_slug', $category_slug)->firstOrFail();

        if(empty($category)){
            return abort(Response::HTTP_NOT_FOUND);
        }

        $req['category_id']=$category->category_id;

        $products = ProductHelper::products_list($req);
        return view('frontend.products',[
            'category'=>$category,
            'categories'=>CommonData::category_tree(),
            'brands'=>CommonData::brand_list(),
            'colors'=> CommonData::color_list(),
            'tags'=> CommonData::tag_list(),
            'sizes'=> CommonData::size_list($req),
            'products'=>$products
        ]);
    }

    public function product_details(Product $product){
        return view('frontend.product');
    }

    public function checkout(){
        return view('frontend.checkout');
    }

    public function cart_page(){
        return view('frontend.cart');
    }

    public function general_pages(Page $page){
        return view('frontend.pages');
    }

    public function contact_pages(){
        return view('frontend.contact');
    }
}
