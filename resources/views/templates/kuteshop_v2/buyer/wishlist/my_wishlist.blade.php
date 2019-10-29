@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','My Wishlist')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li><a href="#">My account    </a></li>
                <li class="active">My wishlist</li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">

                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3  col-main">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">My wishlist</span>
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
