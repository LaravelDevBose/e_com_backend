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
                        <div class="my-wishlist">
                            <div class="table-responsive">

                                <fieldset>
                                    <wish-list-products></wish-list-products>

                                    <div class="buttons-set buttons-set2">
                                        <button class="button btn-share" title="Share Wishlist" name="save_and_share" type="submit"><span>Share Wishlist</span></button>
                                        <button class="button btn-add" onclick="addAllWItemsToCart()" title="Add All to Cart" type="button"><span>Add All to Cart</span></button>
                                        <button class="button btn-update" title="Update Wishlist" name="do" type="submit"><span>Update Wishlist</span></button>
                                    </div>
                                </fieldset>

                            </div>
                        </div>
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
