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
                <div class="box-section-top">
                    @include('templates.kuteshop_v2.layouts.frontend.includes.navigation')

                    <!-- block slide top -->
                    @include('templates.kuteshop_v2.frontend.section.slider')
                    <!-- block slide top -->
                </div>
            </div>
        </div>

        <!-- Block deals of -->

        @if(!empty($sections))
        <div class="clearfix" style="background-color: #eeeeee;margin-bottom: 30px; padding-top:30px;">
            @foreach($sections as $section)
                @if($section->section_type == 1)
                    <div class="block-floor-products block-floor-products-opt2 floor-products1" >
                        <div class="container">
                            <div class="block-title ">
                                <span class="title">
                                    <span class="text">{{ $section->section_title }} </span>
                                </span>
                            </div>

                            <div class="block-content">
                                <div class="col-categori">
                                    <ul>
                                        <li class="cat-orther">
                                            <a href="#all"  role="tab" data-toggle="tab">All</a>
                                        </li>
                                        @if(!empty($section->sectionCategories))
                                            @foreach($section->sectionCategories as $sectionCat)
                                                @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                                <li class="cat-orther">
                                                    <a href="#tab-{{ $sectionCat->category_id }}"  role="tab" data-toggle="tab">{{ $sectionCat->category->category_name }}</a>
                                                </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-banner">
                                    <a href="#" class="box-img">
                                        <img  src="{{ $section->attachment->image_path }}" alt="baner-floor" style="width: 100%; height: 100%;">
                                    </a>
                                </div>
                                @if(!empty($section->sectionCategories))
                                <div class="col-products tab-content">
                                    <div class="tab-pane active in  fade " id="all" role="tabpanel">
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
                                            <?php $i=0; $total = count($section->sectionProducts); ?>
                                            @foreach($section->sectionCategories as $sectionCat)
                                                @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                                    @foreach($sectionCat->secCatProducts as $secCatProduct)
                                                        @if($i %2 == 0)
                                                        <div class="item">
                                                        @endif
                                                            <section-product-grid :product="{{ $secCatProduct->product }}"></section-product-grid>
                                                            <?php $i++; ?>
                                                        @if($i % 2 == 0 || $i == $total)
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    @foreach($section->sectionCategories as $sectionCat)
                                        @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                            <div class="tab-pane " id="tab-{{ $sectionCat->category_id }}" role="tabpanel">
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
                                                    <?php $i=0; $total = count($sectionCat->secCatProducts); ?>
                                                    @foreach($sectionCat->secCatProducts as $secCatProduct)
                                                        @if($i %2 == 0)
                                                            <div class="item">
                                                                @endif
                                                                <section-product-grid :product="{{ $secCatProduct->product }}"></section-product-grid>
                                                                <?php $i++; ?>
                                                                @if($i % 2 == 0 || $i == $total)
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                @elseif($section->section_type == 2)
                    @if(count($section->sectionProducts) > 0)
                        <div class="container ">
                            <div class="block-deals-of-opt2">
                                <div class="block-title ">
                                    <span class="title">{{ $section->section_title }}</span>
                                    {{--<div class="deals-of-countdown">
                                        <span class="title">End In</span>
                                        <div class="count-down-time" data-countdown="2016/9/27"></div>
                                    </div>--}}
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
                                        @foreach($section->sectionCategories as $sectionCat)
                                            @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                                @foreach($sectionCat->secCatProducts as $secCatProduct)
                                                    <section-product-grid :product="{{ $secCatProduct->product }}"></section-product-grid>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="container ">
                        <div class="block-deals-of-opt2">
                            <div class="block-title ">
                                <span class="title">{{ $section->section_title }}</span>
                                {{--<div class="deals-of-countdown">
                                    <span class="title">End In</span>
                                    <div class="count-down-time" data-countdown="2016/9/27"></div>
                                </div>--}}
                            </div>
                            <div class="block-content">
                                <div class="products  products-grid">
                                    <ol class="product-items row">
                                        @foreach($section->sectionCategories as $sectionCat)
                                            @if(!empty($sectionCat->secCatProducts) && count($sectionCat->secCatProducts) > 0)
                                                @foreach($sectionCat->secCatProducts as $secCatProduct)
                                                    <li class="col-sm-3 ">
                                                    <product-grid :product="{{ $secCatProduct->product }}"></product-grid>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </ol><!-- list product -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @endif
        <!-- Banner -->
        <banner-ads-section></banner-ads-section>
        <!-- Banner -->

    </main>
@endsection

@section('PageJs')

@endsection
