@extends('layouts.app')
@section('PageTitle','Page Show')

@section('PageCss')

@endsection

@section('ThemeJs')


    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/blog_single.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
<show-general-pages :id="{{ $pageId }}"></show-general-pages>
@endsection
@section('PageJs')

@endsection
