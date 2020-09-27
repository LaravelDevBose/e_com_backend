@extends('layouts.app')
@section('PageTitle','Product Details ')

@section('PageCss')
    <style>
        .carousel{
            min-height: 200px;
            height: 302px;
            background: #ddd;
            border-radius: 5px;
            border: 1px solid #b3b0b0;
        }
        .carousel img{
            height: 300px;
            width: 100%;
            border-radius: 5px;
        }
    </style>
@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <show-product :productid="{{ $product_id }}"></show-product>
@endsection
@section('PageJs')

@endsection
