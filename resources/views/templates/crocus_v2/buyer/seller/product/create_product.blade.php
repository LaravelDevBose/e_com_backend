@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Add Product')

@section('PageCss')

@endsection

@section('Content')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <product-create></product-create>
                <!-- right side -->
                @include('templates.crocus_v2.buyer.partials.right_side')
            </div>
        </div>
    </div>
@endsection

@section('PageJs')

@endsection
