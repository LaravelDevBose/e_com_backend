<?php

namespace App\Http\Controllers\Buyer;

use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userInfo(){
        if(Auth::user()){
            $data =[
                'user'=>Auth::guard('web')->user()->toJson(),
                'whoIs'=>'buyer',
            ];
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Login Successful', $data);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_OK, 'UnAuthnticate');
        }

    }
    public function update_buyer_info(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'full_name'=>'required|string',
            'phone_no'=>'required|string',
            'buyer_address'=>'required|string',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $user = auth()->guard('web')->user()->update([
                    'full_name'=> $request->full_name,
                    'phone_no'=>$request->phone_no,
                ]);
                if($user){
                    Buyer::where('user_id', auth()->id())->update([
                        'buyer_address'=>$request->buyer_address,
                    ]);
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Buyer Info Updated Successfully');
                }else{
                    throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
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
