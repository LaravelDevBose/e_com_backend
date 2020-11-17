<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('frontend.app');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );
        if($response == Password::RESET_LINK_SENT){
            return ApiResponser::AllResponse('success', Response::HTTP_OK, true,'Reset Email Send On Your Account');
        }else{
            return ApiResponser::AllResponse('error', Response::HTTP_NOT_FOUND, false,'Invalid Email Address. Account Not Found.');
        }
        /*return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);*/
    }

    /*public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email'
        ]);
        if($validator->passes()){
            try{
                DB::beginTransaction();

                // We will send the password reset link to this user. Once we have attempted
                // to send the link, we will examine the response then see the message we
                // need to show to the user. Finally, we'll send out a proper response.
                $response = $this->broker()->sendResetLink(
                    $this->credentials($request)
                );

                if($response == Password::RESET_LINK_SENT){
                    $this->broker()->create(User::where('email', $request->email));
                    return ApiResponser::AllResponse('success', Response::HTTP_OK, true,'Reset Email Send On Your Account');
                }else{
                    return ApiResponser::AllResponse('error', Response::HTTP_NOT_FOUND, false,'Invalid Email Address. Account Not Found.');
                }

            }catch (\Exception $ex){
                DB::rollBack();
                return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST,false, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::ValidationResponse($errors,'validation', Response::HTTP_BAD_REQUEST);
        }

    }*/
}
