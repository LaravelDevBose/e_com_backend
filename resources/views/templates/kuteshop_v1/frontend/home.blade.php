@extends('templates.kuteshop_v1.layouts.frontend.master')

@section('Title','Home')

@section('PageCss')
<style>
    .block-floor-products-opt2 .block-title {
        background-image: none;
    }
</style>
@endsection

@section('Content')
<!-- MAIN -->
<main class="site-main">
    <div class="block-section-top block-section-top12">
        <div class="container">
            <div class="box-section-top">
                @include('templates.kuteshop_v1.layouts.frontend.includes.navigation')

                <!-- block slide top -->
                @include('templates.kuteshop_v1.frontend.section.slider')
                <!-- block slide top -->
            </div>
        </div>
    </div>


    <!-- banner -->
    <div class="block-banner-main-opt12">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/banner1.jpg')}}" alt="img"></a>
                    <!-- <div class="item item1">
                                <img src="{{ asset('/kuteshop_v1/images/media/index12/banner1.jpg')}}" alt="img">
                                <div class="description">
                                    <span class="title">new look book </span>
                                    <span class="des">watches    </span>
                                    <a href="" class="btn btn-shop-now">SHOP NOW</a>
                                </div>
                            </div> -->
                </div>

                <div class="col-md-4">
                    <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/banner2.jpg')}}" alt="img"></a>
                    <!-- <div class="item item2">
                                <img src="{{ asset('/kuteshop_v1/images/media/index12/banner2.jpg')}}" alt="img">
                                <div class="description">
                                    <span class="title">get 50% off on sale </span>
                                    <span class="des">footwear    </span>
                                    <a href="" class="btn btn-shop-now">puchase</a>
                                </div>
                            </div> -->
                </div>

                <div class="col-md-4">
                    <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/banner3.jpg')}}" alt="img"></a>
                    <!-- <div class="item item3">
                                <img src="{{ asset('/kuteshop_v1/images/media/index12/banner3.jpg')}}" alt="img">
                                <div class="description">
                                    <span class="title">shop all week </span>
                                    <span class="des">clothes</span>
                                    <a href="" class="btn btn-shop-now">view more</a>
                                </div>
                            </div> -->
                </div>

            </div>
        </div>
    </div><!-- banner -->

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-lg-9">

                <!-- block -floor -products / floor 1 -->
                <div class="block-floor-products block-floor-products-opt12 floor-products1" id="floor0-1">

                    <div class="block-title ">
                        <div class="box-categori dropdown">
                            <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>categories</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat1.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat1-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Electronics
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat2.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat2-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Sports & Outdoors
                                    </a>

                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat3.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat3-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Smartphone & Tablets
                                    </a>

                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat4.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat4-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Health & Beauty
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat5.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat5-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Bags, Shoes & Accessories
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat6.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat6-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Toys & Hobbies
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat7.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat7-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Computers & Networking
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat8.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat8-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Laptops & Accessories
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat9.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat9-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Jewelry & Watches
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat10.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat10-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Flashlights & Lamps
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat11.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat11-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Cameras & Photo
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="title">
                            <span class="text">Fashion</span>
                        </span>
                        <div class="links dropdown">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu">
                                <ul>
                                    <li role="presentation" class="active"><a href="#floor1-1" role="tab" data-toggle="tab">Best Seller </a></li>
                                    <li role="presentation"><a href="#floor1-2" role="tab" data-toggle="tab">New Arrivals </a></li>
                                    <li role="presentation"><a href="#floor1-3" role="tab" data-toggle="tab">Most Reviews </a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-banner">
                            <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/baner-floor1.jpg')}}" alt="baner-floor"></a>
                            <div class="description">
                                <span class="subtitle ">end off the week </span>
                                <span class="title"> big sale</span>
                                <a href="" class="btn view-opt12">SHOP NOW </a>
                            </div>
                        </div>

                        <div class="col-products tab-content">

                            <!-- tab 1 -->
                            <div class="tab-pane active in  fade " id="floor1-1" role="tabpanel">
                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                    <span class="product-item-label label-new">new</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 2-->
                            <div class="tab-pane  fade" id="floor1-2" role="tabpanel">

                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                    <span class="product-item-label label-new">new</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 3 -->
                            <div class="tab-pane  fade" id="floor1-3" role="tabpanel">

                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                    <span class="product-item-label label-new">new</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor1-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div><!-- block -floor -products / floor1 :-->

                <!-- block -floor -products / floor 2 -->
                <div class="block-floor-products block-floor-products-opt12 floor-products2" id="floor0-2">

                    <div class="block-title ">
                        <div class="box-categori dropdown">
                            <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>categories</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat1.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat1-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Electronics
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat2.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat2-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Sports & Outdoors
                                    </a>

                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat3.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat3-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Smartphone & Tablets
                                    </a>

                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat4.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat4-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Health & Beauty
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat5.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat5-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Bags, Shoes & Accessories
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat6.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat6-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Toys & Hobbies
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat7.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat7-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Computers & Networking
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat8.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat8-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Laptops & Accessories
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat9.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat9-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Jewelry & Watches
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat10.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat10-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Flashlights & Lamps
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat11.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat11-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Cameras & Photo
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="title">
                            <span class="text">men’s Fashion</span>
                        </span>
                        <div class="links dropdown">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu">
                                <ul>
                                    <li role="presentation" class="active"><a href="#floor2-1" role="tab" data-toggle="tab">Best Seller </a></li>
                                    <li role="presentation"><a href="#floor2-2" role="tab" data-toggle="tab">New Arrivals </a></li>
                                    <li role="presentation"><a href="#floor2-3" role="tab" data-toggle="tab">Most Reviews </a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-banner">
                            <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/baner-floor2.jpg')}}" alt="baner-floor"></a>
                            <div class="description">
                                <span class="subtitle ">end off the week </span>
                                <span class="title"> big sale</span>
                                <a href="" class="btn view-opt12">SHOP NOW </a>
                            </div>
                        </div>

                        <div class="col-products tab-content">

                            <!-- tab 1 -->
                            <div class="tab-pane active in  fade " id="floor2-1" role="tabpanel">
                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 2-->
                            <div class="tab-pane  fade" id="floor2-2" role="tabpanel">
                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 3 -->
                            <div class="tab-pane  fade" id="floor2-3" role="tabpanel">
                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor2-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div><!-- block -floor -products / floor2 :-->

                <!-- block -floor -products / floor 3 -->
                <div class="block-floor-products block-floor-products-opt12 floor-products3" id="floor0-3">

                    <div class="block-title ">
                        <div class="box-categori dropdown">
                            <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>categories</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat1.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat1-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Electronics
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat2.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat2-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Sports & Outdoors
                                    </a>

                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat3.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat3-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Smartphone & Tablets
                                    </a>

                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat4.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat4-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Health & Beauty
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat5.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat5-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Bags, Shoes & Accessories
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat6.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat6-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Toys & Hobbies
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat7.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat7-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Computers & Networking
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat8.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat8-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Laptops & Accessories
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat9.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat9-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Jewelry & Watches
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat10.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat10-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Flashlights & Lamps
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <span class="icon">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat11.png')}}" alt="nav-cat" class="img-show">
                                            <img src="{{ asset('/kuteshop_v1/images/icon/index12/nav-cat11-hover.png')}}" alt="nav-cat" class="img-hover">
                                        </span>
                                        Cameras & Photo
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <span class="title">
                            <span class="text">accessories</span>
                        </span>
                        <div class="links dropdown">
                            <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu">
                                <ul>
                                    <li role="presentation" class="active"><a href="#floor3-1" role="tab" data-toggle="tab">Best Seller </a></li>
                                    <li role="presentation"><a href="#floor3-2" role="tab" data-toggle="tab">New Arrivals </a></li>
                                    <li role="presentation"><a href="#floor3-3" role="tab" data-toggle="tab">Most Reviews </a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="block-content">

                        <div class="col-banner">
                            <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/baner-floor3.jpg')}}" alt="baner-floor"></a>
                            <div class="description">
                                <span class="subtitle ">new collection </span>
                                <span class="title">my color</span>
                                <a href="" class="btn view-opt12">SHOP NOW </a>
                            </div>
                        </div>

                        <div class="col-products tab-content">

                            <!-- tab 1 -->
                            <div class="tab-pane active in  fade " id="floor3-1" role="tabpanel">
                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 2-->
                            <div class="tab-pane  fade" id="floor3-2" role="tabpanel">
                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- tab 3 -->
                            <div class="tab-pane  fade" id="floor3-3" role="tabpanel">
                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":3},
                                            "1200":{"items":3}
                                        }'>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                        <span class="old-price">$140.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-1.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-2.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-3.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-4.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                    <span class="product-item-label label-sale">sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-5.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" product-item product-item-opt-12">
                                            <div class="product-item-info">
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Sexy Red Dress </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$138,95</span>
                                                    </div>
                                                </div>
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/floor3-6.jpg')}}"></a>
                                                    <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                                        <a class="btn btn-compare" href=""><span>compare</span></a>
                                                        <a class="btn btn-quickview" href=""><span>quickview</span></a>
                                                    </div>
                                                    <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div><!-- block -floor -products / floor3 :-->

            </div>

            <div class="col-md-4 col-lg-3">

                <div class="block-deal-opt12">

                    <div class="block-title">
                        <span class="title">hot deal of this week</span>
                    </div>

                    <div class="block-content">
                        <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="30" data-responsive='{
                                    "0":{"items":1},
                                    "480":{"items":1},
                                    "640":{"items":2},
                                    "992":{"items":1},
                                    "1200":{"items":1}
                                    }'>

                            <div class=" product-item product-item-deal-opt12">
                                <div class="product-item-info">
                                    <div class="deals-of-countdown">
                                        <div class="count-down-time" data-countdown="2017/10/25"></div>
                                    </div>
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/deal1.jpg')}}"></a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$1.200 </span>
                                            <span class="old-price">$1.230</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" product-item product-item-deal-opt12">
                                <div class="product-item-info">
                                    <div class="deals-of-countdown">
                                        <div class="count-down-time" data-countdown="2017/10/25"></div>
                                    </div>
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/deal1.jpg')}}"></a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                        <div class="product-item-price">
                                            <span class="price">$1.200 </span>
                                            <span class="old-price">$1.230</span>
                                        </div>
                                        <div class="product-item-actions">
                                            <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                                            <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                                            <a class="btn btn-compare" href=""><span>compare</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Block Testimonials -->
                <div class="block-testimonials-opt12">


                    <div class="block-content">

                        <div class="owl-carousel testimonials-thumb" data-loop="true" data-center="true" data-nav="false" data-dots="false" data-margin="3" data-autoplayTimeout="600" data-autoplay="true" data-responsive='{
                                    "0":{"items":1},
                                    "360":{"items":3},
                                    "480":{"items":3},
                                    "768":{"items":3},
                                    "992":{"items":3},
                                    "1200":{"items":3}
                                    }'>

                            <div class="item ">
                                <div class="photo">
                                    <span class="img"><img src="{{ asset('/kuteshop_v1/images/media/index12/Testimonials1.jpg')}}" alt="img"></span>
                                </div>
                            </div>
                            <div class="item ">
                                <div class="photo">
                                    <span class="img"><img src="{{ asset('/kuteshop_v1/images/media/index12/Testimonials2.jpg')}}" alt="img"></span>
                                </div>
                            </div>
                            <div class="item ">
                                <div class="photo">
                                    <span class="img"><img src="{{ asset('/kuteshop_v1/images/media/index12/Testimonials3.jpg')}}" alt="img"></span>
                                </div>
                            </div>

                        </div>

                        <div class="owl-carousel testimonials-des" data-loop="true" data-nav="false" data-dots="true" data-margin="0" data-responsive='{
                                    "0":{"items":1},
                                    "360":{"items":1},
                                    "480":{"items":1},
                                    "768":{"items":1},
                                    "992":{"items":1},
                                    "1200":{"items":1}
                                    }'>
                            <div class="item">

                                <div class="info">
                                    <p> <img src="{{ asset('/kuteshop_v1/images/media/index12/img-des.png')}}" alt="img" class="icon"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <p class="testimonial-nane">- Sheena Elber -</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <p> <img src="{{ asset('/kuteshop_v1/images/media/index12/img-des.png')}}" alt="img" class="icon"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <p class="testimonial-nane">- Sheena Elber -</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <p><img src="{{ asset('/kuteshop_v1/images/media/index12/img-des.png')}}" alt="img" class="icon"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <p class="testimonial-nane">- Sheena Elber -</p>
                                </div>
                            </div>

                        </div>

                    </div>


                </div><!-- Block Testimonials -->

                <!-- block  -new-product-->
                <div class="block-new-product-opt12">

                    <div class="block-title">
                        <span class="title">new products</span>
                    </div>

                    <div class="block-content">
                        <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="30" data-responsive='{
                                    "0":{"items":1},
                                    "480":{"items":1},
                                    "640":{"items":2},
                                    "768":{"items":2},
                                    "992":{"items":1},
                                    "1200":{"items":1}
                                    }'>

                            <div class="item">

                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new1.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Men’s Fashion Shoes </a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                                <span class="old-price">$1.230</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new2.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Pastel Bodycon Bags </a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new3.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Drape Back Playsuit </a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new4.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Pretty Gloves </a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new5.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Pastel Bodycon Clothes </a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new6.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                                <span class="old-price">$1.230</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="item">

                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new1.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                                <span class="old-price">$1.230</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new2.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new3.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new4.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new5.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new6.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                                <span class="old-price">$1.230</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="item">

                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new1.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                                <span class="old-price">$1.230</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new2.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new3.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new4.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new5.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" product-item product-item-opt-12">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a class="product-item-img" href=""><img alt="product name" src="{{ asset('/kuteshop_v1/images/media/index12/new6.jpg')}}"></a>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">IWC Synchros Watches</a></strong>
                                            <div class="product-item-price">
                                                <span class="price">$1.200 </span>
                                                <span class="old-price">$1.230</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div><!-- block  -new-product-->

                <div class="block-banner-sidebar block-banner-sidebar-opt12 effect-banner3">
                    <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/banner-sidebar.jpg')}}" alt="img"></a>
                </div>

            </div>

        </div>
    </div>

    <!-- banner -->
    <div class="block-banner-bottom-opt12">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/banner4.jpg')}}" alt="img"></a>
                    <!-- <div class="item item3">
                                <img src="{{ asset('/kuteshop_v1/images/media/index12/banner4.jpg')}}" alt="img">
                                <div class="description">
                                    <span class="title">new leather watch</span>
                                    <span class="des">business man    </span>
                                </div>
                            </div> -->
                </div>

                <div class="col-md-6">
                    <a href="" class="box-img"><img src="{{ asset('/kuteshop_v1/images/media/index12/banner5.jpg')}}" alt="img"></a>
                    <!-- <div class="item item2">
                                <img src="{{ asset('/kuteshop_v1/images/media/index12/banner5.jpg')}}" alt="img">
                                <div class="description">
                                    <span class="title">Accessories </span>
                                    <span class="des">glamour    </span>
                                </div>
                            </div> -->
                </div>

            </div>
        </div>
    </div><!-- banner -->

    <div class="block-categori-opt12">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="item item1" style="background-image: url(images/media/index12/bg-categories1.png);">
                        <div class="title">
                            <span>categories </span>
                            <strong class="sub-title"> women</strong>
                        </div>
                        <ul class="list-cat">
                            <li><a href="">Dresses</a></li>
                            <li><a href="">Blouses & Shirts</a></li>
                            <li><a href="">Swimwear</a></li>
                            <li><a href="">Nail Art & Salon</a></li>
                            <li><a href="">Skin Care</a></li>
                            <li><a href="">Beauty Equipment</a></li>
                            <li><a href="">Tattoo & Body Art</a></li>
                        </ul>
                        <div class="actions">
                            <a href="" class="btn-view">View all</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item item2" style="background-image: url(images/media/index12/bg-categories2.png);">
                        <div class="title">
                            <span>categories </span>
                            <strong class="sub-title"> men</strong>
                        </div>
                        <ul class="list-cat">
                            <li><a href="">Dresses</a></li>
                            <li><a href="">Blouses & Shirts</a></li>
                            <li><a href="">Swimwear</a></li>
                            <li><a href="">Nail Art & Salon</a></li>
                            <li><a href="">Skin Care</a></li>
                            <li><a href="">Beauty Equipment</a></li>
                            <li><a href="">Tattoo & Body Art</a></li>
                        </ul>
                        <div class="actions">
                            <a href="" class="btn-view">View all</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item item3" style="background-image: url(images/media/index12/bg-categories3.png);">
                        <div class="title">
                            <span>categories </span>
                            <strong class="sub-title"> Accessory</strong>
                        </div>
                        <ul class="list-cat">
                            <li><a href="">Dresses</a></li>
                            <li><a href="">Blouses & Shirts</a></li>
                            <li><a href="">Swimwear</a></li>
                            <li><a href="">Nail Art & Salon</a></li>
                            <li><a href="">Skin Care</a></li>
                            <li><a href="">Beauty Equipment</a></li>
                            <li><a href="">Tattoo & Body Art</a></li>
                        </ul>
                        <div class="actions">
                            <a href="" class="btn-view">View all</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Block recent Blog -->
    <div class="block-recent-blog-opt12">
        <div class="container">
            <div class="block-title">
                <span class="title">Recent blog posts</span>
                <p>The lastest news from your blog</p>
            </div>
            <div class="block-content">
                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="30" data-responsive='{
                            "0":{"items":1},
                            "480":{"items":1},
                            "768":{"items":1},
                            "992":{"items":2},
                            "1200":{"items":2}
                        }'>
                    <div class="blog-item">
                        <div class="blog-photo">
                            <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/blog1.jpg')}}" alt="blog"></a>

                        </div>
                        <div class="blog-detail">

                            <div class="blog-info">
                                <div class="blog-date"><span>21 October</span></div>
                            </div>
                            <strong class="blog-name"><a href="">Maecenas consequat mauris </a></strong>

                            <div class="blog-actions">
                                <a href="">Read more</a>

                            </div>
                        </div>
                    </div>

                    <div class="blog-item">
                        <div class="blog-photo">
                            <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/blog2.jpg')}}" alt="blog"></a>

                        </div>
                        <div class="blog-detail">

                            <div class="blog-info">
                                <div class="blog-date"><span>21 October</span></div>
                            </div>
                            <strong class="blog-name"><a href="">nec semper tristique todsife </a></strong>

                            <div class="blog-actions">
                                <a href="">Read more</a>

                            </div>
                        </div>
                    </div>

                    <div class="blog-item">
                        <div class="blog-photo">
                            <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/blog1.jpg')}}" alt="blog"></a>

                        </div>
                        <div class="blog-detail">

                            <div class="blog-info">
                                <div class="blog-date"><span>25 September</span></div>
                            </div>
                            <strong class="blog-name"><a href="">Maecenas consequat mauris </a></strong>

                            <div class="blog-actions">
                                <a href="">Read more</a>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div><!-- Block recent Blog -->


    <!-- block-brand -->
    <div class="block-brand-op12">
        <div class="container">
            <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="30" data-loop="true" data-responsive='{
                            "0":{"items":3},
                            "480":{"items":4},
                            "600":{"items":5},
                            "992":{"items":6},
                            "1200":{"items":7}
                        }'>
                <div class="item">
                    <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/brand1.jpg')}}" alt="brand"></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/brand2.jpg')}}" alt="brand"></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/brand3.jpg')}}" alt="brand"></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/brand4.jpg')}}" alt="brand"></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/brand5.jpg')}}" alt="brand"></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/brand6.jpg')}}" alt="brand"></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/brand7.jpg')}}" alt="brand"></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index12/brand6.jpg')}}" alt="brand"></a>
                </div>

            </div>
        </div>
    </div><!-- block-brand -->
</main>
@endsection

@section('PageJs')

@endsection
