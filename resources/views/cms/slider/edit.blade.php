@extends('layouts.app')
@section('PageTitle','Slider Edit Page')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
  <slider-edit-page :id="{{ $id }}"></slider-edit-page>
@endsection
@section('PageJs')

@endsection
