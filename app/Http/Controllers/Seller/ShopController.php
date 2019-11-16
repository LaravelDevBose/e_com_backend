<?php

namespace App\Http\Controllers\Seller;

use App\Helpers\TemplateHelper;
use App\Models\Seller;
use App\Models\Shop;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public $seller_template;

    public function __construct()
    {
        $this->seller_template = TemplateHelper::sellerTemplate();
        if(empty($this->seller_template)){
            $this->seller_template = config('app.seller_template');
        }
        $this->middleware('auth:seller');
    }

    public function shop_setting_page(Request $request){

        if($request->ajax()){
            $shopInfo = Shop::where('seller_id', auth()->guard('seller')->user()->seller->seller_id)->with('shopLogo', 'banner')->first();
            if(!empty($shopInfo)){
                return ResponserTrait::singleResponse($shopInfo, 'success', Response::HTTP_OK);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'Shop Details Not Found');
            }
        }
        return view('seller_panel.'.$this->seller_template.'.shop.shop_details');
    }

    public function shop_setting_update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'shop_name'=>'required|string',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $seller = Seller::where('seller_id', auth()->guard('seller')->user()->seller->seller_id)->first();
                $shop = Shop::updateOrCreate(

                        ['seller_id'=>$seller->seller_id],
                        [
                            'shop_name'=>$request->shop_name,
                            'shop_slug'=>Str::slug($request->shop_slug),
                            'shop_address'=>$request->shop_address,
                            'phone_no'=>$request->phone_no,
                            'shop_email'=>$request->shop_email,
                        ]
                    );

                if(!empty($request->logo_id)){
                    $shop = $shop->update([
                        'logo_id'=>$request->logo_id,
                    ]);
                }
                if(!empty($shop)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Shop Details update Successfully');
                }else{
                    throw new \Exception('Error Found. Shop Details Not Updated', Response::HTTP_BAD_REQUEST);
                }

            }catch (\Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }

    public function shop_banner_update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'banner_id'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $seller = Seller::where('seller_id', auth()->guard('seller')->user()->seller->seller_id)->first();
                $shop = Shop::updateOrCreate(

                    ['seller_id'=>$seller->seller_id],
                    [
                        'banner_id'=>$request->banner_id,
                    ]
                );

                if(!empty($shop)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Shop Banner update Successfully');
                }else{
                    throw new \Exception('Error Found. Shop Banner Not Updated', Response::HTTP_BAD_REQUEST);
                }

            }catch (\Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }
}
