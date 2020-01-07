@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Invoice Details')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <ol class="breadcrumb no-hide">
                <li><a href="{{ route('front.index') }}">{{ __('buyer.home') }}</a></li>
                <li><a href="{{ route('buyer.home') }}">{{ __('buyer.dashboard') }}</a></li>
                <li class="active">Order Details</li>
            </ol>

            <div class="row">

                <!-- Main Content -->
                <invoice-details-page :orderno="{{ $orderId }}"></invoice-details-page>
                <!-- Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9   col-sidebar">
                    @include('templates.kuteshop_v2.buyer.partials.right_side')
                </div>
                <!-- Sidebar -->
            </div>
        </div>
    </main>

@endsection

@section('PageJs')

@endsection
