@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Edit Address Book')

@section('PageCss')

@endsection

@section('Content')
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <address-book-create :addressId="{{ $addressId }}" :isEdit="1"></address-book-create>
            <!-- right side -->
            @include('templates.crocus_v2.buyer.partials.right_side')
        </div>
    </div>
</div>
@endsection

@section('PageJs')

@endsection
