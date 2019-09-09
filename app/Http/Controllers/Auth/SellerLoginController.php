<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\TemplateHelper;
use App\Http\Controllers\Controller;
use App\Traits\ResponserTrait;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellerLoginController extends Controller
{

    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        $this->middleware('guest:seller',['except'=>['logout']]);
    }

    public function show_login_page(){
        return view('templates.'.$this->template_name.'.auth.seller_login');
    }
    public function login( Request $request){

        $validation = Validator::make($request->all(),[
            'identity'=>'required',
            'password'=>'required|min:6',
        ]);

        if($validation->passes()){
            //attempt to log the user in
            $credentials = [
                $this->username()=>$request->identity,
                'password'=>$request->password,
                'status'=>config('app.active'),
                'is_seller'=>config('app.one')
            ];

            if (Auth::guard('seller')->attempt($credentials, $request->remember)) {
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Login Successful', '', route('seller.home'));
            }
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'Email Or UserName And Password Not Match !');
        }{
            $errors = array_values($validation->errors()->getMessages());
            $message = '';

            foreach ($errors as $error){
                if($error){
                    foreach ($error as $value){
                        $message .= $value .'<br>';
                    }
                }
            }
            return ResponserTrait::allResponse('validation', Response::HTTP_BAD_REQUEST, $message);
        }


    }
    public function logout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller.login');
    }
    /**
     * Check either username or email.
     * @return string
     */
    public function username()
    {
        $identity  = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }
}
