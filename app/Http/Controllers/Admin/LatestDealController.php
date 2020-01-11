<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Resources\Admin\LatestDealResource;
use App\Models\LatestDeal;
use App\Models\LatestDealProduct;
use App\Models\Product;
use App\Traits\ResponserTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LatestDealController extends Controller
{
    public $route = 'admin.brand.';
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    public function latest_deal_page()
    {
        return view('admin_panel.'.$this->template_name.'.latest_deal.create');
    }

    public function latest_deal_data(){
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
        $validator = Validator::make($request->all(),[
            'start_time'=>'required',
            'end_time'=>'required',
            'productIds'=>'array',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $latestDeal = LatestDeal::where('status', config('app.active'))->first();

                if(empty($latestDeal)){
                    $latestDeal = LatestDeal::create([
                        'start_time'=>Carbon::parse($request->start_time)->format('Y-m-d H:i:s'),
                        'end_time'=>Carbon::parse($request->end_time)->format('Y-m-d H:i:s'),
                        'status'=> config('app.active')
                    ]);
                    $latest_deal_id = $latestDeal->latest_deal_id;
                }else{
                    $latest_deal_id = $latestDeal->latest_deal_id;
                    $latestDeal = $latestDeal->update([
                        'start_time'=>Carbon::parse($request->start_time)->format('Y-m-d H:i:s'),
                        'end_time'=>Carbon::parse($request->end_time)->format('Y-m-d H:i:s'),
                        'status'=> config('app.active')
                    ]);
                }

                if(!empty($latestDeal)){

                    if(!empty($request->productIds)){
                        $dealProductArray = array();
                        foreach ($request->productIds as $key=> $productId){
                            $product = Product::where('product_id', $productId)->first();
                            if(!empty($product)){
                                array_push($dealProductArray,[
                                    'latest_deal_id'=>$latest_deal_id,
                                    'product_id'=>$productId,
                                    'status'=>config('app.active'),
                                ]);
                            }
                        }

                        if(empty($dealProductArray)){
                            throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                        }

                        $dealProduct = LatestDealProduct::insert($dealProductArray);
                        if(empty($dealProduct)){
                            throw new Exception('Selected Product Not Store Try Again', Response::HTTP_BAD_REQUEST);
                        }
                    }

                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Latest Deal Information Updated');

                }else{
                    throw new Exception('Invalid Latest Deal Information', Response::HTTP_BAD_REQUEST);
                }
            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }

    public function deal_product_remove($dealId)
    {
        try{
            DB::beginTransaction();

            $dealProduct = LatestDealProduct::where('id', $dealId)->first();

            if(empty($dealProduct)){
                throw new Exception('Invalid Deal Product Information', Response::HTTP_BAD_REQUEST);
            }

            $dealProduct = $dealProduct->update([
                'status'=>config('app.delete'),
            ]);

            if(!empty($dealProduct)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Deleted Successfully');
            }else{
                throw new Exception('Delete Unsuccessful', Response::HTTP_BAD_REQUEST);
            }

        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
