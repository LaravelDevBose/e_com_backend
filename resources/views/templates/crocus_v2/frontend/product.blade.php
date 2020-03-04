@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Product')

@section('PageCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('crocus_v2/css/flexslider.css') }}">
    <style>
        .products-grid .product-image img {
            border: none !important;
        }
        .vue-star-rating {
            display: inline-block!important;
            margin-right: 5px;
        }
    </style>
@endsection

@section('Content')
<!-- Main Container -->
<section class="main-container col1-layout">
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-main">
                    <div class="product-view">
                        <div class="product-essential">
                            <form action="#" method="post" id="product_addtocart_form">
                                <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                <div class="product-img-box col-lg-4 col-sm-4 col-xs-12">
                                    <div class="new-label new-top-left"> New </div>
                                    <div class="product-image">
                                        <div class="product-full">
                                            <img id="product-zoom" src="{{ $product->thumbImage->image_path }}" data-zoom-image="{{ $product->thumbImage->image_path }}" alt="{{ $product->product_name }}"/>
                                        </div>
                                        @if(!empty($product->productImages) && count($product->productImages))
                                            <div class="more-views">
                                                <div class="slider-items-products">
                                                    <div id="gallery_01" class="product-flexslider hidden-buttons product-img-thumb">
                                                        <div class="slider-items slider-width-col4 block-content">
                                                            <div class="more-views-items">
                                                                <a href="#" data-image="{{ $product->thumbImage->image_path }}" data-zoom-image="{{ $product->thumbImage->image_path }}">
                                                                    <img id="product-zoom"  src="{{ $product->thumbImage->image_path }}" alt="{{ $product->product_name }}"/>
                                                                </a>
                                                            </div>

                                                            @foreach($product->productImages as $productImage)
                                                                <div class="more-views-items">
                                                                    <a href="#" data-image="{{ $productImage->attachment->image_path }}" data-zoom-image="{{ $productImage->attachment->image_path }}">
                                                                        <img id="product-zoom"  src="{{ $productImage->attachment->image_path }}" alt="{{ $product->product_name }}"/>
                                                                    </a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- end: more-images -->
                                </div>
                                <div class="product-shop col-lg-5 col-sm-5 col-xs-12">
{{--                                    <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>--}}
                                    <div class="product-name">
                                        <h1>{{ $product->product_name}}</h1>
                                    </div>
                                    <div class="ratings">
                                        <star-rating
                                            :star-size="18"
                                            :rating="{{ ($product->reviews->count() > 0)? $product->reviews->sum('rating')/$product->reviews->count(): 0 }}"
                                            :read-only="true"
                                        ></star-rating>
                                        <p class="rating-links">
                                            <a href="#reviews_tabs">{{ $product->reviews->count() }} Review(s)</a>
                                        </p>
                                    </div>
                                    <single-product-options :product="{{ $product }}"></single-product-options>
                                </div>

                                <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner">
                                    @if(!empty($hotProducts))
                                        <div class="hot-deal">
                                            <div class="title">Hot Deal</div>
                                            <div id="testimonials" class="product-flexslider hidden-buttons" style="margin-top: 0px;">
                                                <div class="products-grid slider-items slider-width-col1 owl-carousel owl-theme">
                                                    @foreach($hotProducts as $hotProduct)
                                                        <hot-deal-product :hotProduct="{{ $hotProduct }}"></hot-deal-product>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($product->seller->shop)
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
                                            </div>
                                            <div class="go-to-store">
                                                @if($product->seller->seller_id !== 1)
                                                    <a href="{{ route('front.shop.profile', $product->seller->shop->shop_slug) }}"> @lang('product.go_to_store')</a>
                                                @else
                                                    <a href="{{ route('front.mall') }}"> @lang('product.go_to_store')</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <div class="download-app">
                                        <h2>DOWNLOAD THE APP</h2>
                                        <img alt="banner" src="{{ asset('crocus_v2/images/google-play-btn.jpg') }}" class="app-btn">
                                        <img alt="banner" src="{{ asset('crocus_v2/images/apple-btn.jpg') }}" class="app-btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                    <div class="add_info">
                        <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                            <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                            <li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>
                        </ul>
                        <div id="productTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="product_tabs_description">
                                <div class="std">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews_tabs">
                                <div class="box-collateral box-reviews" id="customer-reviews">
                                    <div class="box-reviews2">
                                        <h3>Customer Reviews</h3>
                                        <div class="box visible">
                                            <ul>
                                                @if(!empty($product->reviews))
                                                    @foreach($product->reviews as $review)
                                                        <li>
                                                            <div class="review">
                                                                <small>Review by <span>{{ $review->buyer->user->full_name }} </span>on {{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}</small>
                                                                <div class="rating-box">
                                                                    <star-rating
                                                                        :star-size="20"
                                                                        :rating="{{ $review->rating }}"
                                                                        :read-only="true"
                                                                    ></star-rating>
                                                                </div>
                                                                <div class="review-txt">
                                                                    {{ $review->review }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main Container End -->

<!-- Related Products Slider -->

<div class="container">
    @if(!empty($relatedProducts))
    <!-- Related Slider -->
    <div class="related-pro">
        <div class="slider-items-products">
            <div class="related-block">
                <div id="related-products-slider" class="product-flexslider hidden-buttons">
                    <div class="home-block-inner">
                        <div class="block-title">
                            <h2>Related Products</h2>
                        </div>
                        <img alt="banner" src="{{ asset('crocus_v2/images/banner-img.png') }}">

                    </div>
                    <div class="slider-items slider-width-col4 products-grid block-content">
                        @foreach($relatedProducts as $relatedProduct)
                            <product-grid :product="{{ $relatedProduct }}"></product-grid>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End related products Slider -->
    @endif
</div>
@endsection

@section('PageJs')
    <script type="text/javascript" src="{{ asset('crocus_v2/js/jquery.flexslider.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('crocus_v2/js/cloud-zoom.js') }}" ></script>

@endsection
