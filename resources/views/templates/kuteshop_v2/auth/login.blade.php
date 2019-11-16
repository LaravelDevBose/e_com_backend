@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Customer Login')

@section('PageCss')

@endsection

@section('Content')
<buyer-auth-page></buyer-auth-page>
@endsection

@section('PageJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/components_notifications_pnotify.js') }}"></script>
@endsection
