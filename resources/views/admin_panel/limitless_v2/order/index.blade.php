@extends('layouts.app')
@section('PageTitle','Order List')

@section('PageCss')
    <style>
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
    </style>
@endsection

@section('ThemeJs')

@endsection

@section('content')
    <manage-order-page></manage-order-page>
@endsection
@section('PageJs')

@endsection
