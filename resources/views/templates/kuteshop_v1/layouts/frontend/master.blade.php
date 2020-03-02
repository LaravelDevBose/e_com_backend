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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('kuteshop_v1/css/style.css') }}">
    @yield('PageCss')
</head>

<body class="cms-index-index index-opt-12">
    <div class="wrapper" id="kuteshop_v1">

        <!-- HEADER -->
        @include('templates.kuteshop_v1.layouts.frontend.includes.globalHeader')
        <!-- end HEADER -->

        <!-- MAIN -->
        @yield('Content')
        <!-- end MAIN -->

        <!-- FOOTER -->
        @include('templates.kuteshop_v1.layouts.frontend.includes.globalFooter')
        <!-- end FOOTER -->

        <!--back-to-top  -->
        <a href="#" class="back-to-top">
            <i aria-hidden="true" class="fa fa-angle-up"></i>
        </a>
        <quick-view-product></quick-view-product>
    </div>



    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/jquery.min.js') }}"></script>

    <!-- sticky -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/jquery.sticky.js') }}"></script>

    <!-- OWL CAROUSEL Slider -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/owl.carousel.min.js') }}"></script>

    <!-- Boostrap -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/bootstrap.min.js') }}"></script>

    <!-- Countdown -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/jquery.countdown.min.js') }}"></script>

    <!--jquery Bxslider  -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/jquery.bxslider.min.js') }}"></script>

    <!-- actual -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/jquery.actual.min.js') }}"></script>

    <!-- Chosen jquery-->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/chosen.jquery.min.js') }}"></script>

    <!-- parallax jquery-->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/jquery.parallax-1.1.3.js') }}"></script>

    <!-- elevatezoom -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/jquery.elevateZoom.min.js') }}"></script>

    <!-- fancybox -->
    <script src="{{ asset('kuteshop_v1/js/fancybox/source/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('kuteshop_v1/js/fancybox/source/helpers/jquery.fancybox-media.js') }}"></script>
    <script src="{{ asset('kuteshop_v1/js/fancybox/source/helpers/jquery.fancybox-thumbs.js') }}"></script>

    <!-- arcticmodal -->
    <script src="{{ asset('kuteshop_v1/js/arcticmodal/jquery.arcticmodal.js') }}"></script>

    <!-- Main -->
    <script type="text/javascript" src="{{ asset('kuteshop_v1/js/main.js') }}"></script>

    <!-- Scripts -->
    @yield('PageJs')

    <script src="{{ asset('js/kuteshop_v1.js') }}"></script>
</body>

</html>
