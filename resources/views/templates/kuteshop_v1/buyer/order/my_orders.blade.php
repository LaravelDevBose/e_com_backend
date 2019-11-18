@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','My Orders')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <ol class="breadcrumb no-hide">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><a href="{{ route('buyer.home') }}">Dashboard</a></li>
                <li class="active">My Order</li>
            </ol>

            <div class="row">

                <!-- Main Content -->
                <my-order-page></my-order-page>
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
