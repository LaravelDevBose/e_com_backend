@extends('layouts.app')
@section('PageTitle','DashBoard')

@section('PageCss')

@endsection
@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
@endsection
@section('content')
    <dashboard></dashboard>
@endsection
@section('PageJs')

@endsection

