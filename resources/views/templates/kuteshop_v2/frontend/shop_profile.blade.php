@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Shop Profile')

@section('PageCss')
    <style>
        .text-widget.widget.widget__sidebar{
            border: 1px solid #eee;
            margin-bottom: 1em;
        }
        .widget-content {
            padding: 15px;
        }
        .shop-info .sold-by{
            font-size: 12px;
            color: #6d6d6d;
        }
        .shop-info .shop-name{
            font-size: 15px;
            font-weight: 800;
            margin: 0;
            padding-bottom: 5px;
            color: #333;
        }
        .shop-info .shop-address{
            font-size: 13px;
            margin: 0;
            color: #6d6d6d;
            line-height: 2rem;
        }
        .shop-info .go-to-store{
            padding: 7px;
            border-top: 1px solid #eee;
            text-align: center;
            text-transform: uppercase;
        }
        .go-to-store a{

            font-weight: bold;
            font-size: 13px;
            color: #0db1b9;
        }
    </style>
@endsection

@section('Content')
    <main class="site-main">
        <div class="columns container" style="padding-top: 2em;">
            <div class="row">
                <!-- Main Content -->
                <div class="col-md-9 col-main">
                    <div class="category-view">
                        @if(!empty($shop->banner->image_path))
                            <img class="" src="{{ $shop->banner->image_path }}" alt="category-banner">
                        @else
                            <img class="" src="{{ asset('crocus_v2/images/listing-banner.png') }}" alt="category-banner">
                        @endif
                    </div>

                </div>
                <div class="col-md-3 col-sidebar">
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
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(!empty($shop->seller->products))
                        <div class="category-links text-center text-capitalize">
                            <h5>All Products</h5>
                        </div>

                        <div class="products  products-grid">
                            <ol class="product-items row">
                                @foreach($shop->seller->products as $product)
                                    <li class="col-sm-3">
                                        <div class="product-item  product-item-opt-1">
                                            <product-grid  :product="{{ $product }}"></product-grid>
                                        </div>
                                    </li>
                                @endforeach
                            </ol><!-- list product -->
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </main>

@endsection

@section('PageJs')

@endsection
