@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Address Book')

@section('PageCss')

@endsection

@section('Content')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-9 wow bounceInUp animated">
                    <div class="col-main">
                        <div class="my-account">
                            <div class="page-title">
                                <h2>My Address Book
                                    <a href="{{route('buyer.address.book.create')}}" class="text text-size-mini pull-right" style="text-decoration: underline"> Create</a>
                                </h2>

                            </div>
                            <div class="dashboard">
                                <div class="recent-orders">
                                    <address-book-list-page></address-book-list-page>
                                </div>
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
