<!DOCTYPE html>
<html lang="{{ session('lang') }}">

<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif] -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="lang" content="{{ session('lang') }}">

    <!-- Favicons Icon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>@yield('Title')| {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link href="{{ asset('/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/colors.css') }}" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('kuteshop_v2/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('custom/css/custom_style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
    @yield('PageCss')

    <style>


    </style>
</head>

<body class="index-opt-1 catalog-category-view catalog-view_op1">
    <div class="wrapper" id="kuteshop_v2">

        <!-- HEADER -->
            @include('templates.kuteshop_v2.layouts.frontend.includes.globalHeader')
        <!-- end HEADER -->

        <!-- MAIN -->
            @yield('Content')
        <!-- end MAIN -->

        <!-- FOOTER -->
            @include('templates.kuteshop_v2.layouts.frontend.includes.globalFooter')
        <!-- end FOOTER -->

        <!--back-to-top  -->
        <a href="#" class="back-to-top">
            <i aria-hidden="true" class="fa fa-angle-up"></i>
        </a>
        <quick-view-product ></quick-view-product>
    </div>

<!-- jQuery -->
    <script type="text/javascript" src="{{ asset('kuteshop_v2/js/jquery.min.js') }}"></script>

<!-- sticky -->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/jquery.sticky.js') }}"></script>

<!-- OWL CAROUSEL Slider -->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/owl.carousel.min.js') }}"></script>

<!-- Boostrap -->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/bootstrap.min.js') }}"></script>


<!--jquery Bxslider  -->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/jquery.bxslider.min.js') }}"></script>

<!-- actual -->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/jquery.actual.min.js') }}"></script>

<!-- Chosen jquery-->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/chosen.jquery.min.js') }}"></script>

<!-- parallax jquery-->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/jquery.parallax-1.1.3.js') }}"></script>

<!-- elevatezoom -->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/jquery.elevateZoom.min.js') }}"></script>

<!-- fancybox -->
<script src="{{ asset('kuteshop_v2/js/fancybox/source/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('kuteshop_v2/js/fancybox/source/helpers/jquery.fancybox-media.js') }}"></script>
<script src="{{ asset('kuteshop_v2/js/fancybox/source/helpers/jquery.fancybox-thumbs.js') }}"></script>

<!-- arcticmodal -->
<script src="{{ asset('kuteshop_v2/js/arcticmodal/jquery.arcticmodal.js') }}"></script>

<!-- Main -->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/main.min.js') }}"></script>


<!-- Scripts -->
@yield('PageJs')

    <script src="{{ asset('js/kuteshop_v2.js') }}"></script>
</body>

</html>
