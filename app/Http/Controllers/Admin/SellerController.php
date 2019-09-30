<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buyer;
use App\Models\Order;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class SellerController extends Controller
{
    public $route = 'admin.shop.';

    public function __construct()
    {
        view()->share('route',$this->route);
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $buyers = Buyer::notDelete()->with(['user', 'orders'=>function($query){
                return $query->where('order_status', Order::OrderStatus['Cancel']);
            }])->latest()->paginate(20);

            if(!empty($buyers)){
                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $buyers);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Buyer Found');
            }
        }else{
            return view('buyer.index');
        }
    }
}
