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

@endsection

@section('content')
    <setting-page></setting-page>
@endsection
@section('PageJs')

@endsection

