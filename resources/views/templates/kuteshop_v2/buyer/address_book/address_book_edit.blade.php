@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Address Book')

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
                <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">
                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3">
                    <div class="col-main">
                        <h2 class="page-heading">
                            <span class="page-heading-title2">Add New Address</span>
                        </h2>
                        <div class="content-text clearfix wow bounceInUp animated">
                            <address-book-create :addressId="{{ $addressId }}" :isEdit="1"></address-book-create>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9   col-sidebar">
                    @include('templates.kuteshop_v2.buyer.partials.right_side')
                </div>
                <!-- Sidebar -->
            </div>
        </div>
    </main>
@endsection

@section('PageJs')

@endsection
