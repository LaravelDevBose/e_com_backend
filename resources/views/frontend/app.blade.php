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
    <meta name="lang" content="en">
    <base href="/" />

    <!-- Favicons Icon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- All Css Links -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('custom/css/custom_style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

    <style>
        .vs--searchable .vs__dropdown-toggle {
            height: 40px;
        }
    </style>

</head>

<body class="index-opt-1 catalog-category-view catalog-view_op1">
<div class="wrapper" id="main">
    <main-app></main-app>
    <!--back-to-top  -->
    <a href="#" class="back-to-top">
        <i aria-hidden="true" class="fa fa-angle-up"></i>
    </a>
</div>

<!-- jQuery -->
<script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<!-- sticky -->
<script type="text/javascript" src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
<!-- OWL CAROUSEL Slider -->
<script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<!-- Boostrap -->
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<!-- Countdown -->
<script type="text/javascript" src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
<!--jquery Bxslider  -->
<script type="text/javascript" src="{{ asset('frontend/js/jquery.bxslider.min.js') }}"></script>
<!-- actual -->
<script type="text/javascript" src="{{ asset('frontend/js/jquery.actual.min.js') }}"></script>
<!-- Chosen jquery-->
<script type="text/javascript" src="{{ asset('frontend/js/chosen.jquery.min.js') }}"></script>
<!-- parallax jquery-->
<script type="text/javascript" src="{{ asset('frontend/js/jquery.parallax-1.1.3.js') }}"></script>
<!-- elevatezoom -->
<script type="text/javascript" src="{{ asset('frontend/js/jquery.elevateZoom.min.js') }}"></script>
<!-- fancybox -->
<script src="{{ asset('frontend/js/fancybox/source/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('frontend/js/fancybox/source/helpers/jquery.fancybox-media.js') }}"></script>
<script src="{{ asset('frontend/js/fancybox/source/helpers/jquery.fancybox-thumbs.js') }}"></script>
<!-- arcticmodal -->
<script src="{{ asset('frontend/js/arcticmodal/jquery.arcticmodal.js') }}"></script>
<!-- Main -->
<div id="mainjs">

</div>
<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
