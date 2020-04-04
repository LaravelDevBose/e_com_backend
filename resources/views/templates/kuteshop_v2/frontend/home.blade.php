@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Home')

@section('PageCss')
    <style>
        .block-floor-products-opt2 .block-title{
            background-image:none;
        }
    </style>
@endsection

@section('Content')
    <main class="site-main">
        <div class="block-section-top block-section-top2">
            <div class="container">
                <div class="box-section-top" style=" min-height: 40rem;">
                @include('templates.kuteshop_v2.layouts.frontend.includes.navigation')

                <!-- block slide top -->
                @include('templates.kuteshop_v2.frontend.section.slider')
                <!-- block slide top -->
                </div>
            </div>
        </div>

        <div class="container">
            @if(!empty($latestDeals) && !empty($latestDeals->deal_products) && count($latestDeals->deal_products) > 0)
                <div class="block-deals-of-opt2">
                    <div class="block-title ">
                        <span class="title">{{ __('frontend.latest deal') }}</span>
                        <div class="deals-of-countdown">
                            <span class="title">{{ __('frontend.End In') }}</span>
                            <div class="count-down-time" data-countdown="{{ $latestDeals->end_time }}"></div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="owl-carousel"
                             data-nav="true"
                             data-dots="false"
                             data-margin="8"
                             data-responsive='{
                            "0":{"items":1},
                            "480":{"items":2},
                            "640":{"items":3},
                            "992":{"items":4},
                            "1200":{"items":5}
                            }'>
                            @foreach($latestDeals->deal_products as $dealProduct)
                                @if(!empty($dealProduct->product))
                                <section-product-grid :product="{{ $dealProduct->product }}" :mallname="{{ json_encode($mallTitle) }}"></section-product-grid>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            @endif

            @if(!empty($adminLatestProducts))
                <div class="block-deals-of-opt2">
                    <div class="block-title ">
                        <span class="title">{{ __('frontend.Saliim Mall Products') }}</span>
                    </div>
                    <div class="block-content">
                        <div class="owl-carousel"
                             data-nav="true"
                             data-dots="false"
                             data-margin="8"
                             data-responsive='{
                                "0":{"items":1},
                                "480":{"items":2},
                                "640":{"items":3},
                                "992":{"items":4},
                                "1200":{"items":5}
                                }'>
                            @foreach($adminLatestProducts as $product)
                                @if(!empty($product))
                                <mall-product-grid :product="{{ $product }}" :mallname="{{ json_encode($mallTitle) }}"></mall-product-grid>
                                @endif
                            @endforeach
                        </div>
                        <a href="{{ route('front.mall') }}" style="float: right; color: #f78031;">{{ __('frontend.see all') }}</a>
                    </div>
                </div>
            @endif
        </div>

        @if(!empty($categorySection))
            <div class="clearfix" style="background-color: #eeeeee;margin-bottom: 30px; padding-top:30px;">
                @foreach($categorySection as $key=> $section)

                <div class="block-floor-products block-floor-products-opt2 floor-products1" id="floor0-{{$key}}">
                    <div class="container">
                        <div class="block-title ">
                            <span class="title">
                                <span class="icon"><img alt="img"  src="kuteshop_v2/images/icon/floor1.png"></span>
                                <span class="text">{{ $section['category']->category_name }}</span>
                            </span>
                            <div class="links dropdown">
                                <button class="dropdown-toggle"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                @if(!empty($section['productList']))
                                <div class="dropdown-menu" >
                                    <ul>
                                        <?php $activeCheckH = 1; ?>
                                        @foreach($section['productList'] as $indexName=> $productType)

