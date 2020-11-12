@extends('layouts.app')
@section('PageTitle','Edit General Pages')

@section('PageCss')

@endsection

@section('ThemeJs')

@endsection

@section('content')
    <edit-general-pages :id="{{ $pageId }}"></edit-general-pages>
@endsection
@section('PageJs')

@endsection

