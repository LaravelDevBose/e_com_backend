<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\TemplateHelper;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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
        return view('templates.'.$this->template_name.'auth.passwords.email');
    }
}
