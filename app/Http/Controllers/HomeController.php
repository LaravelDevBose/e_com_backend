<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function general_pages($page_slug){
        return view('front.pages',[
            'page_slug'=>$page_slug
        ]);
    }

    public function category_wish_products($categoryId){
        $credentials = array(
            'category_id'=>$categoryId,
            'brand_id'=>null,
            'color_id'=>null,
            'tag_id'=>null,
            'size_id'=>null
        );

        return view('front.products',[
            'credentials'=>json_encode($credentials),
        ]);
    }

    public function product_details($slug){
        return view('front.product',[
            'slug'=>$slug
        ]);
    }

    public function cors_option_req()
    {
        return response(['status' => 'success']);
    }
}
