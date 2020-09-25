@extends('layouts.app')
@section('PageTitle','seller List')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <seller-list></seller-list>
@endsection
@section('PageJs')

@endsection

