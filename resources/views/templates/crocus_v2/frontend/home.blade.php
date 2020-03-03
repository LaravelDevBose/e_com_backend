@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Home')

@section('PageCss')
@endsection

@section('Content')
<news-letter-section></news-letter-section>
<!-- Newsletter and social widget end-->

<!-- Slider -->
<div id="thmsoft-slideshow" class="thmsoft-slideshow">
    <div class="container">
        <div class="row">
            <div class=" col-lg-3 col-md-3 col-sm-5 col-xs-12 col-mid">
                @if(!empty($topProducts))
                <div class="top-products">
                    <div class="title">Top Products</div>
                    <ul>
                        @foreach($topProducts as $topProduct)
                        <li>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 no-margin">
                                    <img alt="{{ $topProduct->product->product_name }}" src="{{ $topProduct->product->thumbImage->image_path }}">
                                </div>
                                <div class="col-xs-8 col-sm-8 no-margin">
                                    <a href="{{ route('front.product', $topProduct->product->product_slug) }}"> {{ substr($topProduct->product->product_name,0, 20) }} {{ (strlen($topProduct->product->product_name) > 40)?'...':'' }}</a>
                                    <div class="rating">
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div style="width:80%" class="rating"></div>
                                            </div>
                                            <p class="rating-links"> <a href="#">1 Review(s)</a></p>
                                        </div>
                                    </div>
                                    @if($topProduct->product->product_type == 1)
                                    <div class="price">$ {{ $topProduct->product->product_price }}</div>
                                    @else
                                    <div class="price">$ {{ $topProduct->product->singleVariation->price }}</div>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-md-6 col-sm-7 col-xs-12">
                <div class="small-strip"><img alt="banner" src="{{ asset('crocus_v2/images/small-strip-banner.jpg')}}"></div>
                <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                    <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                        @if(!empty($sliders))
                        <ul>
                            @foreach($sliders as $slider)
                            <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ $slider->attachment->image_path }}'>
                                <img src='{{ $slider->attachment->image_path }}' alt="{{ $slider->slider_title }}" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' />
                                <div class="info">
                                    <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='900' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;max-width:auto;max-height:auto;white-space:nowrap;'><span>{{ $slider->slider_title }}</span> </div>
                                    <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1200' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'>{{ $slider->sub_title }}</div>
                                    <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500' data-speed='500' data-start='1400' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'><a href='{{ $slider->btn_url }}' class="buy-btn">{{ $slider->btn_text }}</a> </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class=" col-lg-3 col-md-3 col-sm-7 col-xs-12">
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
            </div>
        </div>
    </div>
</div>
<!-- end Slider -->

<slider-buttom-section></slider-buttom-section>
<div class="content-page">
    <div class="container">
        <div class="row">

            <!-- featured category fashion -->
            <div class="col-md-12" >
                @if(!empty($latestDeals))
                    <latest-deal-section :latest_deal="{{ $latestDeals }}"></latest-deal-section>
                @endif
                @if(!empty($categorySection))
                    @foreach($categorySection as $key=> $section)
                        @if(!empty($section['productList']))
                            <div class="category-product">
                                <div class="navbar nav-menu">
                                    <div class="navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li>
                                                <div class="new_title">
                                                    <h2>{{ $section['category']->category_name }}</h2>
                                                </div>
                                            </li>
                                            <?php $activeCheckH = 1; ?>
                                            @foreach($section['productList'] as $indexName=> $productType)
                                                @if(!empty($productType))
                                                    <li class="{{ ($activeCheckH== 1)?'active':'' }}">
                                                        <a data-toggle="tab" href="#tab-{{$key.'-'.$activeCheckH }}">
                                                            @if($indexName == 'bestSeller')
                                                                <span>Best Seller Products</span>
                                                            @elseif($indexName == 'mostReviews')
                                                                <span>Most Reviews Products</span>
                                                            @elseif($indexName == 'newArrivals')
                                                                <span>New Arrivals Products</span>
                                                            @else
                                                                <span>Other Products</span>
                                                            @endif
                                                        </a>
                                                    </li>
                                                    <?php $activeCheckH++; ?>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                                <div class="product-bestseller">
                                    <div class="product-bestseller-content">
                                        <div class="product-bestseller-list">
                                            <div class="tab-container">
                                                <!-- tab product -->
                                                <?php $activeCheck = 1; ?>
                                                @foreach($section['productList'] as $productType)
                                                    @if(!empty($productType))
                                                        <div class="tab-panel {{ ($activeCheck== 1)?'active':'' }} " id="tab-{{$key.'-'.$activeCheck }}">
                                                            <div class="category-products">
                                                                <ul class="products-grid">
                                                                    @foreach($productType as $product)
                                                                        @if(!empty($product))
                                                                            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                                                                                <product-grid :product="{{ $product }}"></product-grid>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php $activeCheck++; ?>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="col-md-3">

                <!-- home side banner -->
                <div class="home-side-banner"> <img alt="banner" src="{{ asset('crocus_v2/images/home-banner.png')}}"> </div>
                <div class="side-banner-img"> <a href="#" title="Image"> <img src="{{ asset('crocus_v2/images/mid-banner2.png')}}" alt="Image"></a> </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PageJs')
<script type='text/javascript'>

    import ProductGrid from "../../kuteshop_v2/vue/components/product/ProductGrid";

    jQuery(document).ready(function() {
        jQuery('#rev_slider_4').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 600,
            startheight: 461,
            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,
            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',
            touchenabled: 'on',
            onHoverStop: 'on',
            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,
            spinner: 'spinner0',
            keyboardNavigation: 'off',
            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,
            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,
            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,
            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'off',
            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: 'off',
            autoHeight: 'off',
            forceFullWidth: 'on',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,
            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
    export default {
        components: {ProductGrid}
    }
@endsection
