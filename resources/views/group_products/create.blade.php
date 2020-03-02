@extends('layouts.app')
@section('PageTitle','Create Group Products')

@section('PageCss')
    <style>
        .select2-search{
            display: none!important;
        }
        input[type=checkbox]:checked tr{
            background: green;
        }
        .pro-img{
            width:80px;
            padding:8px;
        }
        .table-checkbox{
            width:40px;
        }
        table>tbody>tr>td:nth-child(2){
            padding: 5px!important;
        }
        .table > thead > tr > th>.sort{
            float: right!important;
        }
        .table{
            margin-top: 1rem;
            margin-bottom: 1rem;
            padding: 1rem!important;
        }
        .table > thead> tr > th:first-child{
            width: 50px;
        }
        table>tbody>tr>td:nth-child(2){
            padding: 5px!important;
            width: 50px;
        }
    </style>

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switch.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>

@endsection

@section('content')
    <create-group-product-page></create-group-product-page>
@endsection
@section('PageJs')

@endsection
