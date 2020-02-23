@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Product')

@section('PageCss')
    <style>
        .single-box {
            margin-top: 0px;
        }
        .comment-list .comment-body {
            margin-left: 0px;
        }
        .comment-list {
            margin-top: 0px;
        }
        .vue-star-rating-rating-text{
            display: none;
        }
    </style>
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
                                                <star-rating
                                                    :star-size="18"
                                                    :rating="{{ ($product->reviews->count() > 0)? $product->reviews->sum('rating')/$product->reviews->count(): 0 }}"
                                                    :read-only="true"
                                                ></star-rating>
                                            </div>
                                            <div class="reviews-actions">
                                                <a href="#" class="action view">Based  on {{ $product->reviews->count() }} ratings</a>
                                            </div>
                                        </div>
                                        <singel-product-options :product="{{ $product }}"></singel-product-options>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5">
                                    <div class="text-widget widget widget__sidebar shop-info bg-section">
                                        <div class="widget-content">
                                            <h3 class="section-title">
                                                <span>Delivery Options</span>
                                            </h3>
                                            @if(!empty($deliveryMethods))
                                                @foreach($deliveryMethods as $method)
                                                <p class="delivery-type">
                                                    <i class="fa fa-truck"></i>
                                                    <span class="text-left type-name">{{ $method->delivery_title }}</span>
                                                    <br>

                                                    <span class="delivery-time">
                                                        ({{ $method->min_time.'-'.$method->max_time }} days)
                                                    </span>

                                                    <span class="pull-right">$ {{ $method->cost_price }}</span>
                                                </p>
                                                @endforeach
                                            @endif
                                            <p class="delivery-type">
                                                <i class="fa fa-money"></i>
                                                <span class="text-left type-name">Cash on Delivery {{ ($product->productDetails->cod_avail == 1)?'Available':'Not Available' }} </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="text-widget widget widget__sidebar shop-info bg-section">
                                        <div class="widget-content">
                                            <h3 class="section-title">
                                                <span> Return & Refund Policy </span>
                                            </h3>
                                            <p class="delivery-type">
                                                <i class="fa fa-undo"></i>
                                                <span class="text-left type-name">Instant return to delivery man</span>
                                                <br>
                                                <span class="delivery-time">Change of mind is not applicable</span>
                                            </p>

                                            <p class="delivery-type">
                                                <i class="fas fa-shield-alt"></i>
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
                                                    <li>
                                                        <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-s-1.png')}}">
                                                    </li>
                                                    <li>
                                                        <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-s-2.png')}}">
                                                    </li>
                                                    <li>
                                                        <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-s-3.png')}}">
                                                    </li>
                                                    <li>
                                                        <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-s-4.png')}}">
                                                    </li>
                                                    <li>
                                                        <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-5.png')}}" style="height: 46px;">
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    @if(!empty($product->mall_comp_name))
                                    <div class="text-widget widget widget__sidebar mall-info">
                                        <div class="comp-info" style="border-bottom: 1px solid #eee;">
                                            <h5>Sold By</h5>
                                        </div>
                                        <div class="widget-content">
                                            <div class="cominfo">
                                                <div class="item text-center">
                                                    @if(!empty($product->mallLogo))
                                                        <img class="img img-thumbnail"  alt="blog image" src="{{ $product->mallLogo->image_path }}">
                                                    @else
                                                        <img class="img img-thumbnail"  alt="blog image" src="{{ asset('crocus_v2/images/blog-img.jpg') }}">
                                                    @endif
                                                </div>
                                                <h3 class="comp-name text-center" >
                                                    <span style="text-transform: capitalize">{{ $product->mall_comp_name }}</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="text-widget widget widget__sidebar shop-info">
                                        <div class="widget-content site-footer">
                                            <div class="cominfo">
                                                @if($product->seller->seller_id !== 1)
                                                <div class="item">
                                                    @if(!empty($product->seller->shop->shopLogo->image_path))
                                                        <img class="img img-circle" style="margin: 0 auto;" width="60" height="60" alt="blog image" src="{{ $product->seller->shop->shopLogo->image_path }}">
                                                    @else
                                                        <img class="img img-circle" style="margin: 0 auto;" width="60" height="60" alt="blog image" src="{{ asset('crocus_v2/images/blog-img.jpg') }}">
                                                    @endif
                                                </div>
                                                @endif
                                                <h3 class="shop-name float-right" >
                                                    @if($product->seller->seller_id !== 1)
                                                    <span>{{ $product->seller->shop->shop_name }}</span>
                                                    @else
                                                        <span> {{ $mallTitle }}</span>
                                                    @endif
                                                </h3>
                                            </div>
                                            @if(!empty($showSellerInfo) && $showSellerInfo->value == 1 && $product->seller->seller_id !== 1)
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
                                            @endif
                                            {{--<div class="block-social">
                                                <div class="block-content" style="text-align: center!important;">
                                                    <a href="" class="sh-facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                                    <a href="" class="sh-pinterest"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                                    <a href="" class="sh-twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="" class="sh-google"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a>
                                                </div>
                                            </div>--}}
                                        </div>
                                        <div class="go-to-store">
                                            @if($product->seller->seller_id !== 1)
                                            <a href="{{ route('front.shop.profile', $product->seller->shop->shop_slug) }}"> @lang('product.go_to_store')</a>
                                            @else
                                                <a href="{{ route('front.mall') }}"> @lang('product.go_to_store')</a>
                                            @endif
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
                            <li role="presentation"><a href="#reviews"  role="tab" data-toggle="tab">{{ trans_choice('header.review',2) }}</a></li>
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
                                    <div class="single-box">
                                        @if(!empty($product->reviews))
                                        <div class="comment-list">
                                            <ul>
                                                @foreach($product->reviews as $review)
                                                <li>
                                                    <div class="comment-body">
                                                        <div class="comment-meta">
                                                            <span class="author"><a href="#">{{ $review->buyer->user->full_name }}</a></span>
                                                            <span class="date">{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}</span>
                                                        </div>
                                                        <div class="comment-meta">
                                                            <star-rating
                                                                :star-size="20"
                                                                :rating="{{ $review->rating }}"
                                                                :read-only="true"
                                                            ></star-rating>
                                                        </div>
                                                        <div class="comment">
                                                            {{ $review->review }}
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @else
                                            <div class="text-center">
                                                <p class="text-bold h4">No Review yet</p>
                                            </div>
                                        @endif
                                    </div>
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
                            <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":4},"1200":{"items":5},"1400":{"items":5}}'>
                                @foreach($relatedProducts as $relatedProduct)
                                <li class="product-item product-item-opt-2">
                                    <product-grid :product="{{ $relatedProduct }}" :mallname="{{ json_encode($mallTitle) }}"></product-grid>
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


@endsection
