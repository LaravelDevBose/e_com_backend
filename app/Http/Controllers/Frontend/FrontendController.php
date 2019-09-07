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

    public function product_details($slug){
        $product = Product::where('product_slug', $slug)
                ->with(['brand', 'category', 'productDetails','variations','productImages','singleVariation','thumbImage'])
            ->firstOrFail();
        if(empty($product)){
            return abort(Response::HTTP_NOT_FOUND);
        }

        return view('frontend.product',[
            'product'=>$product,
        ]);
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function cart_page(){
        return view('frontend.cart');
    }

    public function general_pages($page_slug){
        $page = Page::isActive()->where('page_slug', $page_slug)->firstOrFail();

        if(empty($page)){
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view('frontend.pages',[
            'page'=>$page,
            'pagesMenuList'=>CommonData::pages_menu_list(),
        ]);
    }

    public function contact_pages(){
        return view('frontend.contact');
    }

    public function userDashboard()
    {
        return view('frontend.user_dashboard.dashboard');
    }
}
