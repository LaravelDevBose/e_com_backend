@extends('layouts.app')
@section('PageTitle','Create Homepage Section')

@section('PageCss')
    <style>
        .select2-search{
            display: none!important;
        }
        input[type=checkbox]:checked tr{
            background: green;
        }
    </style>

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/extensions/select.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_extension_select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/form_checkboxes_radios.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>

@endsection

@section('content')
    <section-create-page></section-create-page>
@endsection
@section('PageJs')

@endsection
