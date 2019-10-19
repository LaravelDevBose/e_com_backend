@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title','Home')

@section('PageCss')
    <style>

    </style>
@endsection

@section('Content')
{{--
<div class="subscribe-area hidden-xs">
    <div class="container">
        <div class="subscribe-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subscribe">
                        <div class="subscribe-title">
                            <label>Sign Up for Our Newsletter:</label>
                        </div>
                        <form id="subscribe-form" method="post" action="#">
                            <div class="subscribe-content">
                                <input type="text" id="subscribe-input" name="email">
                                <button class="button" type="submit"><span>Subscribe</span></button>
                            </div>
                        </form>
                    </div>
                    <div class="subscribe-text-link">
                        <div class="subscribe-link">
                            <ul class="social-link">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                            <p class="discount-text"><strong>WINTER SALE!</strong> 20% off on selected items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter and social widget end-->
--}}

<!-- Slider -->
<div id="thmsoft-slideshow" class="thmsoft-slideshow">
    <div class="container">
        <div class="row">
            <div class=" col-lg-3 col-md-3 col-sm-5 col-xs-12 col-mid">
                <!--<div class="col-inner ">
                      <div class="img-block"> <a href="#" class="ves-btnlink img-animation" title="Image"> <img src="{{ asset('crocus_v2/images/mid-banner1.png')}}"  alt="Image"></a> </div>
                      <div class="img-block1"> <a href="#" title="Image"> <img src="{{ asset('crocus_v2/images/mid-banner2.png')}}"  alt="Image"></a> </div>
                    </div>-->
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
                                    <a href="{{ route('front.product', $topProduct->product->product_slug) }}"> {{ $topProduct->product->product_name }}</a>
                                    <div class="rating">
                                        <div class="ratings">
                                            <div class="rating-box">
                                                <div style="width:80%" class="rating"></div>
                                            </div>
                                            <p class="rating-links"> <a href="#">1 Review(s)</a></p>
                                        </div>
                                    </div>
                                    <div class="price">$ {{ $topProduct->product->singleVariation->price }}</div>
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
                <div class="image-item"> <a href="#" title="Image"> <img src="{{ asset('crocus_v2/images/rhs-banner.jpg')}}" class="img-responsive" alt="Image"></a> </div>
            </div>
        </div>
    </div>
</div>
<!-- end Slider -->

<div class="our-features-box" style="margin-bottom: 1rem;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-xs-12 col-sm-6 space">
                <div class="feature-box first"> <span class="fa fa-truck"></span>
                    <div class="content">
                        <h3>Worldwide Delivery</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12 col-sm-6 space">
                <div class="feature-box"> <span class="fa fa-headphones"></span>
                    <div class="content">
                        <h3>24/7 Help Center</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12 col-sm-6 space">
                <div class="feature-box"> <span class="fa fa-share"></span>
                    <div class="content">
                        <h3>FREE RETURNS</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12 col-sm-6 space">
                <div class="feature-box last"> <span class="fa fa-phone"></span>
                    <div class="content">
                        <h3>Helpline +0800 567 345</h3>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-page">
    <div class="container">
        <div class="row">

            <!-- featured category fashion -->
            <div class="col-md-9" >
                @if(!empty($sections))
                    @foreach($sections as $section)
                        @if($section->section_type == 1)
                            <div class="category-product">
                                <div class="navbar nav-menu">
                                    <div class="navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li>
                                                <div class="new_title">
                                                    <h2>{{ $section->section_title }}</h2>
                                                </div>
                                            </li>
                                            @if(!empty($section->sectionCategories))
                                                <?php $i=1; ?>
                                                @foreach($section->sectionCategories as $sectionCat)
                                                    @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                                        <li  class="{{ ($i== 1)? 'active' : '' }}">
                                                            <a data-toggle="tab" href="#tab-{{ $sectionCat->category_id }}">{{ $sectionCat->category->category_name }}</a>
                                                        </li>
                                                            <?php $i++; ?>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <div class="product-bestseller">
                                    <div class="product-bestseller-content">
                                        <div class="product-bestseller-list">
                                            @if(!empty($section->sectionCategories))
                                            <div class="tab-container">
                                                <?php $i=1; ?>
                                                @foreach($section->sectionCategories as $sectionCat)
                                                    @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                                        <div class="tab-panel {{ ($i== 1)? 'active' : '' }}" id="tab-{{ $sectionCat->category_id }}">
                                                            <div class="category-products">
                                                                <ul class="products-grid">
                                                                    @foreach($sectionCat->secCatProducts as $secCatProduct)
                                                                        <li class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                                                            <product-grid :product="{{ $secCatProduct->product }}"></product-grid>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php $i++; ?>
                                                    @endif
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($section->section_type == 2)
                            <div class="bestsell-pro">
                                <div class="slider-items-products">
                                    <div class="bestsell-block">
                                        <div class="block-title">
                                            <h2>{{ $section->section_title }}</h2>
                                        </div>
                                        <div id="bestsell-slider" class="product-flexslider hidden-buttons">
                                            <div class="slider-items slider-width-col4 products-grid block-content">
                                                @foreach($section->sectionCategories as $sectionCat)
                                                    @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                                        @foreach($sectionCat->secCatProducts as $secCatProduct)
                                                            <product-grid :product="{{ $secCatProduct->product }}"></product-grid>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="category-product">
                                <div class="navbar nav-menu">
                                    <div class="navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li>
                                                <div class="new_title">
                                                    <h2>{{ $section->section_title }}</h2>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="product-bestseller">
                                    <div class="product-bestseller-content">
                                        <div class="product-bestseller-list">
                                            @if(!empty($section->sectionCategories))
                                                @foreach($section->sectionCategories as $sectionCat)
                                                    @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                                        <div class="category-products">
                                                            <ul class="products-grid">
                                                                @foreach($sectionCat->secCatProducts as $secCatProduct)
                                                                    <li class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                                                        <product-grid :product="{{ $secCatProduct->product }}"></product-grid>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="col-md-3">
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
</script>
<!-- Hot Deals Timer 1-->
{{--<script type="text/javascript">
    var dthen1 = new Date("12/25/17 11:59:00 PM");
    start = "05/09/15 03:02:11 AM";
    start_date = Date.parse(start);
    var dnow1 = new Date(start_date);
    if (CountStepper > 0)
        ddiff = new Date((dnow1) - (dthen1));
    else
        ddiff = new Date((dthen1) - (dnow1));
    gsecs1 = Math.floor(ddiff.valueOf() / 1000);
    var iid1 = "countbox_1";
    CountBack_slider(gsecs1, "countbox_1", 1);
</script>--}}
@endsection
