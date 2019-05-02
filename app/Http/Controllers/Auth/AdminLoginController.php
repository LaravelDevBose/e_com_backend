<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin',['except'=>['logout']]);
    }
    public function show_login_page(){

        return view('auth.login');
    }
    public function login( Request $request){
        //Validate the form date
        $this->validate($request, [
            'identity'=>'required',
            'password'=>'required|min:6',
        ]);
        //attempt to log the user in
        if (Auth::guard('admin')->attempt([$this->username()=>$request->identity, 'password'=>$request->password], $request->remember)) {
            return response()->json([
                'status'=>'success',
                'message'=>'Login Successfully',
                'route'=>route('admin.home')
            ]);
        }
        return response()->json([
            'status'=>'error',
            'message'=>'Email Or UserName And Password Not Match !',
            'route'=>0
        ]);
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
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }
}
