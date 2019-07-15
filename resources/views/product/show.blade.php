@extends('layouts.app')
@section('PageTitle','Product Details ')

@section('PageCss')
    <style>
        .carousel{
            min-height: 200px;
            background: #ddd;
            border-radius: 5px;
            border: 1px solid #b3b0b0;
        }
    </style>
@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/user_profile_tabbed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <show-product :productID="{{ $product_id }}"></show-product>
@endsection
@section('PageJs')

@endsection
