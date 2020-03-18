@extends('layouts.app')
@section('PageTitle','Update Ads Banner')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <ads-banner-create :positions="{{ json_encode($positions) }}" :isedit="1" :id="{{ $id }}"></ads-banner-create>
@endsection
@section('PageJs')

@endsection
