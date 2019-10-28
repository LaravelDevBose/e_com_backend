@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','Home')

@section('PageCss')
    <style>
        .floor-products1 .block-content{
            padding-left: 0px;
        }
    </style>
@endsection

@section('Content')
    <main class="site-main">

        <div class="block-section-top block-section-top2">
            <div class="container">
                <div class="box-section-top">
                    @include('templates.kuteshop_v2.layouts.frontend.includes.navigation')

                    <!-- block slide top -->
                    @include('templates.kuteshop_v2.frontend.section.slider')
                    <!-- block slide top -->
                </div>
            </div>
        </div>

        <!-- Block deals of -->
        @include('templates.kuteshop_v2.frontend.section.latest_deal')

        <div class="clearfix" style="background-color: #eeeeee;margin-bottom: 30px; padding-top:30px;">
            <!-- block -floor -products / floor 1 :Fashion-->
            <div class="block-floor-products block-floor-products-opt2 floor-products1" id="floor0-1">
                <div class="container">
                    <div class="block-title ">
                        <span class="title">
                            <span class="icon"><img alt="img"  src="/kuteshop_v2/images/media/index2/floor1.png"></span>
                            <span class="text">Fashion</span>
                        </span>
                        <div class="links dropdown">
                            <button class="dropdown-toggle"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" >
                                <ul>
                                    <li role="presentation" class="active">
                                        <a href="#floor1-1"  role="tab" data-toggle="tab">Best Seller </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="#floor0-2" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="block-content">
                        <div class="col-banner">
                            <a href="" class="box-img">
                                <img src="/kuteshop_v2/images/media/index2/baner-floor1.jpg" alt="baner-floor">
                            </a>
                        </div>

                        <div class="col-products tab-content">

                            <!-- tab 1 -->
                            <div class="tab-pane active in  fade " id="floor1-1" role="tabpanel">
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
                                    <div class="item">
                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index2/floor1-1.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-price">30% <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index2/floor1-2.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index2/floor1-3.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index2/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index2/floor1-5.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index2/floor1-6.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index2/floor1-5.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index2/floor1-6.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 2-->
                            <div class="tab-pane  fade" id="floor1-2" role="tabpanel">
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
                                    <div class="item">
                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-1.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-price">30% <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-2.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-3.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 3 -->
                            <div class="tab-pane  fade" id="floor1-3" role="tabpanel">
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
                                    <div class="item">
                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-1.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-price">30% <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-2.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-3.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 4 -->
                            <div class="tab-pane  fade" id="floor1-4" role="tabpanel">
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
                                    <div class="item">
                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-1.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-price">30% <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-2.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-3.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 5 -->
                            <div class="tab-pane fade " id="floor1-5" role="tabpanel">
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
                                    <div class="item">
                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-1.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-price">30% <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-2.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-3.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 6 -->
                            <div class="tab-pane  fade" id="floor1-6" role="tabpanel">
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
                                    <div class="item">
                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-1.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-price">30% <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-2.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-3.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 7 -->
                            <div class="tab-pane  fade" id="floor1-7" role="tabpanel">
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
                                    <div class="item">
                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-1.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-price">30% <span>off</span></span>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-2.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-3.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="images/media/index1/floor1-4.jpg"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <!-- block -floor -products / floor :Fashion-->
            <!-- block -floor -products / floor 2 :Sports-->
            <div class="block-floor-products block-floor-products-opt2 floor-products2 show-deal" id="floor0-2">
                <div class="container">
                    <div class="block-title">

                            <span class="title">
                                <span class="icon"><img alt="img"  src="{{ asset('kuteshop_v2/images/media/index2/floor2.png')}}"></span>
                                <span class="text">Sports</span>
                            </span>
                        <div class="links dropdown">
                            <button class="dropdown-toggle"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" >
                                <ul>
                                    <li role="presentation" class="active"><a href="#floor2-1"  role="tab" data-toggle="tab">Best salers  </a></li>
                                    <li role="presentation"><a href="#floor2-2"  role="tab" data-toggle="tab">Specials </a></li>
                                    <li role="presentation"><a href="#floor2-3"  role="tab" data-toggle="tab">New Arrivals <span class="label-cat">12</span></a></li>
                                    <li role="presentation"><a href="#floor2-4"  role="tab" data-toggle="tab">Most Reviews  </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="#floor0-1" class="action action-up">
                                <i class="fa fa-angle-up" aria-hidden="true"></i>
                            </a>
                            <a href="#floor0-3" class="action action-down">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-categori">
                            <ul>
                                <li><a href="">Girf Sets</a></li>
                                <li><a href="">Shirt For Man</a></li>
                                <li><a href="">Maecenas</a></li>
                                <li><a href="">Accessories</a></li>
                                <li><a href="">Manicure & Pedicure</a></li>
                                <li><a href="">Bath & Spa</a></li>
                                <li><a href="">Hair Care</a></li>
                                <li class="cat-orther"><a href="">Girf Sets</a></li>
                                <li class="cat-orther"><a href="">ARM</a></li>
                                <li class="cat-orther"><a href="">Accessories</a></li>
                                <li class="cat-orther"><a href="">Hair Care</a></li>
                            </ul>
                            <a class="btn-show-cat btn-cat">All categories <i aria-hidden="true" class="fa fa-angle-double-right"></i></a>
                        </div>



                        <div class="col-banner">

                            <div class="col-deal">
                                <div class="box-title ">
                                    <span >Deals of The Day</span>
                                </div>
                                <div class="box-content">
                                    <div class="product-item">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/deals-of-day1.jpg')}}"></a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Top selling earphone </a></strong>

                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                    <span class="label-price">-15%</span>
                                                </div>
                                                <div class="deals-of-countdown">
                                                    <div class="count-down-time" data-countdown="2016/9/27"></div>
                                                </div>

                                                <div class="product-reviews-summary">
                                                    <img src="{{ asset('kuteshop_v2/images/icon/index2/star.png')}}" alt="reviews">
                                                </div>
                                                <div class="product-reviews-des">
                                                    Sound performance tuning includes the smallest details like...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <a href="" class="box-img"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor2.jpg')}}" alt="baner-floor"></a> -->
                            <div class="box-banner">
                                <div class="owl-carousel"
                                     data-nav="true"
                                     data-dots="false"
                                     data-autoplayTimeout="700"
                                     data-autoplay="true"
                                     data-loop="true"
                                     data-margin="0"
                                     data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":1},
                                            "600":{"items":1},
                                            "768":{"items":1},
                                            "992":{"items":1},
                                            "1200":{"items":1}
                                        }'>
                                    <div class="item">
                                        <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor2.jpg')}}" alt="baner-floor"></a>
                                    </div>
                                    <div class="item">
                                        <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor2.jpg')}}" alt="baner-floor"></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-products tab-content">

                            <!-- tab 1 -->
                            <div class="tab-pane active in  fade " id="floor2-1" role="tabpanel">
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
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index2/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 2-->
                            <div class="tab-pane fade " id="floor2-2" role="tabpanel">
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
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 3 -->
                            <div class="tab-pane fade " id="floor2-3" role="tabpanel">
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
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 4 -->
                            <div class="tab-pane fade " id="floor2-4" role="tabpanel">
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
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                            <span class="old-price">$52.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div><!-- block -floor -products / floor :Sports-->

            <!-- block -floor -products / floor 6 :jewelry-->
            <div class="block-floor-products block-floor-products-opt2 floor-products6 show-carousel-banner" id="floor0-6">
                <div class="container">
                    <div class="block-title ">

                            <span class="title">
                                <span class="icon"><img alt="img"  src="{{ asset('kuteshop_v2/images/media/index2/floor6.png')}}"></span>
                                <span class="text">jewelry</span>
                            </span>
                        <div class="links dropdown">
                            <button class="dropdown-toggle"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu" >
                                <ul  >
                                    <li role="presentation" class="active"><a href="#floor6-1"  role="tab" data-toggle="tab">Best Seller </a></li>
                                    <li role="presentation"><a href="#floor6-2"  role="tab" data-toggle="tab">Specials          </a></li>
                                    <li role="presentation"><a href="#floor6-3"  role="tab" data-toggle="tab">New Arrivals           <span class="label-cat">12</span></a></li>
                                    <li role="presentation"><a href="#floor6-4"  role="tab" data-toggle="tab">Most Reviews        </a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="#floor0-5" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                            <a href="" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        </div>
                    </div>


                    <div class="block-content">

                        <div class="col-categori">
                            <ul>
                                <li><a href="">Girf Sets</a></li>
                                <li><a href="">Shirt For Man</a></li>
                                <li><a href="">Maecenas</a></li>
                                <li><a href="">Accessories</a></li>
                                <li><a href="">Manicure & Pedicure</a></li>
                                <li><a href="">Bath & Spa</a></li>
                                <li><a href="">Hair Care</a></li>
                                <li class="cat-orther"><a href="">Girf Sets</a></li>
                                <li class="cat-orther"><a href="">ARM</a></li>
                                <li class="cat-orther"><a href="">Accessories</a></li>
                                <li class="cat-orther"><a href="">Hair Care</a></li>
                            </ul>
                            <a class="btn-show-cat btn-cat">All categories <i aria-hidden="true" class="fa fa-angle-double-right"></i></a>
                        </div>



                        <div class="col-products tab-content">

                            <!-- tab 1 -->
                            <div class="tab-pane active in  fade " id="floor6-1" role="tabpanel">
                                <div class="col-left">
                                    <div class="box-banner">
                                        <div class="owl-carousel"
                                             data-nav="true"
                                             data-dots="false"
                                             data-autoplayTimeout="700"
                                             data-autoplay="true"
                                             data-loop="true"
                                             data-margin="0"
                                             data-responsive='{
                                                    "0":{"items":1},
                                                    "420":{"items":1},
                                                    "600":{"items":1},
                                                    "768":{"items":1},
                                                    "992":{"items":1},
                                                    "1200":{"items":1}
                                                }'>
                                            <div class="item">
                                                <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor6.jpg')}}" alt="baner-floor"></a>
                                            </div>
                                            <div class="item">
                                                <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor6.jpg')}}" alt="baner-floor"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-product">

                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-right">
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
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-1.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-2.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-3.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-4.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-1.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-2.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- tab 2-->
                            <div class="tab-pane fade " id="floor6-2" role="tabpanel">
                                <div class="col-left">
                                    <div class="box-banner">
                                        <div class="owl-carousel"
                                             data-nav="true"
                                             data-dots="false"
                                             data-autoplayTimeout="700"
                                             data-autoplay="true"
                                             data-loop="true"
                                             data-margin="0"
                                             data-responsive='{
                                                    "0":{"items":1},
                                                    "420":{"items":1},
                                                    "600":{"items":1},
                                                    "768":{"items":1},
                                                    "992":{"items":1},
                                                    "1200":{"items":1}
                                                }'>
                                            <div class="item">
                                                <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor6.jpg')}}" alt="baner-floor"></a>
                                            </div>
                                            <div class="item">
                                                <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor6.jpg')}}" alt="baner-floor"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-product">

                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-right">
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
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-1.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-2.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-3.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-4.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-1.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-2.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- tab 3 -->
                            <div class="tab-pane fade " id="floor6-3" role="tabpanel">
                                <div class="col-left">
                                    <div class="box-banner">
                                        <div class="owl-carousel"
                                             data-nav="true"
                                             data-dots="false"
                                             data-autoplayTimeout="700"
                                             data-autoplay="true"
                                             data-loop="true"
                                             data-margin="0"
                                             data-responsive='{
                                                    "0":{"items":1},
                                                    "420":{"items":1},
                                                    "600":{"items":1},
                                                    "768":{"items":1},
                                                    "992":{"items":1},
                                                    "1200":{"items":1}
                                                }'>
                                            <div class="item">
                                                <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor6.jpg')}}" alt="baner-floor"></a>
                                            </div>
                                            <div class="item">
                                                <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor6.jpg')}}" alt="baner-floor"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-product">

                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-right">
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
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-1.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-2.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-3.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-4.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-1.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-2.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- tab 4-->
                            <div class="tab-pane fade " id="floor6-4" role="tabpanel">
                                <div class="col-left">
                                    <div class="box-banner">
                                        <div class="owl-carousel"
                                             data-nav="true"
                                             data-dots="false"
                                             data-autoplayTimeout="700"
                                             data-autoplay="true"
                                             data-loop="true"
                                             data-margin="0"
                                             data-responsive='{
                                                    "0":{"items":1},
                                                    "420":{"items":1},
                                                    "600":{"items":1},
                                                    "768":{"items":1},
                                                    "992":{"items":1},
                                                    "1200":{"items":1}
                                                }'>
                                            <div class="item">
                                                <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor6.jpg')}}" alt="baner-floor"></a>
                                            </div>
                                            <div class="item">
                                                <a href="" class="img-slide"><img src="{{ asset('kuteshop_v2/images/media/index2/baner-floor6.jpg')}}" alt="baner-floor"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-product">

                                        <div class=" product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-2">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">$45.00</span>
                                                        </div>
                                                        <div class="product-reviews-summary">
                                                            <div class="rating-summary">
                                                                <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-right">
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
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-1.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-2.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-3.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-4.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class=" product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-1.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                                <span class="old-price">$52.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/floor6-2.jpg')}}"></a>
                                                        <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                                            <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                        </div>
                                                        <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name"><a href="">Headphone & earphone</a></strong>
                                                        <div class="clearfix">
                                                            <div class="product-item-price">
                                                                <span class="price">$45.00</span>
                                                            </div>
                                                            <div class="product-reviews-summary">
                                                                <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                            <span style="width:80%">
                                                                                <span><span>80</span>% of <span>100</span></span>
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div><!-- block -floor -products / floor 5 :furniture-->

        </div>

        <!-- Banner -->
        <banner-ads-section></banner-ads-section>
        <!-- Banner -->

    </main>
@endsection

@section('PageJs')

@endsection
