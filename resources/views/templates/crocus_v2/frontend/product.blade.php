@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Product')

@section('PageCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('crocus_v2/css/flexslider.css') }}">
    <style>
        .shop-info .sold-by{
            font-size: 12px;
            color: #6d6d6d;
        }
        .shop-info .shop-name{
            font-size: 15px;
            font-weight: 800;
            margin: 0;
            padding-bottom: 5px;
            color: #333;
        }
        .shop-info .shop-address{
            font-size: 13px;
            margin: 0;
            color: #6d6d6d;

        }
        .shop-info .go-to-store{
            padding: 7px;
            border-top: 1px solid #eee;
            text-align: center;
            text-transform: uppercase;
        }
        .go-to-store a{

            font-weight: bold;
            font-size: 13px;
            color: #0db1b9;
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
                                        <div class="rating-box">
                                            <div style="width:60%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a></p>
                                    </div>
                                    <single-product-options :product="{{ $product }}"></single-product-options>
                                </div>

                                <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner">
                                    <div class="text-widget widget widget__sidebar shop-info">
                                        <div class="widget-content">
                                            <span class="sold-by">Sold By</span>
                                            <h3 class="shop-name">
                                                <span>{{ $product->seller->shop->shop_name }}</span>
                                            </h3>
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
                                        </div>
                                        <div class="go-to-store">
                                            <a href="{{ route('front.shop.profile', $product->seller->shop->shop_slug) }}"> Go To Store</a>
                                        </div>
                                    </div>
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
                                    {{--<div class="download-app">
                                        <h2>DOWNLOAD THE APP</h2>
                                        <img alt="banner" src="{{ asset('crocus_v2/images/google-play-btn.jpg') }}" class="app-btn">
                                        <img alt="banner" src="{{ asset('crocus_v2/images/apple-btn.jpg') }}" class="app-btn">
                                    </div>--}}
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
                                    <div class="box-reviews1">
                                        <div class="form-add">
                                            <form id="review-form" method="post" action="http://www.themesmart.net/review/product/post/id/176/">
                                                <h3>Write Your Own Review</h3>
                                                <fieldset>
                                                    <h4>How do you rate this product? <em class="required">*</em></h4>
                                                    <span id="input-message-box"></span>
                                                    <table id="product-review-table" class="data-table">
                                                        <colgroup>
                                                            <col>
                                                            <col width="1">
                                                            <col width="1">
                                                            <col width="1">
                                                            <col width="1">
                                                            <col width="1">
                                                        </colgroup>
                                                        <thead>
                                                        <tr class="first last">
                                                            <th>&nbsp;</th>
                                                            <th><span class="nobr">1 *</span></th>
                                                            <th><span class="nobr">2 *</span></th>
                                                            <th><span class="nobr">3 *</span></th>
                                                            <th><span class="nobr">4 *</span></th>
                                                            <th><span class="nobr">5 *</span></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr class="first odd">
                                                            <th>Price</th>
                                                            <td class="value"><input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]"></td>
                                                            <td class="value last"><input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]"></td>
                                                        </tr>
                                                        <tr class="even">
                                                            <th>Value</th>
                                                            <td class="value"><input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]"></td>
                                                            <td class="value last"><input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]"></td>
                                                        </tr>
                                                        <tr class="last odd">
                                                            <th>Quality</th>
                                                            <td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]"></td>
                                                            <td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]"></td>
                                                            <td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <input type="hidden" value="" class="validate-rating" name="validate_rating">
                                                    <div class="review1">
                                                        <ul class="form-list">
                                                            <li>
                                                                <label class="required" for="nickname_field">Nickname<em>*</em></label>
                                                                <div class="input-box">
                                                                    <input type="text" class="input-text" id="nickname_field" name="nickname">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <label class="required" for="summary_field">Summary<em>*</em></label>
                                                                <div class="input-box">
                                                                    <input type="text" class="input-text" id="summary_field" name="title">
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="review2">
                                                        <ul>
                                                            <li>
                                                                <label class="required " for="review_field">Review<em>*</em></label>
                                                                <div class="input-box">
                                                                    <textarea rows="3" cols="5" id="review_field" name="detail"></textarea>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="buttons-set">
                                                            <button class="button submit" title="Submit Review" type="submit"><span>Submit Review</span></button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="box-reviews2">
                                        <h3>Customer Reviews</h3>
                                        <div class="box visible">
                                            <ul>
                                                <li>

                                                    <div class="review">
                                                        <h6><a href="#">Good Product</a></h6>
                                                        <small>Review by <span>John Doe </span>on 25/8/2016 </small>
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:100%;"></div>
                                                        </div>
                                                        <div class="review-txt"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</div>
                                                    </div>
                                                </li>
                                                <li class="even">

                                                    <div class="review">
                                                        <h6><a href="#/catalog/product/view/id/60/">Superb!</a></h6>
                                                        <small>Review by <span>John Doe</span>on 12/3/2015 </small>
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:100%;"></div>
                                                        </div>
                                                        <div class="review-txt"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book </div>
                                                    </div>
                                                </li>
                                                <li>

                                                    <div class="review">
                                                        <h6><a href="#/catalog/product/view/id/59/">Awesome Product</a></h6>
                                                        <small>Review by <span>John Doe</span>on 28/2/2015 </small>
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:100%;"></div>
                                                        </div>
                                                        <div class="review-txt last"> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book </div>
                                                    </div>
                                                </li>
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
    <script type="text/javascript" src="{{ asset('crocus_v2/js/owl.carousel.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('crocus_v2/js/cloud-zoom.js') }}" ></script>

@endsection
