@extends('layouts.app')
@section('PageTitle','Page Show')

@section('PageCss')

@endsection

@section('ThemeJs')

@endsection

@section('content')
<show-general-pages :id="{{ $pageId }}"></show-general-pages>
@endsection
@section('PageJs')

@endsection
