@extends('layouts.app')
@section('PageTitle','Category Create')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')

    <category-create-page :categoryId="{{ $categoryId }}" :isEdit="1"></category-create-page>
@endsection
@section('PageJs')

@endsection
