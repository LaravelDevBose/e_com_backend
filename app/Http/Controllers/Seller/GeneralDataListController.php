<?php

namespace App\Http\Controllers\Seller;

use Exception;
use App\Http\Resources\Admin\Brand as BrandResource;
use App\Http\Resources\Admin\Category as CategoryResource;
use App\Models\Brand;
use App\Traits\CommonData;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GeneralDataListController extends Controller
{
    public function all_category_tree_list(){
        $categories = CommonData::category_tree();
        return CategoryResource::collection($categories);
    }

    public function brand_list(){
        $brands = Brand::isActive()->select('brand_id as id', 'brand_name as text')->latest()->get();
        return response()->json($brands);
    }

    public function brand_req_store(Request $request){
        $validator = Validator::make($request->all(),[
            'brand_name'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $brand = Brand::create([
                    'brand_name'=>$request->brand_name,
                    'trans_brand_name'=>$request->trans_brand_name,
                    'brand_slug'=>Str::slug($request->brnad_name),
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id:null,
                    'brand_status'=> (!empty($request->brand_status))? $request->brand_status:3,
                ]);
                if(!empty($brand)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Brand Store Successfully',$brand);
                }else{
                    throw new Exception('Invalid Information ', Response::HTTP_BAD_REQUEST);
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
}
