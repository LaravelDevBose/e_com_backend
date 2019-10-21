@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','My Wishlist')

@section('PageCss')

@endsection

@section('Content') <div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 wow bounceInUp animated">
                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <h2>My Wishlist</h2>
                        </div>
                        <wishlist-page></wishlist-page>
                        <div class="buttons-set">
                            <p class="back-link"><a href="#/customer/account/"><small>« </small>Back</a></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- right side -->
            @include('templates.crocus_v2.buyer.partials.right_side')
        </div>
    </div>
</div>
@endsection

@section('PageJs')

@endsection
