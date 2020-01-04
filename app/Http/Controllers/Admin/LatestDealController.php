<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\LatestDealResource;
use App\Models\LatestDeal;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LatestDealController extends Controller
{
    public $route = 'admin.brand.';
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    public function create()
    {
        return view('admin_panel.'.$this->template_name.'.latest_deal.create');
    }

    public function latest_deal_products(){
        $latestDeal = LatestDeal::where('status', config('app.active'))->with('deal_products.product')->first();
        if(!empty($latestDeal)){
            $data = new LatestDealResource($latestDeal);
            return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('Error', Response::HTTP_NOT_FOUND, 'No Latest Deal Information Found');
        }
    }

    public function store_update_latest_deal(Request $request)
    {

    }
}
