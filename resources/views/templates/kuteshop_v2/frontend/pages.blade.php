@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Pages')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                {{--<li><a href="#">Home    </a></li>
                <li class="active">About Us</li>--}}
            </ol><!-- Block  Breadcrumb-->

            <div class="row">

                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3   col-main">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">{{ $page->page_title }}</span>
                    </h2>

                    <div class="content-text clearfix">
                        {!! $page->body_content !!}
                    </div>

                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9   col-sidebar">

                    <!-- Block  bestseller products-->
                    @if(!empty($pagesMenuList))
                    <div class="block-sidebar block-sidebar-categorie">
                        <div class="block-title">
                            <strong>Condition & Policies</strong>
                        </div>
                        <div class="block-content">
                            <ul class="items">
                                @foreach($pagesMenuList as $pageMenu)
                                <li>
                                    <a href="{{ route('front.pages', $pageMenu->page_slug) }}" title="{{ $pageMenu->menu_title }}">{{ $pageMenu->menu_title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <hot-deal-products-block :hotproducts="{{ $hotProducts }}"></hot-deal-products-block>
                </div><!-- Sidebar -->
            </div>
        </div>
    </main>
@endsection

@section('PageJs')

@endsection
