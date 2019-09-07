@extends('layouts.app')
@section('PageTitle','Setting Pages')

@section('PageCss')
    <style>
        #email_heading .ql-editor, #email_body .ql-editor, #email_footer .ql-editor, #contact_address .ql-editor{
            min-height: 130px!important;
        }
    </style>
@endsection

@section('ThemeJs')

    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery_ui/touch.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/components_navs.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <setting-page></setting-page>
@endsection
@section('PageJs')

@endsection

