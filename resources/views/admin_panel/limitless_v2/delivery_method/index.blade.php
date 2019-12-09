@extends('layouts.app')
@section('PageTitle','Delivery Method')

@section('PageCss')

@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
<delivery-method-page></delivery-method-page>
@endsection
@section('PageJs')

@endsection

