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
                    <product-sidebar :categoryId="{{ $category->category_id }}"></product-sidebar>
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
