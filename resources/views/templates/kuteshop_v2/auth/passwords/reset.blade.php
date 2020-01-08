@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Reset Password')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">
        <div class="columns container" style="margin-top: 2rem">
            <!-- Block  Breadcrumb-->
            <h2 class="page-heading">
                <span class="page-heading-title2">Reset Your Password</span>
            </h2>

            <div class="page-content">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="box-authentication">
                            <h3>{{ $t('auth.buyer.login_title')}}</h3>
                            <form method="POST" action="{{ route('password.update') }}" autocomplete="off">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="emmail_login">Email<span class="text text-danger text-bold">*</span></label>
                                        <input type="email" name="email" autocomplete="off" placeholder="email" value="{{ $email ?? old('email') }}" required class="form-control" id="emmail_login">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-10">
                                        <label for="password_login">New Password<span class="text text-danger text-bold">*</span></label>
                                        <input type="password" name="password" autocomplete="off" minlength="8" :placeholder="$t('form.password')" required class="form-control" id="password_login">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-10">
                                        <label for="password_con">Confirm Password <span class="text text-danger text-bold">*</span></label>
                                        <input type="password" name="password_confirmation" minlength="8" required :placeholder="$t('form.confirm_pass')" class="form-control" id="password_con">
                                    </div>
                                    <div class="col-md-10">
                                        <button type="submit" class="button text-right"><i class="fa fa-lock"></i> Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('PageJs')

@endsection
