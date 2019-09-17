@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Checkout')

@section('PageCss')

@endsection

@section('Content')
    <!-- main-container -->
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-9 wow bounceInUp animated">
                    <checkout-page></checkout-page>
                </section>
                <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
                    <checkout-sidebar></checkout-sidebar>
                </aside>
            </div>
        </div>
    </div>
    <!--End main-container -->

@endsection

@section('PageJs')

@endsection
