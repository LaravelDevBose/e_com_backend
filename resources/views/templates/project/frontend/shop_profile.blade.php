@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Shop Profile')

@section('PageCss')

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
                    <div class="text-widget widget widget__sidebar bg-section shop-info">
                        <div class="widget-content site-footer">
                            <div class="cominfo">
                                <div class="item">
                                    @if(!empty($shop->shopLogo->image_path))
                                        <img class="img img-circle" style="margin: 0 auto;" width="60" height="60" alt="blog image" src="{{ $shop->shopLogo->image_path }}">
                                    @else
                                        <img class="img img-circle" style="margin: 0 auto;" width="60" height="60" alt="blog image" src="{{ asset('crocus_v2/images/blog-img.jpg') }}">
                                    @endif
                                </div>
                                <h3 class="shop-name float-right">
                                    <span>{{ $shop->shop_name }}</span>
                                </h3>
                            </div>
                            <div>
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
                                <div class="block-social">
                                    <div class="block-content" style="text-align: center!important;">
                                        <a href="" class="sh-facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                        <a href="" class="sh-pinterest"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a href="" class="sh-twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a href="" class="sh-google"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>

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
                                        <div class="product-item  product-item-opt-2">
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
