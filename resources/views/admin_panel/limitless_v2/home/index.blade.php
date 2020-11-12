@extends('layouts.app')
@section('PageTitle','DashBoard')

@section('PageCss')

@endsection
@section('ThemeJs')

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

