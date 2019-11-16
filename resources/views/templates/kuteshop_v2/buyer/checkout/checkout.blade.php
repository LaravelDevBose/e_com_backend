@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Checkout')

@section('PageCss')
    <style>
        .chosen-container, .chosen-container-single{
            width:100% !important;
        }
        .chosen-container .chosen-single{
            background: none;
            border-radius: 0px;
            height: 31px;
            line-height: 30px;
            border: 1px solid #ececec;
        }
        .box-border{
            overflow: visible;
        }
    </style>
@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->
            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li class="active"> Checkout</li>
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2"> Checkout</span>
            </h2>
            <checkout-page></checkout-page>
        </div>
    </main>

@endsection

@section('PageJs')

@endsection

