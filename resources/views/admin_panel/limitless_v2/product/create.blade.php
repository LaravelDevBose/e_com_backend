@extends('layouts.app')
@section('PageTitle','Create New Product')

@section('PageCss')
    <style>
        .note-toolbar > .note-btn-group {
            margin-top: 5px;
            margin-right: 5px;
            margin-left: 0;
        }
        .note-editor .note-toolbar{
            border-bottom: 1px solid #ddd;
        }
        .wysihtml5-toolbar{
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }
        .wysihtml5-toolbar > li {
            margin: 5px 5px 0 0;
        }
        .selectMulti .select2-container{
            border: 1px solid #ddd!important;
            border-radius: 5px;
            line-height: 1;
            height: auto;
        }
    </style>
@endsection

@section('ThemeJs')

    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <create-product></create-product>
@endsection
@section('PageJs')

@endsection
