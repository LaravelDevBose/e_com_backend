@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Account Information')

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
                            <h2>{{ __('header.Account Info') }}</h2>
                        </div>
                        <div class="dashboard">
                            <div class="box-account">
                                <account-info-update></account-info-update>
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
