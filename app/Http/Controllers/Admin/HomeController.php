<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Buyer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard(){
        return view('home.index');
    }

    public function statistics_data(){
        $customers = Buyer::notDelete();
        $thisYearCus = $customers->whereYear('created_at', Carbon::today()->format('Y'))->where('buyer_status', 1)->count();
        $thisMonthCus = $customers->whereMonth('created_at', Carbon::today()->format('m'))->where('buyer_status', 1)->count();
        $totalCus = $customers->where('buyer_status', 1)->count();

        $shops = Shop::notDelete();
        $totalShop = $shops->count();
        $thisYShop = $shops->whereYear('created_at', Carbon::today()->format('Y'))->count();
        $thisMShop = $shops->whereMonth('created_at', Carbon::today()->format('m'))->count();

        $products = Product::notDelete();
        $totalPro = $products->isActive()->count();
        $thisYPro = $products->isActive()->whereYear('created_at', Carbon::today()->format('Y'))->count();
        $thisMPro = $products->whereMonth()->whereYear('created_at', Carbon::today()->format('m'))->count();

        $orders = Order::where('order_status', '!=', 0);
    }
}
