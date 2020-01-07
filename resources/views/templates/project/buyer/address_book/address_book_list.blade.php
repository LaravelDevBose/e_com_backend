@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', __('buyer.address_list'))

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <ol class="breadcrumb no-hide">
                <li><a href="{{ route('front.index') }}">{{ __('buyer.home') }}</a></li>
                <li><a href="{{ route('buyer.home') }}">{{ __('buyer.dashboard') }}</a></li>
                <li class="active">{{ __('buyer.address_book') }}</li>
            </ol>


            <div class="row">

                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3">
                    <div class="col-main">
                        <h2 class="page-heading">
                            <span class="page-heading-title2">{{ __('buyer.address_list') }}</span>
                            <a href="{{route('buyer.address.book.create')}}" class="text text-size-mini pull-right" style="text-decoration: underline; font-size: 13px; color: #f78031;">{{ __('buyer.new_address') }}</a>
                        </h2>
                        <div class="content-text clearfix wow bounceInUp animated">
                            <address-book-list-page></address-book-list-page>
                        </div>
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
