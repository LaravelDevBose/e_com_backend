@extends('layouts.app')
@section('PageTitle','Ads Banner')

@section('PageCss')

@endsection

@section('ThemeJs')

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <ads-banner></ads-banner>
@endsection
@section('PageJs')

@endsection

