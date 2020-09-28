<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\CouponCodeCollection;
use App\Http\Resources\Admin\CouponCodeResource;
use App\Models\CouponCode;
use App\Traits\ResponserTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class CouponCodeController extends Controller
{
    public $template_name = 'limitless_v2';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin_panel.'.$this->template_name.'.coupon.index');

    }

    public function coupon_code_list(){
        $couponCodes = CouponCode::notDelete()->with('attachment')->latest()->get();
        return new CouponCodeCollection($couponCodes);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'coupon_title'=>'required|string',
            'coupon_code'=>'required|string|min:6',
            'coupon_amount'=>'required|integer|min:0|not_in:0',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $code = CouponCode::create([
                    'coupon_title'=>$request->coupon_title,
                    'coupon_code'=>$request->coupon_code,
                    'coupon_amount'=>$request->coupon_amount,
                    'min_order'=>$request->min_order,
                    'coupon_qty'=>$request->coupon_qty,
                    'expire_at'=>!empty($request->expire_at)? Carbon::parse($request->expire_at)->format('Y-m-d') : Carbon::today()->addYears(25),
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id:null,
                    'coupon_status'=>(!empty($request->coupon_status) && $request->coupon_status == 1) ? $request->coupon_status : 2,
                ]);
                if(!empty($code)){
                    DB::commit();
                    $data = new CouponCodeResource($code->load('attachment'));
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Coupon Code Store Successfully',$data);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'coupon_title'=>'required|string',
            'coupon_code'=>'required|string|min:6',
            'coupon_amount'=>'required|integer|min:0|not_in:0',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $coupon = CouponCode::find($id);
                if(empty($coupon)){
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
                $couponU = $coupon->update([
                    'coupon_title'=>$request->coupon_title,
                    'coupon_code'=>$request->coupon_code,
                    'coupon_amount'=>$request->coupon_amount,
                    'min_order'=>$request->min_order,
                    'coupon_qty'=>$request->coupon_qty,
                    'expire_at'=>!empty($request->expire_at)? Carbon::parse($request->expire_at)->format('Y-m-d'): $coupon->expire_at,
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id: $coupon->attachment_id,
                    'coupon_status'=>(!empty($request->coupon_status) && $request->coupon_status == 1) ? $request->coupon_status : 2,
                ]);
                if(!empty($couponU)){
                    DB::commit();
                    $data = new CouponCodeResource(CouponCode::where('coupon_id',$id)->with('attachment')->first());
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Brand Update Successfully',$data, '');
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CouponCode $couponCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($couponId)
    {
        try{
            DB::beginTransaction();
            $couponCode = CouponCode::find($couponId);
            if (empty($couponCode)){
                throw new Exception('Invalid Coupon Information', Response::HTTP_NOT_FOUND);
            }
            $couponCode->update([
                'coupon_status'=> config('app.delete'),
            ]);

            if(!empty($couponCode)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Coupon Delete Successfully');
            }{
                throw new Exception('Invalid Information.!');
            }
        }catch(Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
