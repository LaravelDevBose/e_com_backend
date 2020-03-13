@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Reset Password')

@section('PageCss')

@endsection

@section('Content')
    <reset-password-page :email="{{ json_encode($email) }}" :token="{{ json_encode($token) }}"></reset-password-page>
@endsection

@section('PageJs')

@endsection
