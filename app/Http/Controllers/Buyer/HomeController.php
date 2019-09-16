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

class HomeController extends Controller
{
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        $this->middleware('auth');
    }

    public function index(){

        return view('templates.'.$this->template_name.'.buyer.home.dashboard');
    }
    public function account_information(){

        return view('templates.'.$this->template_name.'.buyer.account_information');
    }
    public function edit_contact_info(){

        return view('templates.'.$this->template_name.'.buyer.home.dashboard');
    }
    public function change_password(){

        return view('templates.'.$this->template_name.'.buyer.home.dashboard');
    }
    public function my_orders(){

        return view('templates.'.$this->template_name.'.buyer.my_orders');
    }
    public function my_product_reviews(){

        return view('templates.'.$this->template_name.'.buyer.my_product_reviews');
    }
    public function my_wishlist(){

        $wishListProductIDs = WishList::isActive()->where('buyer_id', auth()->id())->pluck('product_id');
        $products = Product::whereIn('product_id', $wishListProductIDs)->isActive()->get();

        return view('templates.'.$this->template_name.'.buyer.my_wishlist',[
            'products'=>$products,
        ]);
    }


}
