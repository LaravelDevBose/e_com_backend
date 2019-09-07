@extends('layouts.authMaster')
@section('PageTitle', 'Admin Login')

@section('PageCss')

@endsection

@section('ThemeJs')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/validation/validate.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- /theme JS files -->
@endsection

@section('content')
    <!-- Content area -->
        <admin-login></admin-login>
    <!-- /content area -->

@endsection
