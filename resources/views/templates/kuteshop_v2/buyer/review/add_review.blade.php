@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Add Your Review')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <ol class="breadcrumb no-hide">
                <li><a href="{{ route('front.index') }}">{{ __('buyer.home') }}</a></li>
                <li><a href="{{ route('buyer.home') }}">{{ __('buyer.dashboard') }}</a></li>
                <li><a href="{{ route('buyer.address.book') }}">{{ __('buyer.address_list') }}</a></li>
                <li class="active">Add Your Review</li>
            </ol>
            <div class="row">
                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3">
                    <div class="col-main">
                        <h2 class="page-heading">
                            <span class="page-heading-title2">{{ __('buyer.add_new_address') }}</span>
                        </h2>
                        <add-review-page :orderid="{{ $orderId }}"></add-review-page>
                    </div>
                </div>

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
