@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Shop Profile')

@section('PageCss')

@endsection

@section('Content')
    <section class="main-container col2-left-layout bounceInUp animated">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-description std">
                        @if(!empty($shop->banner->image_path))
                            <img class="" src="{{ $shop->banner->image_path }}" alt="category-banner">
                        @else
                            <img class="" src="{{ asset('crocus_v2/images/listing-banner.png') }}" alt="category-banner">
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-widget widget widget__sidebar">
                        <div class="widget-content">
                            <div class="item text-center">
                                @if(!empty($shop->shopLogo->image_path))
                                    <img class="img img-circle" style="margin: 0 auto;" width="100" height="100" alt="blog image" src="{{ $shop->shopLogo->image_path }}">
                                @else
                                    <img class="img img-circle" style="margin: 0 auto;" width="100" height="100" alt="blog image" src="{{ asset('crocus_v2/images/blog-img.jpg') }}">
                                @endif
                            </div>
                            <h3 class="text text-capitalize text-center" style="margin-top: 3px;"><span>{{ $shop->shop_name }}</span></h3>
                            @if(!empty($shop->phone_no))
                                <p class="shop-address">
                                    <i class="fa fa-phone"></i>
                                    <span>{{ $shop->phone_no }}</span>
                                </p>
                            @endif
                            @if(!empty($shop->shop_address))
                                <p class="shop-address">
                                    <i class="fa fa-map-marker"></i>
                                    <span>{!! $shop->shop_address !!}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <article class="col-main row">
                        @if(!empty($shop->seller->products))
                        <h2 class="page-heading"> <span class="page-heading-title">All Products</span> </h2>
                        <div class="category-products">
                            <ul class="products-grid">
                                @foreach($shop->seller->products as $product)
                                <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <product-grid :product="{{ $product }}"></product-grid>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('PageJs')

@endsection
