<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Traits\ResponserTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public $template_name = 'limitless_v2';
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard(){
        $products = Product::notDelete()->count();
        $cancelOrder= Order::whereIn('order_status', [Order::OrderStatus['Cancel'], Order::OrderStatus['Payment fail']])->sum('total');
        $sale = Order::where('order_status',Order::OrderStatus['Delivered'])->sum('total');
        $user = User::notDelete()->count();
        return view('admin_panel.'.$this->template_name.'.home.index',
        [
            'totalProduct'=>$products,
            'totalCancel'=>$cancelOrder,
            'totalSale'=>$sale,
            'totalUser'=>$user,
        ]);

    }


}
