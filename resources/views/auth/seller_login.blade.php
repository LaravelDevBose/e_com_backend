@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Seller Authcation')

@section('PageCss')

@endsection

@section('Content')
    <seller-auth-page></seller-auth-page>
@endsection

@section('PageJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/components_notifications_pnotify.js') }}"></script>
@endsection
