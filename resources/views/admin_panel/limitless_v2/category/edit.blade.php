@extends('layouts.app')
@section('PageTitle','Category Create')

@section('PageCss')

@endsection

@section('ThemeJs')

@endsection

@section('content')

    <category-create-page :categoryId="{{ $categoryId }}" :isEdit="1"></category-create-page>
@endsection
@section('PageJs')

@endsection
