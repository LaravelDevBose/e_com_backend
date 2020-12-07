<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="lang" content="en">
    <base href="/" />

    <title>@yield('PageTitle') | {{ env('APP_NAME', 'Saliim') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/core.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/extras/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
    <!-- /global stylesheets -->
    @yield('PageCss')
    @yield('ThemeJs')

</head>
<body class="navbar-top  pace-done sidebar-xs">

<div id="app">

    @include('includes.nav_bar')
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content" >

            @include('includes.sidebar')


            <!-- Main content -->
            <div class="content-wrapper">

                @yield('content')

            </div>
            <!-- /main content -->
                {{--<div id="loading" style="top: 20%; left: 40%; position: absolute; z-index: 1000000;">
                    <img src="{{ asset('assets/loader.gif') }}" />
                </div>--}}
        </div>
        <!-- /page content -->
        <!-- Footer -->

        <!-- /footer -->
    </div>
    <!-- /page container -->

</div>
<!-- Core JS files -->
<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/pnotify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>

@yield('PageJs')
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
