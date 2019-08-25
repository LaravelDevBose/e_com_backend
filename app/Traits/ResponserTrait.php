<?php


namespace App\Traits;


trait ResponserTrait
{

    public static function allResponse($status, $code=Response::HTTP_OK, $message="", $data=null, $url=null){

        return response()->json([
            'status'=>$status,
            'message'=>$message,
            'code'=>$code,
            'data'=>$data,
            'url'=>$url,
        ], $code);
    }

    public static function collectionResponse($status='success', $code=200, $collection=null){
        return response()->json([
            'status'=>$status,
            'code'=>$code,
            'data'=>$collection,
        ],$code);
    }

    public static function singleResponse($data, $status='success', $code=200){
        return response()->json([
            'status'=>$status,
            'code'=>$code,
            'data'=>$data,
        ],$code);
    }

}
