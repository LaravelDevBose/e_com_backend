<div class="header-container">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Header Language -->
                <div class="col-xs-12 col-sm-6">
                    <div class="dropdown block-language-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#"> <img src="{{ asset('front/images/english.png') }}" alt="language"> English <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"> <a href="#"><img src="{{ asset('front/images/english.png') }}" alt="language"> English </a> </li>
                            <li role="presentation"> <a href="#"><img src="{{ asset('front/images/francais.png') }}" alt="language"> French </a> </li>
                            <li role="presentation"> <a href="#"><img src="{{ asset('front/images/german.png') }}" alt="language"> German </a> </li>
                        </ul>
                    </div>
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
                    <div class="welcome-msg"> Welcome Crocus! </div>
                </div>
                <div class="col-xs-6 hidden-xs">
                    <!-- Header Top Links -->
                    <div class="toplinks">
                        <div class="links">
                            @if(auth()->guest())
                                <div class="myaccount"><a title="My Account" href="{{ route('login') }}"><span class="hidden-xs">My Account</span></a> </div>
                                <div class="check"><a title="Checkout" href="{{ route('front.checkout') }}"><span class="hidden-xs">Checkout</span></a> </div>
                                <div class="login"><a href="{{ route('login') }}"><span class="hidden-xs">Buyer Login</span></a> </div>
                                <div class="demo"><a title="Blog" href="{{ route('seller.login') }}"><span class="hidden-xs">Seller Login</span></a> </div>
                            @elseif(auth()->guard('admin')->check())
                                <div class="myaccount"><a title="My Account" href="{{ route('admin.home') }}"><span class="hidden-xs">Admin Panel</span></a> </div>
                                <div class="login"><a href="{{ route('admin.logout') }}"><span class="hidden-xs">Logout</span></a> </div>
                            @elseif(auth()->guard('seller')->check())
                                <div class="myaccount"><a title="My Account" href="{{ route('seller.home') }}"><span class="hidden-xs">My Account</span></a> </div>
                                <div class="login"><a href="{{ route('seller.logout') }}"><span class="hidden-xs">Logout</span></a> </div>
                            @else
                                <div class="myaccount"><a title="My Account" href="{{ route('buyer.home') }}"><span class="hidden-xs">My Account</span></a> </div>
                                <div class="check"><a title="Checkout" href="{{ route('front.checkout') }}"><span class="hidden-xs">Checkout</span></a> </div>
                                <div class="login"><a href="{{ route('buyer.logout') }}"><span class="hidden-xs">Logout</span></a> </div>
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
                <div class="logo"> <a title="Magento Commerce" href="{{ route('front.index') }}"><img alt="Magento Commerce" src="{{ asset('front/images/logo.png') }}"> </a> </div>
                <!-- End Header Logo -->
            </div>
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12 hidden-xs">
                <div class="search-box">
                    <form action="cat" method="POST" id="search_mini_form" name="Categories">
                        <input type="text" placeholder="Search entire store here..." value="Search entire store" maxlength="70" name="search" id="search">
                        <button type="button" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <a href="#" class="top-link-compare hidden-xs"><i class="compare"></i></a>
                <a href="#" title="My Wishlist" class="top-link-wishlist hidden-xs"><i class="fa fa-heart"></i></a>

                <div class="top-cart-contain pull-right">
                    <!-- Top Cart -->
                    <div class="mini-cart">
                        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="{{ route('front.cart') }}"> <span class="cart_count">2</span><span class="price">Shopping Cart</span> </a> </div>
                        <div>
                            <div class="top-cart-content">

                                <!--block-subtitle-->
                                <ul class="mini-products-list" id="cart-sidebar">
                                    <li class="item first">
                                        <div class="item-inner"> <a class="product-image" title="QX30 Lens Camera" href="#l"><img alt="QX30 Lens Camera" src="{{ asset('front/images/product-img.jpg') }}"> </a>
                                            <div class="product-details">
                                                <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                                <!--access--><strong>1</strong> x <span class="price">$179.99</span>
                                                <p class="product-name"><a href="#">QX30 Lens Camera...</a> </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item last">
                                        <div class="item-inner"> <a class="product-image" title="Epson L360 Printer" href="product_detail.html"><img alt="Epson L360 Printer" src="{{ asset('front/images/product-img.jpg') }}"> </a>
                                            <div class="product-details">
                                                <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                                <!--access--><strong>1</strong> x <span class="price">$80.00</span>
                                                <p class="product-name"><a href="#">Epson L360 Printer...</a> </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <!--actions-->
                                <div class="actions">
                                    <a href="{{ route('front.checkout') }}" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span> </a>
                                    <a href="{{ route('front.cart') }}" class="view-cart"><span>View Cart</span></a> </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top Cart -->
                    <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
                        <input value="" type="hidden">
                        <input id="enable_module" value="1" type="hidden">
                        <input class="effect_to_cart" value="1" type="hidden">
                        <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
