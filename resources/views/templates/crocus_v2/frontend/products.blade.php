@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Products')

@section('PageCss')
@endsection

@section('Content')
<!-- Main Container -->
<section class="main-container col2-left-layout bounceInUp animated" style="background: #FAFAFA">
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
                <article class="col-main" style="display: block">
                    <h2 class="page-heading" style="margin-bottom: 0px"> <span class="page-heading-title">{{ $category->category_name }}</span> </h2>
                    <products-page-list></products-page-list>
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
                                <li> <a  href="{{ route('front.category.product', $categoryData->category_slug) }}">{{ $categoryData->category_name }}</a>
                                    @if(!empty($categoryData->children) && count($categoryData->children) > 0)
                                        <span class="subDropdown plus"></span>
                                        <ul class="level0_415" style="display:none">
                                            @foreach($categoryData->children as $secCategory)
                                                <li> <a href="{{ route('front.category.product', $secCategory->category_slug) }}">{{ $secCategory->category_name }}</a>
                                                    @if(!empty($secCategory->children) && count($secCategory->children) > 0)
                                                        <span class="subDropdown plus"></span>
                                                        <ul class="level1" style="display:block">
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
                        <product-sidebar :categoryId="{{ $category->category_id }}"></product-sidebar>
                        @if(!empty($adsPageBodies))
                            @foreach($adsPageBodies as $adsPageBody)
                            <!-- home side banner -->
                                @if(empty($adsPageBody->ads_url))
                                    <div class="home-side-banner">
                                        <img alt="{{ $adsPageBody->ads_title }}" src="{{ $adsPageBody->image->image_path}}">
                                    </div>
                                @else
                                    <div class="side-banner-img">
                                        <a href="{{ $adsPageBody->ads_url }}" title="{{ $adsPageBody->ads_title }}">
                                            <img src="{{ $adsPageBody->image->image_path}}" alt="{{ $adsPageBody->ads_title }}">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
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
