<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\TemplateHelper;
use App\Http\Controllers\Controller;
use App\Traits\ResponserTrait;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

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

    public function showLinkRequestForm()
    {
        return view('templates.'.$this->template_name.'.auth.passwords.email');
    }


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
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Reset Email Send On Your Account');
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Invalid Email Address. Account Not Found.');
        }
    }
}
