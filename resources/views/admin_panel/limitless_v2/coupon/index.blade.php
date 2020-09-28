@extends('layouts.app')
@section('PageTitle','Coupon')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')

    <coupon-code></coupon-code>
@endsection
@section('PageJs')

@endsection