{{--                                            @if(!empty($productType) && count($productType) > 0)--}}
                                            @if(!empty($productType))
                                                <li role="presentation" class="{{ ($activeCheckH== 1)?'active':'' }}">
                                                    <a href="#floor-{{$key.'-'.$activeCheckH }}"  role="tab" data-toggle="tab">
                                                        @if($indexName == 'bestSeller')
                                                            <span>{{ __('frontend.Best Seller Products') }}</span>
                                                        @elseif($indexName == 'mostReviews')
                                                            <span>{{ __('frontend.Most Reviews Products') }}</span>
                                                        @elseif($indexName == 'newArrivals')
                                                            <span>{{ __('frontend.New Arrivals Products') }} <span class="label-cat">{{ count($productType) }}</span></span>
                                                        @else
                                                            <span>{{ __('frontend.Other Products') }}</span>
                                                        @endif
                                                    </a>
                                                </li>
                                            <?php $activeCheckH++; ?>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <div class="actions">

                                @if($key == 0)
                                    <a href="" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                @else
                                    <a href="#floor0-{{ $key-1 }}" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                @endif

                                @if((count($categorySection)-1) == $key)
                                    <a href="" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                @else
                                    <a href="#floor0-{{$key+1}}" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                @endif
                            </div>
                        </div>

                        <div class="block-content">
                            @if(!empty($section['category']->children))
                            <div class="col-categori">
                                <ul>
                                    @foreach($section['category']->children as $secCategory)
                                    <li><a href="{{ route('front.category.product', $secCategory->category_slug) }}">{{ $secCategory->category_name }}</a></li>
                                    @endforeach
                                </ul>
                                <a class="btn-show-cat btn-cat">{{ __('frontend.All categories') }} <i aria-hidden="true" class="fa fa-angle-double-right"></i></a>
                            </div>
                            @endif
                            <div class="col-banner">
                                <a href="" class="box-img">
                                    @if(!empty($section['category']->sectionBanner))
                                        <img src="{{ $section['category']->sectionBanner->image_path }}" alt="baner-floor">
                                    @endif
                                </a>
                            </div>
                            <?php $activeCheck = 1; ?>
                            @if(!empty($section['productList']))
                                <div class="col-products tab-content">
                                    @foreach($section['productList'] as $productType)
                                        @if(!empty($productType))
                                            <div class="tab-pane {{ ($activeCheck== 1)?'active in  fade ':'' }} " id="floor-{{$key.'-'.$activeCheck }}" role="tabpanel">
                                                <div class="owl-carousel"
                                                     data-nav="true"
                                                     data-dots="false"
                                                     data-margin="0"
                                                     data-responsive='{
                                                    "0":{"items":1},
                                                    "420":{"items":2},
                                                    "600":{"items":3},
                                                    "768":{"items":3},
                                                    "992":{"items":3},
                                                    "1200":{"items":3}
                                                }'>
                                                    <?php $i=0; $total = count($productType); ?>
                                                    @foreach($productType as $product)
                                                        @if(!empty($product))
                                                            @if($i %2 == 0)
                                                            <div class="item">
                                                            @endif
                                                                <section-product-grid :product="{{ $product }}" :mallname="{{ json_encode($mallTitle) }}"></section-product-grid>
                                                            <?php $i++; ?>
                                                            @if($i % 2 == 0 || $i == $total)
                                                            </div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <?php $activeCheck++; ?>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <p class="text-right" style="margin-top: .7rem; margin-bottom: 0;">
                            <a href="{{ route('front.category.product', $section['category']->category_slug) }}" >{{ __('frontend.see all') }}</a>
                        </p>

                    </div>
                </div><!-- block -floor -products / floor :Fashion-->
                @endforeach
            </div>
        @endif
    </main>
    <!--  block-service-->
    <div class="block-service-opt2">
        <div class="container">
            <div class="items">
                <div class="item">
                    <div class="icon">
                        <img src="{{ asset('kuteshop_v2/images/service/service1.png') }}" alt="service">
                        <span class="title">Great Value</span>
                    </div>
                    <div class="des">
                        We offer competitive prices on our 100 million plus product range.
                    </div>
                </div>
                {{--<div class="item">
                    <div class="icon">
                        <img src="{{ asset('kuteshop_v2/images/service/service2.png') }}" alt="service">
                        <span class="title">Worldwide Delivery</span>
                    </div>
                    <div class="des">
                        With sites in 5 languages, we ship to over 200 countries & regions.
                    </div>
                </div>--}}
                <div class="item">
                    <div class="icon">
                        <img src="{{ asset('kuteshop_v2/images/service/service3.png') }}" alt="service">
                        <span class="title">Safe Payment</span>
                    </div>
                    <div class="des">
                        Pay with the region's most popular and secure payment methods.
                    </div>
                </div>

                <div class="item">
                    <div class="icon">
                        <img src="{{ asset('kuteshop_v2/images/service/service4.png') }}" alt="service">
                        <span class="title">Shop with Confidence</span>
                    </div>
                    <div class="des">
                        Our Buyer Protection covers your purchase from click to delivery.
                    </div>
                </div>
                {{--<div class="item">
                    <div class="icon">
                        <img src="{{ asset('kuteshop_v2/images/service/service5.png') }}" alt="service">
                        <span class="title">24/7 Help Center</span>
                    </div>
                    <div class="des">
                        Round-the-clock assistance for a smooth shopping experience.
                    </div>
                </div>--}}
                <div class="item">
                    <div class="icon">
                        <img src="{{ asset('kuteshop_v2/images/service/service6.png') }}" alt="service">
                        <span class="title">Shop On-The-Go</span>
                    </div>
                    <div class="des">
                        Download the app and get the world of <strong><b>Saliim</b></strong> at your fingertips.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  block-service-->
@endsection

@section('PageJs')

@endsection
