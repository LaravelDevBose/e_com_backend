@extends('layouts.app')
@section('PageTitle','Latest Deal Products')

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
    <create-latest-deal-page></create-latest-deal-page>
@endsection
@section('PageJs')

@endsection
