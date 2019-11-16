<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeneralController extends Controller
{
    public function accepted_payment_methods(){
        $payment = array();
        for($i=1; $i<5; $i++){
            $payment[$i]=[
                'name'=>'payment-'.$i,
                'image_src'=>asset('front/images/payment-'.$i.'.png'),
            ];
        }

        if(!empty($payment)){
            return response()->json([
                'status'=>'success',
                'code'=>Response::HTTP_OK,
                'data'=>$payment
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=>'error',
                'code'=>Response::HTTP_BAD_REQUEST,
                'message'=>'Some Error Found'
            ], Response::HTTP_BAD_REQUEST);
        }


    }

    public function default_images(){
        $data = array();
        $data['banner_image']= asset('front/images/small-strip-banner.jpg');
        $data['banner_right']= asset('front/images/rhs-banner.png');
        $data['hot_banner']= asset('front/images/hot-trends-banner.png');
        $data['product_banner']= asset('front/images/home-banner.png');
        $data['google_play']= asset('front/images/google-play-btn.jpg');
        $data['apple_ios']= asset('front/images/apple-btn.jpg');
        $data['rlt_banner']= asset('front/images/banner-img.png');

        if(!empty($data)){
            return response()->json([
                'status'=>'success',
                'code'=>Response::HTTP_OK,
                'data'=>$data
            ], Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=>'error',
                'code'=>Response::HTTP_BAD_REQUEST,
                'message'=>'Some Error Found'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
