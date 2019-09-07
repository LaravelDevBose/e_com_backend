<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif] -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="base-url" content="{{ url('/') }}">

    <!-- Favicons Icon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>@yield('Title')| {{ config('app.name', 'Laravel') }}</title>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/font-awesome.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/simple-line-icons.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.bxslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.mobile-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/revslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}" media="all">
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600,800,400|Raleway:400,300,600,500,700,800' rel='stylesheet' type='text/css'>

    @yield('PageCss')
    <style>
        a{
            color: #666;
            -webkit-transition: all 0.3s ease-out;
            -moz-transition: all 0.3s ease-out;
            -o-transition: all 0.3s ease-out;
            -ms-transition: all 0.3s ease-out;
        }
        a:hover{
            cursor: pointer;
            color: #000;
            text-decoration: none;
        }
    </style>
</head>

<body class="cms-index-index cms-home-page category-page">
<div id="app">
    <div id="page">
        <!-- Header Section -->
        <header>
            <!-- header -->
            @include('layouts.frontend.includes.globalHeader')
            <!-- end header -->

            <!-- Navigation -->
            @include('layouts.frontend.includes.navigation')
            <navigation></navigation>
            <!-- end nav -->
        </header>
        <!-- end Header Section -->

    @yield('Content')

    <!-- Footer -->
    @include('layouts.frontend.includes.globalFooter')
    <!-- End Footer -->

    </div>

    <!-- mobile menu -->
    @include('layouts.frontend.includes.mobileMenu')
    <!-- end mobile menu -->

</div>
<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript" src="{{ asset('front/js/jquery.min.js') }}"  ></script>
<script type="text/javascript" src="{{ asset('front/js/bootstrap.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('front/js/revslider.js') }}"  ></script>
<script type="text/javascript" src="{{ asset('front/js/common.js') }}"  ></script>
<script type="text/javascript" src="{{ asset('front/js/owl.carousel.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('front/js/jquery.mobile-menu.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('front/js/countdown.js') }}" ></script>
<!-- Scripts -->
@yield('PageJs')



</body>

</html>
