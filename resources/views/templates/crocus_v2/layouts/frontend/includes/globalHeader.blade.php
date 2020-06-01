<div class="header-container">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Language -->
                <div class="col-xs-12 col-sm-6">
                    <language-switcher></language-switcher>
                    <!-- End Header Language -->

                    <!-- Header Currency -->
                    {{--<div class="dropdown block-currency-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-currency dropdown-toggle" href="#"> USD <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="#"> $ - Dollar </a> </li>
                            <li role="presentation"><a href="#"> £ - Pound </a> </li>
                            <li role="presentation"><a href="#"> € - Euro </a> </li>
                        </ul>
                    </div>--}}
                    <!-- End Header Currency -->
                    <div class="welcome-msg"> {{ __('header.welcome') }}! </div>
                    <header-city-list></header-city-list>
                </div>
                <div class="col-xs-6 hidden-xs">
                    <!-- Header Top Links -->
                    <div class="toplinks">
                        <div class="links">
                            @if(auth()->guest())
                                <div class="myaccount"><a title="{{ __('header.my_account') }}" href="{{ route('login') }}"><span class="hidden-xs">{{ __('header.my_account') }}</span></a> </div>
                                <div class="login"><a href="{{ route('login') }}"><span class="hidden-xs">{{ __('header.login') }}</span></a> </div>
                                <div class="demo"><a title="{{ __('header.seller_login') }}" href="{{ route('seller.login') }}"><span class="hidden-xs">{{ __('header.seller_login') }}</span></a> </div>
                            @elseif(auth()->guard('admin')->check())
                                <div class="myaccount"><a title="{{ __('header.my_account') }}" href="{{ route('admin.home') }}"><span class="hidden-xs">{{ __('header.admin_panel') }}</span></a> </div>
                                <div class="login"><a href="{{ route('admin.logout') }}"><span class="hidden-xs">{{ __('header.logout') }}</span></a> </div>
                            @elseif(auth()->guard('seller')->check())
                                <div class="myaccount"><a title="{{ __('header.my_account') }}" href="{{ route('seller.home') }}"><span class="hidden-xs">{{ __('header.my_account') }}</span></a> </div>
                                <div class="login"><a href="{{ route('seller.logout') }}"><span class="hidden-xs">{{ __('header.logout') }}</span></a> </div>
                            @else
                                @if(auth()->user()->account_type != 3 )
                                <div class="check"><a title="{ __('header.sell with') }}" href="{{ route('buyer.seller.register') }}"><span class="hidden-xs">{{ __('header.sell with') }}</span></a> </div>
                                @endif
                                <div class="myaccount"><a title="{{ __('header.my_account') }}" href="{{ route('buyer.home') }}"><span class="hidden-xs">{{ __('header.my_account') }}</span></a> </div>
                                <div class="login"><a href="{{ route('buyer.logout') }}"><span class="hidden-xs">{{ __('header.logout') }}</span></a> </div>
                            @endif
                        </div>
                    </div>
                    <!-- End Header Top Links -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-block">
                <!-- Header Logo -->
                <div class="logo">
                    <a title="Magento Commerce" href="{{ route('front.index') }}">
                        <img alt="Magento Commerce" src="{{ asset('crocus_v2/images/logo.png') }}">
                    </a>
                </div>
                <!-- End Header Logo -->
            </div>
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12 hidden-xs">
                <search-section></search-section>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                @if(auth()->guest())
                <a href="{{ route('login') }}" title="My Wishlist" class="top-link-wishlist hidden-xs"><i class="fa fa-heart"></i></a>
                @else
                <a href="{{ route('buyer.wish_list') }}" title="My Wishlist" class="top-link-wishlist hidden-xs"><i class="fa fa-heart"></i></a>
                @endif
                <div class="top-cart-contain pull-right">
                    <!-- Top Cart -->
                    <header-mini-cart></header-mini-cart>
                    <!-- Top Cart -->
                </div>
            </div>
        </div>
    </div>
</div>
