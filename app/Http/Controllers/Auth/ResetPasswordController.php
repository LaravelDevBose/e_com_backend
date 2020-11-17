<?php

namespace App\Http\Controllers\Auth;

use App\Models\SocialProvider;
use App\Traits\ApiResponser;
use App\User;
use Exception;
use App\Helpers\TemplateHelper;
use App\Http\Controllers\Controller;
use App\Traits\ResponserTrait;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = '/buyer/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showResetForm(Request $request, $token = null)
    {
        return view('frontend.app');
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
                $response = $this->broker()->reset(
                    $this->credentials($request), function ($user, $password) {
                    $this->resetPassword($user, $password);
                });
                if($response == Password::PASSWORD_RESET){
                    DB::commit();
                    return ApiResponser::AllResponse('success', Response::HTTP_OK, true,'Account Password Reset Successfully');
                }else{
                    if ($response == Password::INVALID_TOKEN){
                        $message = 'Invalid Token Or Token Expired';
                    }else if($response == Password::INVALID_USER){
                        $message = 'Invalid User Information';
                    }else{
                        $message = 'Something Wrong. Invalid Information';
                    }
                    throw new Exception($message,Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ApiResponser::allResponse('error', Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::ValidationResponse($errors,'validation', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        //event(new PasswordReset($user));
    }
}
