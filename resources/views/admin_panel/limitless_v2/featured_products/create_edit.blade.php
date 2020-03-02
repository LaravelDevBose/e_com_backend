@extends('layouts.app')
@section('PageTitle','Update Featured Products')

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
    </style>

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>

@endsection

@section('content')
    <update-featured-products></update-featured-products>
@endsection
@section('PageJs')

@endsection
