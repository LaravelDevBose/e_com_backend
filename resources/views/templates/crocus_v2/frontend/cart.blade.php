@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Shopping Cart')

@section('PageCss')

@endsection

@section('Content')
<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <cart-page></cart-page>
            <div class="crosssel bounceInUp animated">
                <div class="new_title">
                    <h2><strong>you may be interested</strong> </h2>
                </div>
                <cart-suggested-products></cart-suggested-products>
            </div>
        </div>
    </div>
</section>
@endsection

@section('PageJs')

@endsection

