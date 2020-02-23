@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Shop Profile')

@section('PageCss')
    <style>
        .shop-info .cominfo{
            height: 45px;
        }
        .block-section-top2 .box-section-top{
            padding-left: 0;
        }
    </style>
@endsection

@section('Content')
    <main class="site-main">
        <div class="columns container" style="padding-top: 2em;">
            <div class="row">
                <!-- Main Content -->
                <div class="col-md-9 col-main">
                    <div class="block-section-top block-section-top2">
                        <div class="box-section-top">
                            @if(!empty($sliders) && count($sliders) > 0)
                                <div class="block-slide-main slide-opt-2">
                                    <div class="owl-carousel "
                                         data-nav="true"
                                         data-dots="false"
                                         data-margin="0"
                                         data-items='1'
                                         data-autoplayTimeout="700"
                                         data-autoplay="true"
                                         data-loop="true">
                                        @foreach($sliders as $slider)
                                            <div class="item item2" >
                                                <a href="{{ $slider->btn_url }}" title="{{ $slider->slider_title }}" class="img-slide">
                                                    <img src="{{ $slider->attachment->image_path }}" alt="{{ $slider->slider_title }}" style="width: 100%; height: 27rem">
                                                    <h3></h3>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sidebar">
                    <div class="text-widget widget widget__sidebar bg-section shop-info">
                        <div class="widget-content site-footer">
                            <div class="cominfo text-center">
                                <h3 class="shop-name">
                                    <span>{{ $mallTitle  }}</span>
                                </h3>
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
                                            <mall-product-grid :product="{{ $product }}" :mallname="{{ json_encode($mallTitle) }}"></mall-product-grid>
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
