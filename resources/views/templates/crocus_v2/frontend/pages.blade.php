@extends('templates.crocus_v2.layouts.frontend.master')

@section('Title', 'Pages')

@section('PageCss')
    <style>
        .static-contain p ,.static-contain li{
            margin-bottom: 1em;
        }
    </style>
@endsection

@section('Content')
<!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 wow bounceInUp animated">
                <div class="col-main">
                    <div class="page-title">
                        <h2>{{ $page->page_title }}</h2>
                    </div>
                    <div class="static-contain">
                        <div class="featured-thumb">
                            @if(!empty($page->attachment))
                                <img class="img img-thumbnail img-responsive" alt="{{ $page->page_title }}" src="{{ $page->attachment->image_path }}" style="width: 100%; height: auto; max-height: 300px;">
                            @else
                                <img class="img img-thumbnail img-responsive" alt="{{ $page->page_title }}" src="{{ asset('crocus_v2/images/footer-banner.png') }}" style="width: 100%; height: auto; max-height: 300px;">
                            @endif
                        </div>
                    </div>
                    <div class="static-contain">
                        {!! $page->body_content !!}
                    </div>

                    @if(!empty($page->other_content))
                        <div class="static-contain">
                            {!! $page->other_content !!}
                        </div>
                    @endif
                </div>
            </section>
            <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
                <div class="block block-company">
                    <div class="block-title">Company </div>
                    @if(!empty($pagesMenuList))
                        <div class="block-content">
                            <ol id="recently-viewed-items">
                                @foreach($pagesMenuList as $pageMenu)
                                <li class="item {{ ($loop->even) ? 'even':'odd' }}">
                                    @if($pageMenu->page_id == $page->page_id)
                                    <strong>{{ $pageMenu->menu_title }}</strong>
                                    @else
                                        <a href="{{ route('front.pages', $pageMenu->page_slug) }}"> {{ $pageMenu->menu_title }}</a>
                                    @endif
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    @endif
                </div>
            </aside>
        </div>
    </div>
</div>
<!--End main-container -->
@endsection

@section('PageJs')

@endsection
