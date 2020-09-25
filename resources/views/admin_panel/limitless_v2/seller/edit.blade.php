@extends('layouts.app')
@section('PageTitle','Seller Update')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <seller-create-edit-page :sellerId="{{$sellerId}}" :isEdit="1"></seller-create-edit-page>
@endsection
@section('PageJs')

@endsection
