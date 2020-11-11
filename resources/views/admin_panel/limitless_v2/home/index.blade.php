@extends('layouts.app')
@section('PageTitle','DashBoard')

@section('PageCss')

@endsection
@section('ThemeJs')

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
@endsection
@section('content')
    <dashboard
        :total-products="{{$totalProduct}}"
        :total-cancel="{{$totalCancel}}"
        :total-sale="{{$totalSale}}"
        :total-user="{{$totalUser}}"
    ></dashboard>
@endsection
@section('PageJs')

@endsection

