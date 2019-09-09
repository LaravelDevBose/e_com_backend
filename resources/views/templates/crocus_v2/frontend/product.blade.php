@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Product')

@section('PageCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('crocus_v2/css/flexslider.css') }}">
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
                                    <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                                    <div class="product-name">
                                        <h1>{{ $product->product_name}}</h1>
                                    </div>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:60%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                                    </div>

                                    @if(!empty($product->singleVariation))
                                        <div class="price-block">
                                            @if(!is_null($product->singleVariation->special_price))
                                                <div class="price-box">
                                                    <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">$ {{ number_format($product->singleVariation->price,2) }} </span> </p>
                                                    <p class="special-price"><span class="price-label">Special Price</span> <span class="price">$ {{ number_format($product->singleVariation->special_price ,2) }} </span> </p>
                                                </div>
                                            @else
                                                <div class="price-box">
                                                    <p class="special-price"><span class="price-label">Price</span> <span class="price">$ {{ number_format($product->singleVariation->price,2) }}</span> </p>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="short-description">
                                        <h2>Quick Overview</h2>
                                        {!! $product->highlight !!}
                                    </div>
                                    <div class="add-to-box">
                                        <div class="add-to-cart">
                                            <div class="pull-left">
                                                <div class="custom pull-left">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                                    <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                                </div>
                                            </div>
                                            <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button">Add to Cart</button>
                                        </div>
                                        <div class="email-addto-box">
                                            <ul class="add-to-links">
                                                <li> <a class="link-wishlist" href="{{ route('login') }}"><span>Add to Wishlist</span></a></li>
                                                <li><span class="separator">|</span> <a class="link-compare" href="compare.html"><span>Add to Compare</span></a></li>
                                            </ul>
                                            <p class="email-friend"><a href="#" class=""><span>Email to a Friend</span></a></p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner">
                                    <img alt="banner" src="{{ asset('crocus_v2/images/home-banner.png') }}">
                                    <div class="download-app">
                                        <h2>DOWNLOAD THE APP</h2>
                                        <img alt="banner" src="{{ asset('crocus_v2/images/google-play-btn.jpg') }}" class="app-btn">
                                        <img alt="banner" src="{{ asset('crocus_v2/images/apple-btn.jpg') }}" class="app-btn"></div>
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
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="ThinkPad X1 Ultrabook" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="new-label new-top-right">new</div>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="ThinkPad X1 Ultrabook" href="product_detail.html"> ThinkPad X1 Ultrabook </a> </div>
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div style="width:80%" class="rating"></div>
                                                </div>
                                                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="Samsung GALAXY Note" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Retis lapen casen" href="product_detail.html"> Samsung GALAXY Note </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$235.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Epson L360 Printer" href="product_detail.html"> <img alt="Epson L360 Printer" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Retis lapen casen" href="product_detail.html"> Epson L360 Printer </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$325.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="QX30 Lens Camera" href="product_detail.html"> <img alt="QX30 Lens Camera" src="{{ asset('crocus_v2') }}"> </a>
                                        <div class="new-label new-top-left">new</div>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="QX30 Lens Camera" href="product_detail.html"> QX30 Lens Camera </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$425.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Smart Watch A9" href="product_detail.html"> <img alt="Smart Watch A9" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Smart Watch A9" href="product_detail.html"> Smart Watch A9 </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$525.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="Touch Notebook 500GB HD" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Touch Notebook 500GB HD" href="product_detail.html"> Touch Notebook 500GB HD </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$225.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Canon Zoom Camera" href="product_detail.html"> <img alt="Canon Zoom Camera" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Canon Zoom Camera" href="product_detail.html"> Canon Zoom Camera </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$185.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End related products Slider -->




</div>
<!-- Related Products Slider End -->

<!-- Upsell Product Slider -->

<div class="container">
    <!-- upsell Slider -->
    <div class="upsell-pro">
        <div class="slider-items-products">
            <div class="upsell-block">
                <div id="upsell-products-slider" class="product-flexslider hidden-buttons">
                    <div class="home-block-inner">
                        <div class="block-title">
                            <h2>Upsell Product</h2>
                        </div>
                        <img alt="banner" src="{{ asset('crocus_v2/images/banner-img1.png') }}">
                    </div>
                    <div class="slider-items slider-width-col4 products-grid block-content">
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="iPhone 6 Plus" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="new-label new-top-right">new</div>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="iPhone 6 Plus" href="product_detail.html"> iPhone 6 Plus </a> </div>
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div style="width:80%" class="rating"></div>
                                                </div>
                                                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$245.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Noise Smart Watch" href="product_detail.html"> <img alt="Noise Smart Watch" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Noise Smart Watch" href="product_detail.html"> Noise Smart Watch </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$155.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Morphy Optimo Kettle" href="product_detail.html"> <img alt="Morphy Optimo Kettle" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Morphy Optimo Kettle" href="product_detail.html"> Morphy Optimo Kettle </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$185.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Omega J8004 Juicer" href="product_detail.html"> <img alt="Omega J8004 Juicer" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="new-label new-top-left">new</div>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Omega J8004 Juicer" href="product_detail.html"> Omega J8004 Juicer </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$235.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item -->

                        <!-- End Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Food Processor" href="product_detail.html"> <img alt="Food Processor" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Food Processor" href="product_detail.html"> Food Processor </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$335.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="item">
                            <div class="item-inner">
                                <div class="item-img">
                                    <div class="item-img-info">
                                        <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="Retis lapen casen" src="{{ asset('crocus_v2/images/product-img.jpg') }}"> </a>
                                        <div class="box-hover">
                                            <ul class="add-to-links">
                                                <li><a class="link-quickview" href="quick_view.html">Quick View</a>
                                                </li>
                                                <li><a class="link-wishlist" href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li><a class="link-compare" href="compare.html">Compare</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title"> <a title="Retis lapen casen" href="product_detail.html"> Retis lapen casen </a> </div>
                                        <div class="item-content">
                                            <div class="rating">
                                                <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
                                                    </div>
                                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                </div>
                                            </div>
                                            <div class="item-price">
                                                <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span>
                                                </div>
                                            </div>
                                            <div class="action">
                                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Upsell  Slider -->
</div>
@endsection

@section('PageJs')
    <script type="text/javascript" src="{{ asset('crocus_v2/js/jquery.flexslider.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('crocus_v2/js/owl.carousel.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('crocus_v2/js/cloud-zoom.js') }}" ></script>

@endsection
