<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function show_login_page(){

        return view('auth.admin_login');
    }
    public function login( Request $request){

        $validation = Validator::make($request->all(),[
            'identity'=>'required',
            'password'=>'required|min:6',
        ]);

        if($validation->passes()){
            //attempt to log the user in
            if (Auth::guard('admin')->attempt([$this->username()=>$request->identity, 'password'=>$request->password], $request->remember)) {
                return response()->json([
                    'status'=>'success',
                    'msg'=>'Login Successfully',
                    'url'=>route('admin.home')
                ]);
            }
            return response()->json([
                'status'=>'error',
                'message'=>'Email Or UserName And Password Not Match !',
                'url'=>0
            ]);
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

            return response()->json([
                'status'=>'warning',
                'message'=>(!empty($message))? $message : 'Invalid Information',
            ]);
        }


    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
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
