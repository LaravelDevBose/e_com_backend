 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <title>@yield('PageTitle') | {{ env('APP_NAME', 'Dukaanso') }}</title>

    <script src="{{ asset('js/limitless_v1.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="lang" content="en">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/extras/animate.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <style>
        .navbar-brand{
            padding: 3px 20px;
        }
        .sidebar-xs .sidebar-main .navigation > li > ul,
        .sidebar-xs .sidebar-main .navigation > li > a > span,
        .navigation > li.active > a, .navigation > li.active > a:hover, .navigation > li.active > a:focus{
            background-color: #075447;
        }
        .table > tbody > tr > td{
            padding: 10px;
        }

    </style>
    @yield('PageCss')

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/drilldown.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <!-- /core JS files -->

    @yield('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/pages/components_notifications_pnotify.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/pages/animations_css3.js') }}"></script>
</head>
<body class="navbar-top  pace-done">

<div id="limitless_v1">

    @include('seller_panel.limitless_v1.includes.nav_bar')
    <!-- Page container -->
    <div class="page-container" >

        <!-- Page content -->
        <div class="page-content" >
            @include('seller_panel.limitless_v1.includes.sidebar')
            <!-- Main content -->
            <div class="content-wrapper">

                @yield('content')

            </div>
        </div>
        <!-- /page content -->
        <!-- Footer -->

        <!-- /footer -->
    </div>
    <!-- /page container -->

</div>
@yield('PageJs')

</body>
</html>
