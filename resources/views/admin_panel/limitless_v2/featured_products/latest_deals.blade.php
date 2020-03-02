@extends('layouts.app')
@section('PageTitle','Latest Deal Products')

@section('PageCss')

@endsection

@section('ThemeJs')

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')

    <latest-deals-products></latest-deals-products>
@endsection
@section('PageJs')

@endsection
