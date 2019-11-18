@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title',__('buyer.wishlist'))

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="{{ route('front.index') }}">{{ __('buyer.home') }}</a></li>
                <li><a href="{{ route('buyer.home') }}">{{ __('buyer.dashboard') }}</a></li>
                <li class="active">{{ __('buyer.wishlist') }}</li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">

                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3  col-main">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">{{ __('buyer.wishlist') }}</span>
                    </h2>
                    <wishlist-page></wishlist-page>
                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9  col-sidebar">
                    @include('templates.kuteshop_v2.buyer.partials.right_side')
                </div><!-- Sidebar -->
            </div>
        </div>
    </main>
@endsection

@section('PageJs')

@endsection
