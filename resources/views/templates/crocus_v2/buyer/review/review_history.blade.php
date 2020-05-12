@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Review History')

@section('PageCss')

@endsection

@section('Content')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <section class="col-sm-9 wow bounceInUp animated">
                    <div class="col-main">
                        <review-list-page></review-list-page>
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
