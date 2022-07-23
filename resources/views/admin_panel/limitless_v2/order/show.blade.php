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

@endsection

@section('content')
    <order-details-page :orderid="{{$orderId}}" :contact-infos="{{ $contactInfos }}"></order-details-page>
@endsection
@section('PageJs')

@endsection