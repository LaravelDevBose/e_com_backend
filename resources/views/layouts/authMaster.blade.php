<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <title>@yield('PageTitle') | {{ env('APP_NAME') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->
    <style>
        .has-feedback-left .form-control{
            padding-left: 20px;
            padding-right: 5px;
            border-width: 1px;
            border-color: #ddd;
            border-radius: 1px;
            -webkit-box-shadow: none;
            box-shadow: none;

        }
        .has-feedback-left .form-control-feedback{
            left: 4px;
        }
    </style>
    @yield('PageCss')

    @yield('ThemeJs')
</head>
<body class="login-container login-cover">
    <div id="app">
        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- /main content -->
            </div>
            <!-- /page content -->
        </div>
        <!-- Footer -->
        <div class="navbar navbar-default navbar-fixed-bottom">
            <ul class="nav navbar-nav no-border visible-xs-block">
                <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
            </ul>

            <div class="navbar-collapse collapse" id="navbar-second">
                <div class="navbar-text col-md-6">
                    &copy;2019. <span>Design And Develop By:</span> <a href="http://brainchildsoft.com" target="__blank">Brain Child Software</a> <small>Your Ultimate Web Solution</small>
                </div>

                <div class="navbar-right col-md-6">
                    <ul class="nav navbar-nav">
                        <li class="display-block pull-right"><a href="#" class="text-semibold" style="display: inline-block!important;">Email: laravel.devbose@gmail.com</a> <a href="#" class="text-semibold" style="display: inline-block!important;">Phone No: +880 1571-721910</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /footer -->
    </div>
@yield('PageJs')
</body>
</html>
