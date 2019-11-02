<header class="site-header header-opt-2 cate-show">

    <!-- header-top -->
    <div class="header-top">
        <div class="container">

            <!-- hotline -->
            <ul class=" nav-left" >
                <li ><span><i class="fa fa-phone" aria-hidden="true"></i>+ 00 123 456 789</span></li>
                <li ><span><i class="fa fa-envelope" aria-hidden="true"></i> Contact us today !</span></li>
                <li class="dropdown switcher  switcher-language">
                    <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle switcher-trigger" aria-expanded="false">
                        <img class="switcher-flag" alt="flag" src="{{ asset('kuteshop_v2/images/flags/flag_english.png') }}">
                        <span>English</span>
                        <i aria-hidden="true" class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu switcher-options ">
                        <li class="switcher-option">
                            <a href="#">
                                <img class="switcher-flag" alt="flag" src="{{ asset('kuteshop_v2/images/flags/flag_english.png') }}">English
                            </a>
                        </li>
                        <li class="switcher-option">
                            <a href="#">
                                <img class="switcher-flag" alt="flag" src="{{ asset('kuteshop_v2/images/flags/flag_french.png') }}">French
                            </a>
                        </li>
                        <li class="switcher-option">
                            <a href="#">
                                <img class="switcher-flag" alt="flag" src="{{ asset('kuteshop_v2/images/flags/flag_germany.png') }}">Germany
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- hotline -->

            <!-- heder links -->
            <ul class="nav-right">
                @if(auth()->guest())
                    <li><a href="{{ route('login') }}" >Customer Login</a></li>
                    <li><a href="{{ route('seller.login') }}">Seller Login </a></li>
                @else
                    <li class="dropdown setting">
                        <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>My Account</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                        <div class="dropdown-menu  ">
                            @if(auth()->guard('admin')->check())
                            <ul class="account">
                                <li><a href="{{ route('admin.home') }}">DashBoard</a></li>
                                <li><a href="{{ route('admin.order.index') }}">Orders</a></li>
                                <li><a href="{{ route('admin.product.index') }}">Products</a></li>
                                <li><a href="">Reviews</a></li>
                                <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                            </ul>
                            @elseif(auth()->guard('seller')->check())
                                <ul class="account">
                                    <li><a href="{{ route('seller.home') }}">DashBoard</a></li>
                                    <li><a href="{{ route('seller.order.index') }}">Orders</a></li>
                                    <li><a href="{{ route('seller.product.index') }}">Products</a></li>
                                    <li><a href="">Reviews</a></li>
                                    <li><a href="{{ route('seller.logout') }}">Logout</a></li>
                                </ul>
                            @else
                                <ul class="account">
                                    <li><a href="{{ route('buyer.home') }}">DashBoard</a></li>
                                    <li><a href="{{ route('buyer.wish_list') }}">Wishlist</a></li>
                                    <li><a href="{{ route('buyer.order.index') }}">Order</a></li>
                                    <li><a href="{{ route('buyer.logout') }}">Logout</a></li>
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
                <div class="col-md-3 nav-left">
                    <!-- logo -->
                    <strong class="logo">
                        <a href="{{ route('front.index') }}"><img src="{{ asset('kuteshop_v2/images/media/index2/logo.png') }}" alt="logo"></a>
                    </strong><!-- logo -->
                </div>
                <div class=" nav-right">
                    <!-- link  wishlish-->
                    @if(auth()->guard('web')->check())
                    <a href="{{ route('buyer.wish_list') }}" class="link-wishlist"><span>wishlish</span></a>
                    @else
                    <a href="{{ route('login') }}" class="link-wishlist"><span>wishlish</span></a>
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
                            <span>Search</span>
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

                <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat"><span>Categories</span><i aria-hidden="true" class="fa fa-bars"></i></span>
                <!-- categori -->
                    @include('templates.kuteshop_v2.layouts.frontend.includes.navigation')
                <!-- categori -->
                <!-- menu -->
                    @include('templates.kuteshop_v2.layouts.frontend.includes.headerMenu')
                <!-- menu -->

                <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                <header-mini-cart></header-mini-cart>
                <div class="block-search">
                    <div class="block-title">
                        <span>Search</span>
                    </div>
                    <mini-search-section></mini-search-section>
                </div>
                <div class="dropdown setting">
                    <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>Settings</span> <i aria-hidden="true" class="fa fa-user"></i></a>
                    <div class="dropdown-menu  ">
                        <div class="switcher  switcher-language">
                            <strong class="title">Select language</strong>
                            <ul class="switcher-options ">
                                <li class="switcher-option">
                                    <a href="#">
                                        <img class="switcher-flag" alt="flag" src="{{ asset('kuteshop_v2/images/flags/flag_french.png') }}">
                                    </a>
                                </li>
                                <li class="switcher-option">
                                    <a href="#">
                                        <img class="switcher-flag" alt="flag" src="{{ asset('kuteshop_v2/images/flags/flag_germany.png') }}">
                                    </a>
                                </li>
                                <li class="switcher-option">
                                    <a href="#">
                                        <img class="switcher-flag" alt="flag" src="{{ asset('kuteshop_v2/images/flags/flag_english.png') }}">
                                    </a>
                                </li>
                                <li class="switcher-option switcher-active">
                                    <a href="#">
                                        <img class="switcher-flag" alt="flag" src="{{ asset('kuteshop_v2/images/flags/flag_spain.png') }}">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @if(auth()->guest())
                            <ul class="account">
                                <li><a href="{{ route('login') }}" >Customer Login</a></li>
                                <li><a href="{{ route('seller.login') }}">Seller Login </a></li>
                            </ul>
                        @else
                            @if(auth()->guard('admin')->check())
                                <ul class="account">
                                    <li><a href="{{ route('admin.home') }}">DashBoard</a></li>
                                    <li><a href="{{ route('admin.order.index') }}">Orders</a></li>
                                    <li><a href="{{ route('admin.product.index') }}">Products</a></li>
                                    <li><a href="">Reviews</a></li>
                                    <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                                </ul>
                            @elseif(auth()->guard('seller')->check())
                                <ul class="account">
                                    <li><a href="{{ route('seller.home') }}">DashBoard</a></li>
                                    <li><a href="{{ route('seller.order.index') }}">Orders</a></li>
                                    <li><a href="{{ route('seller.product.index') }}">Products</a></li>
                                    <li><a href="">Reviews</a></li>
                                    <li><a href="{{ route('seller.logout') }}">Logout</a></li>
                                </ul>
                            @else
                                <ul class="account">
                                    <li><a href="{{ route('buyer.home') }}">DashBoard</a></li>
                                    <li><a href="{{ route('buyer.wish_list') }}">Wishlist</a></li>
                                    <li><a href="{{ route('buyer.order.index') }}">Order</a></li>
                                    <li><a href="{{ route('buyer.logout') }}">Logout</a></li>
                                </ul>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
