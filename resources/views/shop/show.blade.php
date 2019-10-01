@extends('layouts.app')
@section('PageTitle','Shop Details')

@section('PageCss')
@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/user_profile_tabbed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <shop-details-page :sellerId="{{ $seller_id }}"></shop-details-page>
@endsection
@section('PageJs')

@endsection

