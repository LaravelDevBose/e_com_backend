@extends('layouts.app')
@section('PageTitle','Create General Pages')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <create-general-pages></create-general-pages>
@endsection
@section('PageJs')

@endsection
