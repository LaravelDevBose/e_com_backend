<header class="site-header header-opt-2 cate-show">

    <!-- header-top -->
    <div class="header-top">
        <div class="container">

            <!-- hotline -->
            <ul class=" nav-left" >
                <li ><span><i class="fa fa-phone" aria-hidden="true"></i>{{ (!empty($contactInfos['contact_phone'])) ? $contactInfos['contact_phone'] : '' }}</span></li>
                <li ><span><i class="fa fa-envelope" aria-hidden="true"></i> @lang('header.contact_us_today') !</span></li>
            </ul>
            <!-- hotline -->

            <!-- heder links -->
            <ul class="nav-right">
                @if(auth()->guest())
                    <li><a href="{{ route('login') }}" >@lang('header.login')</a></li>
                    <li><a href="{{ route('seller.login') }}">@lang('header.seller_login')</a></li>
                @else
                    <li class="dropdown setting">
                        <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>@lang('header.my_account')</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                        <div class="dropdown-menu  ">
                            @if(auth()->guard('admin')->check())
                            <ul class="account">
                                <li><a href="{{ route('admin.home') }}">@lang('header.dashboard')</a></li>
                                <li><a href="{{ route('admin.order.index') }}">{{ trans_choice('header.order',2) }}</a></li>
                                <li><a href="{{ route('admin.product.index') }}">{{ trans_choice('header.product', 2) }}</a></li>
                                <li><a href="{{ route('admin.logout') }}">@lang('logout')</a></li>
                            </ul>
                            @elseif(auth()->guard('seller')->check())
                                <ul class="account">
                                    <li><a href="{{ route('seller.home') }}">@lang('header.dashboard')</a></li>
                                    <li><a href="{{ route('seller.order.index') }}">{{ trans_choice('header.order',2) }}</a></li>
                                    <li><a href="{{ route('seller.product.index') }}">{{ trans_choice('header.product', 2) }}</a></li>
                                    <li><a href="{{ route('seller.logout') }}">@lang('logout')</a></li>
                                </ul>
                            @else
                                <ul class="account">
                                    <li><a href="{{ route('buyer.home') }}">@lang('header.dashboard')</a></li>
                                    <li><a href="{{ route('buyer.wish_list') }}">@lang('wishlist')</a></li>
                                    <li><a href="{{ route('buyer.order.index') }}">{{ trans_choice('header.order',2) }}</a></li>
                                    <li><a href="{{ route('buyer.logout') }}">@lang('logout')</a></li>
                                </ul>
                            @endif
                        </div>
                    </li>
                @endif
            </ul><!-- heder links -->

        </div>
    </div>
    <!-- header-top -->
    <!-- header-content -->
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="nav-left col-md-3">
                    @if(!empty($siteTitle))
                        {{--<a href="{{ route('front.index') }}" class="desktop-svg">
                            <svg viewBox="0 0 700 200" >
                                <!-- Symbol-->
                                <symbol id="s-text">
                                    <text text-anchor="middle" x="50%" y="50%" dy=".35em">{{ $siteTitle }}</text>
                                </symbol>
                                <!-- Duplicate symbols-->
                                <use class="a-text" xlink:href="#s-text"></use>
                                <use class="a-text" xlink:href="#s-text"></use>
                                <use class="a-text" xlink:href="#s-text"></use>
                                <use class="a-text" xlink:href="#s-text"></use>
                                <use class="a-text" xlink:href="#s-text"></use>
                            </svg>
                        </a>--}}
                    @endif
                    <!-- logo -->
                    <strong class="logo">
                        <a href="{{ route('front.index') }}">
                            <img src="{{ config('app.logo') }}" alt="logo">
                        </a>
                    </strong>
                    <!-- logo -->
                </div>
                <div class=" nav-right">
                    <!-- link  wishlish-->
                    @if(auth()->guard('web')->check())
                    <a href="{{ route('buyer.wish_list') }}" class="link-wishlist"><span>@lang('wishlist')</span></a>
                    @else
                    <a href="{{ route('login') }}" class="link-wishlist"><span>@lang('wishlist')</span></a>
                    @endif
                    <!-- link  wishlish-->

                    <!-- block mini cart -->
                    <header-mini-cart></header-mini-cart>
                    <!-- block mini cart -->
                </div>
                <div class="nav-mind">
                    <!-- block search -->
                    <div class="block-search search-hide">
                        <div class="block-title">
                            <span>@lang('header.search')</span>
                        </div>
                        <search-section></search-section>
                    </div><!-- block search -->

                </div>
            </div>

        </div>
    </div><!-- header-content -->

    <div class="  header-nav mid-header">
        <div class="container">
            <div class="box-header-nav">

                <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat"><span>{{ trans_choice('header.category',2) }}</span><i aria-hidden="true" class="fa fa-bars"></i></span>
                <!-- categori -->
                    @include('templates.kuteshop_v2.layouts.frontend.includes.navigation')
                <!-- categori -->
                <!-- menu -->
                    @include('templates.kuteshop_v2.layouts.frontend.includes.headerMenu')
                <!-- menu -->

                <span data-action="toggle-nav" class="nav-toggle-menu"><span>@lang('header.menu')</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                <header-mini-cart></header-mini-cart>
                <div class="block-search">
                    <div class="block-title">
                        <span>@lang('header.search')</span>
                    </div>
                    <mini-search-section></mini-search-section>
                </div>
                <div class="dropdown setting">
                    <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>{{ trans_choice('header.setting',2) }}</span> <i aria-hidden="true" class="fa fa-user"></i></a>
                    <div class="dropdown-menu  ">
                        {{--<div class="switcher  switcher-language">
                            <strong class="title">@lang('header.select_lang')</strong>
                            <div class="switcher-options ">
                                <language-switcher></language-switcher>
                            </div>
                        </div>--}}
                        @if(auth()->guest())
                            <ul class="account">
                                <li><a href="{{ route('login') }}" >{{ __('header.login')  }}</a></li>
                                <li><a href="{{ route('seller.login') }}">{{ __('header.seller_login') }}</a></li>
                            </ul>
                        @else
                            @if(auth()->guard('admin')->check())
                                <ul class="account">
                                    <li><a href="{{ route('admin.home') }}">{{ __('header.dashboard') }}</a></li>
                                    <li><a href="{{ route('admin.order.index') }}">{{ trans_choice('header.order',2) }}</a></li>
                                    <li><a href="{{ route('admin.product.index') }}">{{ trans_choice('header.product', 2) }}</a></li>
                                    <li><a href="{{ route('admin.logout') }}">{{ __('header.logout') }}</a></li>
                                </ul>
                            @elseif(auth()->guard('seller')->check())
                                <ul class="account">
                                    <li><a href="{{ route('seller.home') }}">{{ __('header.dashboard') }}</a></li>
                                    <li><a href="{{ route('seller.order.index') }}">{{ trans_choice('header.order',2) }}</a></li>
                                    <li><a href="{{ route('seller.product.index') }}">{{ trans_choice('header.product', 2) }}</a></li>
                                    <li><a href="{{ route('seller.logout') }}">{{ __('header.logout')  }}</a></li>
                                </ul>
                            @else
                                <ul class="account">
                                    <li><a href="{{ route('buyer.home') }}">{{ __('header.dashboard') }}</a></li>
                                    <li><a href="{{ route('buyer.wish_list') }}">{{ __('header.wishlist') }}</a></li>
                                    <li><a href="{{ route('buyer.order.index') }}">{{ trans_choice('header.order',2) }}</a></li>
                                    <li><a href="{{ route('buyer.logout') }}">{{ __('header.logout') }}</a></li>
                                </ul>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
