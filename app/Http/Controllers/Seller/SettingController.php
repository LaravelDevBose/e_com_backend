<?php

namespace App\Http\Controllers\Seller;

use App\Helpers\TemplateHelper;
use App\Models\Seller;
use App\Traits\ResponserTrait;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
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

    public function account_setting_page()
    {
        return view('seller_panel.'.$this->seller_template.'.setting.account_setting_page');
    }

    public function account_info(){
        $user = User::select('full_name', 'user_name', 'email', 'phone_no')->where('user_id', \auth()->guard('seller')->id())->first();
        if(!empty($user)){
            return ResponserTrait::singleResponse($user, 'success', Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_BAD_REQUEST, 'Account Information Not Found');
        }
    }

    public function update_account_info(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'full_name'=>'required|string',
            'user_name'=>'required|string',
            'email'=>'required|email',
            'phone_no'=>'required|string',
        ]);
        if($validator->passes()){
            try{
                DB::beginTransaction();
                $user = User::where('user_id', \auth()->guard('seller')->id())
                        ->update([
                            'full_name'=>$request->full_name,
                            'user_name'=>$request->user_name,
                            'email'=>$request->email,
                            'phone_no'=>$request->phone_no,
                        ]);

                if(!empty($user)){
                    $seller = Seller::where('user_id',\auth()->guard('seller')->id())
                        ->update([
                            'seller_name'=>$request->full_name,
                            'seller_email'=>$request->email,
                            'seller_phone'=>$request->phone_no,
                        ]);
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Account Setting update Successfully', '', route('seller.account.setting.page'));
                }else{
                    throw new \Exception('Error Found. Account Setting Not Updated', Response::HTTP_BAD_REQUEST);
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

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'current_password'=>'required|string|min:8',
            'password'=>'required|string|min:8|confirmed'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $credentials = [
                    'user_name'=>auth()->guard('seller')->user()->user_name,
                    'password'=>$request->current_password,
                ];
                if(Auth::guard('seller')->once($credentials)){
                    $user = User::where('user_id', \auth()->user()->user_id)
                        ->update([
                            'password'=>Hash::make($request->password)
                        ]);

                    if(!empty($user)){
                        DB::commit();
                        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Password update Successfully');
                    }else{
                        throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                    }
                }else{
                    throw new \Exception('Current Password Not Match !');
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
