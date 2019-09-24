@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Seller Authentication')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li><a href="#">Blog    </a></li>
                <li class="active">Ut pharetra augue nec augue integer rutrum ante eu lacus</li>
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2">Authentication</span>
            </h2>

            <div class="page-content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box-authentication">
                            <h3>Create an account</h3>
                            <p>Please enter your email address to create an account.</p>
                            <label for="emmail_register">Email address</label>
                            <input type="text" class="form-control" id="emmail_register">
                            <button class="button"><i class="fa fa-user"></i> Create an account</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box-authentication">
                            <h3>Already registered?</h3>
                            <label for="emmail_login">Email address</label>
                            <input type="text" class="form-control" id="emmail_login">
                            <label for="password_login">Password</label>
                            <input type="password" class="form-control" id="password_login">
                            <p class="forgot-pass"><a href="#">Forgot your password?</a></p>
                            <button class="button"><i class="fa fa-lock"></i> Sign in</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection

@section('PageJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/components_notifications_pnotify.js') }}"></script>
@endsection
