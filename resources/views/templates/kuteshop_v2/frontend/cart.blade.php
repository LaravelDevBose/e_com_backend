@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Shopping Cart')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->
            <h2 class="page-heading" style="margin-top: 2rem;">
                <span class="page-heading-title2">@lang('checkout.cart_header')</span>
            </h2>
            <cart-page></cart-page>
            <br>
        </div>


    </main>
@endsection

@section('PageJs')

@endsection
