<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Resources\Frontend\coupon\CouponResource;
use App\Models\CouponCode;
use App\Models\DeliveryMethod;
use App\Traits\ApiResponser;
use App\Traits\ResponserTrait;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\Frontend\deliveryMethod\DeliveryMethodResource;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function get_delivery_info()
    {
        $deliveryMethods = DeliveryMethod::isActive()->get();
        $coll = DeliveryMethodResource::collection($deliveryMethods);
        if(!empty($coll)){
            return ApiResponser::SingleResponse($coll, 'Success', Response::HTTP_OK);
        }

        return ApiResponser::AllResponse('Error', Response::HTTP_BAD_REQUEST, false, 'Not Found');

    }

    public function store_checkout_info_session(Request $request)
    {
        try {
            $sessionData = array();

            if (Session::has('checkout')){
                $sessionData = Session::get('checkout');
            }
            array_push($sessionData, $request->all());

            return ApiResponser::AllResponse('Success', Response::HTTP_OK, true, 'Store Successfully');
        }catch (\Exception $ex){
            return ApiResponser::AllResponse('Error', Response::HTTP_BAD_REQUEST);
        }

    }

    public function get_checkout_session()
    {
        try {
            $sessionData = array();

            if (Session::has('checkout')){
                $sessionData = Session::get('checkout');
            }
            return ApiResponser::SingleResponse($sessionData,'Success', Response::HTTP_OK, true);
        }catch (\Exception $ex){
            return ApiResponser::AllResponse('Error', Response::HTTP_BAD_REQUEST);
        }
    }

    public function check_coupon_code(Request  $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon_code'=> 'required|string|min:6'
        ]);
        if($validator->passes()) {
            try {
                DB::beginTransaction();
                $coupon = CouponCode::where('coupon_status', config('app.active'))
                    ->where('coupon_code', $request->coupon_code)
                    ->with('used_coupons')->first();

                if (empty($coupon)){
                    throw new \Exception('Invalid Coupon Code', Response::HTTP_BAD_REQUEST);
                }
                if (!empty($coupon->coupon_qty) && $coupon->coupon_qty > $coupon->used_coupons->count()){
                    throw new \Exception('Coupon code already reach limit', Response::HTTP_BAD_REQUEST);
                }

                if (Carbon::parse($coupon->expire_at) < Carbon::today()){
                    throw new \Exception('Coupon code already expired', Response::HTTP_BAD_REQUEST);
                }
                if (!empty($coupon->min_order) && $coupon->min_order > Cart::total()){
                    throw new \Exception('Apply Coupon code min order limit '.$coupon->min_order, Response::HTTP_BAD_REQUEST);
                }

                if (!empty($coupon)){
                    $data = new CouponResource($coupon);
                    return ApiResponser::AllResponse( 'Success', Response::HTTP_OK, true, 'Coupon Code Apply Successfully', $data);
                }else{
                    throw new \Exception('Invalid Coupon Code Information', Response::HTTP_BAD_REQUEST);
                }
            }catch (\Exception $ex){
                DB::rollBack();
                return ApiResponser::allResponse('error', $ex->getCode(), false, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::validationResponse($errors,'validation', Response::HTTP_BAD_REQUEST);
        }
    }

}
