@extends('layouts.app')
@section('PageTitle','Account Setting Information')

@section('PageCss')

@endsection

@section('ThemeJs')

@endsection

@section('content')
    <account-setting-page :adminid="{{ auth()->guard('admin')->user()->admin_id }}"></account-setting-page>
@endsection
@section('PageJs')

@endsection

