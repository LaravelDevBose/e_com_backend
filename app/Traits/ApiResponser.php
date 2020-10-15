<?php
/**
 * Created by PhpStorm.
 * User: Brainchild soft
 * Date: 7/31/2019
 * Time: 11:00 AM
 */

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait ApiResponser
{
    public static function AllResponse($statusText='Error', $status=Response::HTTP_BAD_REQUEST, $ok=false, $message="",  $data=null, $url=''){

        return response()->json([
            'ok'=>$ok,
            'status'=>$status,
            'statusText'=>ucfirst($statusText),
            'message'=>$message,
            'url'=>$url,
            'data'=>$data,
        ]);
    }

    public static function CollectionResponse($statusText='Success', $status=200, $collection=null){
        return $collection->additional(
            [
                'statusText'=>ucfirst($statusText),
                'status'=>$status,
                'ok'=>true,
                'message'=>''
            ]);
    }

    public static function SingleResponse($data, $statusText='Success', $status=200, $ok = true){
        return response()->json([
            'status'=>$status,
            'statusText'=>ucfirst($statusText),
            'ok'=>$ok,
            'data'=>$data,
        ]);
    }

    public static function ValidationResponse($errors=[], $statusText='Validation', $status=Response::HTTP_NOT_ACCEPTABLE, $ok=false)
    {
        $message = null;
        foreach ($errors as $error){
            if(!empty($error)){
                foreach ($error as $errorItem){
                    $message .=  $errorItem .'<br/> ';
                }
            }
        }
        return response()->json([
            'status'=>Response::HTTP_NOT_ACCEPTABLE,
            'statusText'=>ucfirst($statusText),
            'ok'=>$ok,
            'message'=>$message,
        ]);
    }

    public static function MakeCollectionResponse(Request $request, $list)
    {
        if (!empty($request->per_page)) {
            $list = $list->paginate($request->per_page);
        }elseif (!empty($request->page)){
            $list = $list->paginate();
        }elseif(!empty($request->take)){
            $list = $list->take($request->take)->get();
        }else{
            $list = $list->get();
        }
        return $list;
    }
}
