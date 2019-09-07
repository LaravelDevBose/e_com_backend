@extends('layouts.frontend.master')

@section('Title', 'Products')

@section('PageCss')
    <style>
        #narrow-by-list>li>a:hover,.tags-list>li>a:hover{

        }
        .tags-list>li{
            padding: 5px !important;
        }
        .tags-list>li>a:hover{
            text-decoration: underline!important;
            color: #167bcb;
            font-weight: 700;
        }
    </style>
@endsection

@section('Content')
<!-- Main Container -->
<section class="main-container col2-left-layout bounceInUp animated">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-sm-push-3">
                @if(!empty($category->attachment))
                <div class="category-description std">
                    <div class="slider-items-products">
                        <div class="item">
                            <a href="#">
                                <img alt="{{ $category->category_name }}" src="{{ $category->attachment->image_path }}">
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                <article class="col-main">
                    <h2 class="page-heading"> <span class="page-heading-title">{{ $category->category_name }}</span> </h2>
                    <div class="category-products">
                        <ul class="products-grid">
                            <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info"><a href="#" title="Food Processor" class="product-image"><img src="images/product-img.jpg" alt="Retis lapen casen"></a>
                                            <div class="new-label new-top-left">New</div>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a class="link-quickview" href="quick_view.html">Quick View</a> </li>
                                                    <li><a class="link-wishlist" href="wishlist.html">Wishlist</a> </li>
                                                    <li><a class="link-compare" href="compare.html">Compare</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a title="Food Processor" href="#"> Food Processor </a> </div>
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
                                                    <div class="price-box">
                                                        <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">$100.00 </span> </p>
                                                        <p class="special-price"><span class="price-label">Special Price</span> <span class="price">$90.00 </span> </p>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </article>
                <!--	///*///======    End article  ========= //*/// -->
            </div>
            <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <aside class="col-left sidebar">
                    @if(!empty($categories))
                    <div class="side-nav-categories">
                        <div class="block-title"> Categories </div>
                        <!--block-title-->
                        <!-- BEGIN BOX-CATEGORY -->
                        <div class="box-content box-category">
                            <ul>
                                @foreach($categories as $categoryData)
                                <li> <a class="active" href="{{ route('front.category.product', $categoryData->category_slug) }}">{{ $categoryData->category_name }}</a>
                                    @if(!empty($categoryData->children) && count($categoryData->children) > 0)
                                        <span class="subDropdown minus"></span>
                                        <ul class="level0_415" style="display:block">
                                            @foreach($categoryData->children as $secCategory)
                                                <li> <a href="{{ route('front.category.product', $secCategory->category_slug) }}">{{ $secCategory->category_name }}</a>
                                                    @if(!empty($secCategory->children) && count($secCategory->children) > 0)
                                                        <span class="subDropdown plus"></span>
                                                        <ul class="level1" style="display:none">
                                                            @foreach($secCategory->children as $trdCategory)
                                                                <li>
                                                                    <a href="{{ route('front.category.product', $trdCategory->category_slug) }}">{{ $trdCategory->category_name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--box-content box-category-->
                    </div>
                    @endif
                    <div class="hot-banner"><img alt="banner" src="images/hot-trends-banner.png"></div>
                    <div class="block block-layered-nav">
                        <div class="block-title">Shop By</div>
                        <div class="block-content">
                            <p class="block-subtitle">Shopping Options</p>
                            <dl id="narrow-by-list">
                                @if(!empty($brands))
                                <dt class="even">Manufacturer</dt>
                                <dd class="even">
                                    <ol>
                                        @foreach($brands as $brand)
                                        <li> <a href="#">{{ $brand->brand_name }}</a></li>
                                        @endforeach
                                    </ol>
                                </dd>
                                @endif

                                @if(!empty($colors))
                                    <dt class="odd">Color</dt>
                                    <dd class="odd">
                                        <ol>
                                            @foreach($colors as $color)
                                            <li> <a href="#">{{ $color->color_name }}</a></li>
                                            @endforeach
                                        </ol>
                                    </dd>
                                @endif

                                @if(!empty($sizes))
                                <dt class="last even">Size</dt>
                                <dd class="last even">
                                    <ol>
                                        @foreach($sizes as $size)
                                        <li> <a href="#">{{ $size->size_name }}</a></li>
                                        @endforeach
                                    </ol>
                                </dd>
                                @endif
                            </dl>
                        </div>
                    </div>
                    <div class="block block-list block-viewed">
                        <div class="block-title"> Recently Viewed </div>
                        <div class="block-content">
                            <ol id="recently-viewed-items">
                                <li class="item odd">
                                    <p class="product-name"><a href="#"> ThinkPad X1 Ultrabook </a></p>
                                </li>
                                <li class="item even">
                                    <p class="product-name"><a href="#"> Samsung GALAXY Note </a></p>
                                </li>
                                <li class="item last odd">
                                    <p class="product-name"><a href="#"> QX30 Lens Camera </a></p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    @if(!empty($tags))
                    <div class="block block-tags">
                        <div class="block-title"> Popular Tags</div>
                        <div class="block-content">
                            <ul class="tags-list">
                                @foreach($tags as $tag)
                                <li><a href="#" style="font-size:98.3333333333%;">{{ $tag->tag_title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- Main Container End -->
@endsection

@section('PageJs')
    <script type="text/javascript" src="{{ asset('front/js/owl.carousel.min.js') }}" async></script>
@endsection
