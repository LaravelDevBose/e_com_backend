<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\TemplateHelper;
use App\Http\Controllers\Controller;
use App\Traits\ResponserTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/buyer/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        $this->middleware('guest:web')->except('logout');
    }

    public function showLoginForm()
    {
        return view('templates.'.$this->template_name.'.auth.login');
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
                'is_buyer'=>config('app.one')
            ];

            if (Auth::guard('web')->attempt($credentials, $request->remember)) {
                $data =[
                    'user'=>Auth::guard('web')->user()->toJson(),
                    'token'=>base64_encode(\auth()->user()->user_name),
                    'whoIs'=>'buyer',
                ];
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Login Successful', $data, route('buyer.home'));
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
        Auth::guard('web')->logout();
        return redirect()->route('login');
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
