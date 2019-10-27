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
                            </div><!-- detail- product -->

                        </div><!-- Main detail -->

                    </div>

                    <!-- product tab info -->

                    <div class="product-info-detailed ">

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#description"  role="tab" data-toggle="tab">Product Details   </a></li>
{{--                            <li role="presentation"><a href="#tags"  role="tab" data-toggle="tab">information </a></li>--}}
                            <li role="presentation"><a href="#reviews"  role="tab" data-toggle="tab">reviews</a></li>
{{--                            <li role="presentation"><a href="#additional"  role="tab" data-toggle="tab">Extra Tabs</a></li>--}}
{{--                            <li role="presentation"><a href="#tab-cust"  role="tab" data-toggle="tab">Guarantees</a></li>--}}
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="block-title">Product Details</div>
                                <div class="block-content">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tags">
                                <div class="block-title">information</div>
                                <div class="block-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>


                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="reviews">
                                <div class="block-title">reviews</div>
                                <div class="block-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="additional">
                                <div class="block-title">Extra Tabs</div>
                                <div class="block-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tab-cust">
                                <div class="block-title">Guarantees</div>
                                <div class="block-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also Aldus PageMaker including versions of Lorem Ipsum</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product tab info -->

                    <!-- block-related product -->
                    <div class="block-related ">
                        <div class="block-title">
                            <strong class="title">RELATED products</strong>
                        </div>
                        <div class="block-content ">
                            <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":3},"1200":{"items":4}}'>


                                <li class="product-item product-item-opt-2">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/detail/related2-1.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>

                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Brown Short 100% Cotton</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item product-item-opt-2">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/detail/related2-2.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>

                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Summer T-Shirt</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item product-item-opt-2">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/detail/related2-3.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>

                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Blue Short 50% Cotton</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item product-item-opt-2">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/detail/related2-1.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>

                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Brown Short 100% Cotton</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ol>
                        </div>
                    </div><!-- block-related product -->

                    <!-- block-Upsell Products -->
                    <div class="block-upsell ">
                        <div class="block-title">
                            <strong class="title">You might also like</strong>
                        </div>
                        <div class="block-content ">
                            <ol class="product-items owl-carousel " data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"992":{"items":3},"1200":{"items":4}}'>


                                <li class="product-item product-item-opt-2">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/detail/Upsell2-1.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Leather Swiss Watch</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="product-item product-item-opt-2">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/detail/Upsell2-2.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>

                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Sport T-Shirt For Men</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item product-item-opt-2">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/detail/Upsell2-3.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>

                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Fashion Leather Handbag</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product-item product-item-opt-2">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/detail/Upsell2-3.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>

                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Fashion Leather Handbag</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="70%">
                                                                <span style="width:70%">
                                                                    <span><span>70</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ol>
                        </div>
                    </div><!-- block-Upsell Products -->

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
