@extends('templates.crocus_v2.layouts.frontend.master')

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
                                <img alt="{{ $category->category_name }}" src="{{ $category->attachment->image_path }}" style="width: 100%; height: auto; max-height: 350px;">
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                <article class="col-main row" style="display: block">
                    <h2 class="page-heading"> <span class="page-heading-title">{{ $category->category_name }}</span> </h2>
                    <div class="category-products">
                        @if(!empty($products))
                            <ul class="products-grid">
                                @foreach($products as $product)
                                    <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                        <product-grid :product="{{ $product }}"></product-grid>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
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
                    <div class="hot-banner"><img alt="banner" src="{{ asset('crocus_v2/images/hot-trends-banner.jpg') }}"></div>
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
    <script type="text/javascript" src="{{ asset('crocus_v2/js/owl.carousel.min.js') }}" async></script>
@endsection
