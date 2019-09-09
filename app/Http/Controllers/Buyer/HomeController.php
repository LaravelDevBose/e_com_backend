<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('buyer.home.dashboard');
    }
    public function account_information(){

        return view('buyer.account_information');
    }
    public function edit_contact_info(){

        return view('buyer.home.dashboard');
    }
    public function change_password(){

        return view('buyer.home.dashboard');
    }
    public function address_book(){

        return view('buyer.address_book');
    }
    public function my_orders(){

        return view('buyer.my_orders');
    }
    public function my_product_reviews(){

        return view('buyer.my_product_reviews');
    }
    public function my_wishlist(){

        return view('buyer.my_wishlist');
    }


}
