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
    <link href="{{ asset('/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('kuteshop_v2/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('custom/css/custom_style.css') }}">
    @yield('PageCss')
    <style>
        .search-content .widget-title{
            margin-top: 0;
            border-bottom: 1px dotted #0acde6;
            padding: 10px 0px;
            font-size: 1.5em;
        }
        .widget-content .featured-thumb {
            display: inline-block;
            padding: 0;
            width: 80px;
            margin-right: 10px;
            float: left;
        }
        .featured-thumb .feat-thumb{
            width: 100%;
            height: 80px;
        }
        .widget-content .product-name{
            margin-top: 0px;
            margin-bottom: 0px;
        }
        .widget-content .product-name a{
            /*display: inline-block;*/
            font-size: .7em;
        }
        .widget-content .product-item{
            padding-bottom: 5px;
        }
        .widget-content .post-meta{
            margin-bottom: 0px;
        }
        .block-top-brand-opt14 .nav-brand{
            padding-left: 0px;
            padding-right: 0px;
        }
        .product-addto-links{
            display: inline;
            padding: 0 10px;
        }
        .catalog-view_op1 .product-options-bottom .btn-buy{
            height: 36px;
            background-color: #0db1b9;
            color: #fff;
            font-size: 14px;
            padding: 0 12px;
            border: none;
            box-shadow: none;
            line-height: 36px;
            -webkit-transition: .2s;
            -o-transition: .2s;
            transition: .2s;
            margin-bottom: 10px;
        }
        .catalog-view_op1 .product-options-bottom .btn-buy:hover{
            background-color: #048d94;
        }
        .catalog-view_op1 .product-options-bottom .btn-buy i{
            font-size: 18px;
            padding-right:5px;
        }
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

<!-- Countdown -->
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/jquery.countdown.min.js') }}"></script>

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
<script type="text/javascript" src="{{ asset('kuteshop_v2/js/main.js') }}"></script>

<!-- Scripts -->
@yield('PageJs')

    <script src="{{ asset('js/kuteshop_v2.js') }}"></script>
</body>

</html>
