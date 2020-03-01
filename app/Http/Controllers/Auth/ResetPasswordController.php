<?php

namespace App\Http\Controllers\Auth;

use App\Models\SocialProvider;
use App\User;
use Exception;
use App\Helpers\TemplateHelper;
use App\Http\Controllers\Controller;
use App\Traits\ResponserTrait;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    public $template_name;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        if(empty($this->template_name)){
            $this->template_name = config('app.default_template');
        }

        $this->middleware('guest');
    }


    public function showResetForm(Request $request, $token = null)
    {
        return view('templates.'.$this->template_name.'.auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'token'=>['required','string'],
            'email'=>['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if($validator->passes()){
            try {
                DB::beginTransaction();
                $userInfo = User::where('email', $request->email)->where('remember_token', $request->token)->first();
                $response = $this->broker()->reset(
                    $this->credentials($request), function ($user, $password) {
                    $this->resetPassword($user, $password);
                });
                if($response == Password::PASSWORD_RESET){
                    SocialProvider::where('user_id', $userInfo->user_id)
                        ->update([
                            'password'=>$request->password,
                        ]);
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Account Password Reset Successfully');
                }else{
                    throw new Exception('Invalid Information',Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }
}
