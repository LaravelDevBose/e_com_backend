@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Add Your Review')

@section('PageCss')

@endsection

@section('Content')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <add-review-page :orderid="{{ $orderId }}"></add-review-page>
                <!-- right side -->
                @include('templates.crocus_v2.buyer.partials.right_side')
            </div>
        </div>
    </div>
@endsection

@section('PageJs')

@endsection
