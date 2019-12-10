@extends('layouts.app')
@section('PageTitle','Admin Information')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <admin-account-page :adminid="{{ auth()->guard('admin')->admin_id }}"></admin-account-page>
@endsection
@section('PageJs')

@endsection

