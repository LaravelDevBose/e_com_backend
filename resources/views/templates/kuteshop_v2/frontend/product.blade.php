@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Product')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
{{--                <li><a href="#">Home    </a></li>--}}
{{--                <li><a href="#">Electronics    </a></li>--}}
{{--                <li class="active">Machine Pro</li>--}}
            </ol><!-- Block  Breadcrumb-->

            <div class="row">
                <!-- Main Content -->
                <div class="col-md-12  col-main">

                    <div class="row">

                        <div class="col-sm-6 col-md-5 col-lg-5">
                            <div class="product-media media-horizontal">
                                <div class="image_preview_container images-large">
                                    <img id="img_zoom" data-zoom-image="{{ $product->thumbImage->image_path }}" src="{{ $product->thumbImage->image_path }}" alt="{{ $product->product_name }}">
                                    <button class="btn-zoom open_qv"><span>zoom</span></button>
                                </div>
                                <div class="product_preview images-small">

                                    <div class="owl-carousel thumbnails_carousel" id="thumbnails"  data-nav="true" data-dots="false" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":4},"600":{"items":5},"768":{"items":3}}'>
                                        <a href="#" data-image="{{ $product->thumbImage->image_path }}" data-zoom-image="{{ $product->thumbImage->image_path }}">

                                            <img src="{{ $product->thumbImage->image_path }}" data-large-image="{{ $product->thumbImage->image_path }}" alt="{{ $product->product_name }}">

                                        </a>
                                        @if(!empty($product->productImages) && count($product->productImages))
                                            @foreach($product->productImages as $productImage)
                                                <a href="#" data-image="{{ $productImage->attachment->image_path }}" data-zoom-image="{{ $productImage->attachment->image_path }}">
                                                    <img src="{{ $productImage->attachment->image_path }}" data-large-image="{{ $productImage->attachment->image_path }}" style="max-height: 117px;" alt="{{ $product->product_name }}">
                                                </a>
                                            @endforeach
                                        @endif
                                    </div><!--/ .owl-carousel-->
                                </div><!--/ .product_preview-->
                            </div><!-- image product -->
                        </div>

                        <div class="col-sm-6 col-md-7 col-lg-7">
                            <div class="row">
                                <div class="col-sm-12 col-md-7 col-lg-7">
                                    <div class="product-info-main">

                                        <h1 class="page-title">
                                            {{ $product->product_name }}
                                        </h1>
                                        <div class="product-reviews-summary">
                                            <div class="rating-summary">
                                                <div class="rating-result" title="70%">
                                                <span style="width:70%">
                                                    <span><span>70</span>% of <span>100</span></span>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="reviews-actions">
                                                <a href="" class="action view">Based  on 3 ratings</a>
                                                {{--                                        <a href="" class="action add"><img alt="img" src="/kuteshop_v2/images/icon/write.png">&#160;&#160;write a review</a>--}}
                                            </div>
                                        </div>



                                        <singel-product-options :product="{{ $product }}"></singel-product-options>
                                        {{--<div class="product-addto-links-second">
                                            <a href="" class="action action-print">Print</a>
                                            <a href="" class="action action-friend">Send to a friend</a>
                                        </div>
                                        <div class="share">
                                            <img src="/kuteshop_v2/images/media/index1/share.png" alt="share">
                                        </div>--}}
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <div class="text-widget widget widget__sidebar shop-info bg-section">
                                        <div class="widget-content">
                                            <h3 class="section-title">
                                                <span>Delivery Options</span>
                                            </h3>
                                            <p class="delivery-type">
                                                <i class="fa fa-truck"></i>
                                                <span class="text-left type-name">Home Delivery</span>
                                                <br>
                                                <span class="delivery-time">(3-4 days)</span>
                                                <span class="pull-right">$ 50</span>
                                            </p>

                                            <p class="delivery-type">
                                                <i class="fa fa-money"></i>
                                                <span class="text-left type-name">Cash on Delivery Available</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-widget widget widget__sidebar shop-info bg-section">
                                        <div class="widget-content">
                                            <h3 class="section-title">
                                                <span>Return & Refund Policy</span>
                                            </h3>
                                            <p class="delivery-type">
                                                <i class="fa fa-undo"></i>
                                                <span class="text-left type-name">Instant return to delivery man</span>
                                                <br>
                                                <span class="delivery-time">Change of mind is not applicable</span>
                                            </p>

                                            <p class="delivery-type">
                                                <i class="fa fa-shield"></i>
                                                <span class="text-left type-name">Check our Refund Policy</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-widget widget widget__sidebar shop-info bg-section">
                                        <div class="widget-content">
                                            <h3 class="section-title">
                                                <span>Payment Options</span>
                                            </h3>
                                            <div class="payment-options">
                                                <ul>
                                                    <li><img alt="payment" src="http://127.0.0.1:8000/kuteshop_v2/images/media/index1/payment1.png"></li>
                                                    <li><img alt="payment" src="http://127.0.0.1:8000/kuteshop_v2/images/media/index1/payment1.png"></li>
                                                    <li><img alt="payment" src="http://127.0.0.1:8000/kuteshop_v2/images/media/index1/payment1.png"></li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="text-widget widget widget__sidebar shop-info">
                                        <div class="widget-content site-footer">
                                            <div class="cominfo">
                                                <div class="item">
                                                    @if(!empty($product->seller->shop->shopLogo->image_path))
                                                        <img class="img img-circle" style="margin: 0 auto;" width="60" height="60" alt="blog image" src="{{ $product->seller->shop->shopLogo->image_path }}">
                                                    @else
                                                        <img class="img img-circle" style="margin: 0 auto;" width="60" height="60" alt="blog image" src="{{ asset('crocus_v2/images/blog-img.jpg') }}">
                                                    @endif
                                                </div>
                                                <h3 class="shop-name float-right" >
                                                    <span>{{ $product->seller->shop->shop_name }}</span>
                                                </h3>
                                            </div>
                                            @if(!empty($product->seller->shop->phone_no))
                                                <p class="shop-address">
                                                    <i class="fa fa-phone"></i>
                                                    <span>{{ $product->seller->shop->phone_no }}</span>
                                                </p>
                                            @endif
                                            @if(!empty($product->seller->shop->shop_address))
                                                <p class="shop-address">
                                                    <i class="fa fa-map-marker"></i>
                                                    <span>{!! $product->seller->shop->shop_address !!}</span>
                                                </p>
                                            @endif
                                            <div class="block-social">
                                                <div class="block-content" style="text-align: center!important;">
                                                    <a href="" class="sh-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    <a href="" class="sh-pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                                    <a href="" class="sh-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="" class="sh-google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="go-to-store">
                                            <a href="{{ route('front.shop.profile', $product->seller->shop->shop_slug) }}"> @lang('product.go_to_store')</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- Main detail -->

                    </div>

                    <!-- product tab info -->

                    <div class="product-info-detailed ">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#description"  role="tab" data-toggle="tab">@lang('product.details') </a></li>
{{--                            <li role="presentation"><a href="#tags"  role="tab" data-toggle="tab">information </a></li>--}}
                            <li role="presentation"><a href="#reviews"  role="tab" data-toggle="tab">{{ trans_choice('header.review',2) }}</a></li>
{{--                            <li role="presentation"><a href="#additional"  role="tab" data-toggle="tab">Extra Tabs</a></li>--}}
{{--                            <li role="presentation"><a href="#tab-cust"  role="tab" data-toggle="tab">Guarantees</a></li>--}}
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="block-title">@lang('product.details') </div>
                                <div class="block-content">
                                    {!! $product->description !!}
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div class="block-title">{{ trans_choice('header.review',2) }}</div>
                                <div class="block-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product tab info -->

                    <!-- block-related product -->
                    <div class="block-related ">
                        <div class="block-title">
                            <strong class="title">{{ trans_choice('product.related_product',count($relatedProducts) ) }}</strong>
                        </div>
                        <div class="block-content ">
                            <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":3},"1200":{"items":4}}'>
                                @foreach($relatedProducts as $relatedProduct)
                                <li class="product-item product-item-opt-2">
                                    <product-grid :product="{{ $relatedProduct }}"></product-grid>
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    <!-- block-related product -->
                </div><!-- Main Content -->
            </div>
        </div>


    </main>
@endsection

@section('PageJs')
    <script>

        (function($) {

            "use strict";

            $(document).ready(function() {

                /*  [ Filter by price ]

                - - - - - - - - - - - - - - - - - - - - */

                $('#slider-range').slider({

                    range: true,

                    min: 0,

                    max: 500,

                    values: [0, 300],

                    slide: function (event, ui) {

                        $('#amount-left').text(ui.values[0] );
                        $('#amount-right').text(ui.values[1] );

                    }

                });

                $('#amount-left').text($('#slider-range').slider('values', 0));

                $('#amount-right').text($('#slider-range').slider('values', 1));
            });

        })(jQuery);

    </script>

@endsection
