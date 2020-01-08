<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\TemplateHelper;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

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
        return view('templates.'.$this->template_name.'auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
