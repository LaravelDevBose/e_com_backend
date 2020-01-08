@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Forget Password')

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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="box-authentication">
                            <form method="POST" action="{{ route('password.email') }}" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="emmail_login">Email <span class="text text-danger text-bold">*</span></label>
                                        <input type="email" name="email" autocomplete="off" placeholder="email" required class="form-control" id="emmail_login">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-10">
                                        <button type="submit" class="button text-right"><i class="fa fa-lock"></i> Send Password Reset Link</button>
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
