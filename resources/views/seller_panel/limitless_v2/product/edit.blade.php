@extends('seller_panel.limitless_v2.seller')
@section('PageTitle','Edit Product')

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
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/inputs/typeahead/handlebars.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/inputs/passy.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/inputs/maxlength.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/form_controls_extended.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <product-edit-page></product-edit-page>
@endsection
@section('PageJs')

@endsection
