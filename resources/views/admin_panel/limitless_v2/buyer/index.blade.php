@extends('layouts.app')
@section('PageTitle','Seller List')

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
    </style>
@endsection

@section('ThemeJs')

@endsection

@section('content')
    <buyer-list-page></buyer-list-page>
@endsection
@section('PageJs')

@endsection
