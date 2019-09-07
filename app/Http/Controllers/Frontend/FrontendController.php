<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\Product;
use App\Traits\CommonData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    use CommonData;

    public function index(){
        $sliders = CommonData::slider_list();
        return view('frontend.home',[
            'sliders'=>$sliders
        ]);
    }

    public function category_wish_products(){
        return view('frontend.products');
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
