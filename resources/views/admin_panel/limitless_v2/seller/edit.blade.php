@extends('layouts.app')
@section('PageTitle','Seller Update')

@section('PageCss')

@endsection

@section('ThemeJs')

@endsection

@section('content')
    <seller-create-edit-page :sellerId="{{$sellerId}}" :isEdit="1"></seller-create-edit-page>
@endsection
@section('PageJs')

@endsection
