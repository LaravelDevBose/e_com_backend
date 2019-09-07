@extends('layouts.frontend.master')

@section('Title','Buyer Login')

@section('PageCss')

@endsection

@section('Content')
<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>Buyer Login or Create an Account</h2>
            </div>
            <fieldset class="col2-set">
                <div class="col-1 new-users">
                    <strong>New Customers</strong>
                    <div class="content">
                        <ul class="form-list">
                            <li>
                                <label for="email">
                                    Full Name
                                    <span class="required">*</span>
                                </label>
                                <br />
                                <input type="text" title="Email Address" class="input-text required-entry" id="email" value name="login" placeholder="Full Name" />
                            </li>
                            <li>
                                <label for="email">
                                    Mobile
                                    <span class="required">*</span>
                                </label>
                                <br />
                                <input type="text" title="Email Address" class="input-text required-entry" id="email" value name="login" placeholder="Mobile" />
                            </li>
                            <li>
                                <label for="email">
                                    Email Address
                                    <span class="required">*</span>
                                </label>
                                <br />
                                <input type="email" title="Email Address" class="input-text required-entry" id="email" value name="login" placeholder="Email Address" />
                            </li>
                            <li>
                                <label for="email">
                                    User Name
                                    <span class="required">*</span>
                                </label>
                                <br />
                                <input type="text" title="Email Address" class="input-text required-entry" id="email" value name="login" placeholder="Email Address" />
                            </li>
                            <li>
                                <label for="pass">
                                    Password
                                    <span class="required">*</span>
                                </label>
                                <br />
                                <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="login" placeholder="Password" />
                            </li>
                            <li>
                                <label for="pass">
                                    Confirm Password
                                    <span class="required">*</span>
                                </label>
                                <br />
                                <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="login" placeholder="Confirm Password" />
                            </li>
                        </ul>
                        <div class="buttons-set">
                            <button class="button create-account" type="button">
                                <span>Create an Account</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-2 registered-users">
                    <strong>Registered Customers</strong>
                    <div class="content">
                        <p>If you have an account with us, please log in.</p>
                        <ul class="form-list">
                            <li>
                                <label for="email">
                                    Email Address
                                    <span class="required">*</span>
                                </label>
                                <br />
                                <input type="text" title="Email Address" class="input-text required-entry" id="email" value name="login[username]" placeholder="Email Address" />
                            </li>
                            <li>
                                <label for="pass">
                                    Password
                                    <span class="required">*</span>
                                </label>
                                <br />
                                <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="login[password]" placeholder="Password" />
                            </li>
                        </ul>
                        <p class="required">* Required Fields</p>
                        <div class="buttons-set">
                            <a href="/dashboard" id="send2" name="send" type="submit" class="button login">
                                <span>Login</span>
                            </a>
                            <a class="forgot-word" href="http://demo.themessoft.com/computerstore/customer/account/forgotpassword/">Forgot Your Password?</a>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
    </div>
</section>
@endsection

@section('PageJs')

@endsection
