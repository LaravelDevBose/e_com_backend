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
                    <a href="" class="link-wishlist"><span>wishlish</span></a>
                    <!-- link  wishlish-->

                    <!-- block mini cart -->
                    <header-mini-cart></header-mini-cart>
                    <!-- block mini cart -->
                </div>
                <div class="nav-mind">
                    <!-- block search -->
                    <div class="block-search">
                        <div class="block-title">
                            <span>Search</span>
                        </div>
                        <div class="block-content">

                            <div class="form-search">
                                <form>
                                    <div class="box-group">
                                        <input type="text" class="form-control" placeholder="Search here...">
                                        <button class="btn btn-search" type="button"><span>search</span></button>
                                    </div>
                                </form>
                            </div>
                            <div class="categori-search  ">
                                <select data-placeholder="All Categories" class="categori-search-option">
                                    @if(!empty($catList))
                                    <option>All Categories</option>
                                        @foreach($catList as $cat)
                                        <option value="{{ $cat->category_slug }}"> {{ $cat->category_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
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
                <div class="block-nav-menu">
                    <div class="clearfix"><span data-action="close-nav" class="close-nav"><span>close</span></span></div>
                    <ul class="ui-menu">
                        <li><a href="">Sports</a></li>
                        <li class="parent parent-megamenu">
                            <a href="#">Digital </a>
                            <span class="toggle-submenu"></span>
                            <div class="megamenu drop-menu">
                                <ul>
                                    <li class="col-md-3">

                                        <strong class="title"><a href=""><span>Women's </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="">Shoes</a></li>
                                            <li><a href="">Clothing</a></li>
                                            <li><a href="">Accessories</a></li>
                                            <li><a href="">Sunglasses</a></li>
                                        </ul>

                                        <strong class="title"><a href=""><span>Women's </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="">Shoes</a></li>
                                            <li><a href="">Clothing</a></li>
                                            <li><a href="">Accessories</a></li>
                                            <li><a href="">Sunglasses</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">
                                        <strong class="title"><a href=""><span>Women's </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="">Shoes</a></li>
                                            <li><a href="">Clothing</a></li>
                                            <li><a href="">Accessories</a></li>
                                            <li><a href="">Sunglasses</a></li>
                                        </ul>

                                        <strong class="title"><a href=""><span>Women's </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="">Shoes</a></li>
                                            <li><a href="">Clothing</a></li>
                                            <li><a href="">Accessories</a></li>
                                            <li><a href="">Sunglasses</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">

                                        <strong class="title"><a href=""> <span>Kid's</span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="">Shoes</a></li>
                                            <li><a href="">Clothing</a></li>
                                            <li><a href="">Accessories</a></li>
                                            <li><a href="">Sunglasses</a></li>
                                        </ul>

                                        <strong class="title"><a href=""><span>Women's </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="">Shoes</a></li>
                                            <li><a href="">Clothing</a></li>
                                            <li><a href="">Accessories</a></li>
                                            <li><a href="">Sunglasses</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">
                                        <div class="img-categori">
                                            <a href=""><img alt="img" src="{{ asset('kuteshop_v2/images/media/index1/img-categori5.jpg') }}"></a>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div><!-- menu -->

                <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                <header-mini-cart></header-mini-cart>
                <div class="block-search">
                    <div class="block-title">
                        <span>Search</span>
                    </div>
                    <div class="block-content">
                        <div class="form-search">
                            <form>
                                <div class="box-group">
                                    <input type="text" class="form-control" placeholder="Search here...">
                                    <button class="btn btn-search" type="button"><span>search</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
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
                        <div class="switcher  switcher-currency">
                            <strong class="title">SELECT CURRENCIES</strong>
                            <ul class="switcher-options ">
                                <li class="switcher-option">
                                    <a href="#">
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="switcher-option switcher-active">
                                    <a href="#">
                                        <i class="fa fa-eur" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="switcher-option">
                                    <a href="#">
                                        <i class="fa fa-gbp" aria-hidden="true"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <ul class="account">
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Compare</a></li>
                            <li><a href="">Login/Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
