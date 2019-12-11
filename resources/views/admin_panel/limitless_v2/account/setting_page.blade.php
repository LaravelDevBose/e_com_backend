@extends('layouts.app')
@section('PageTitle','Account Setting Information')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <account-setting-page :adminid="{{ auth()->guard('admin')->user()->admin_id }}"></account-setting-page>
@endsection
@section('PageJs')

@endsection

