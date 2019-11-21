 <!-- HEADER -->
 <header class="site-header header-opt-6">

     <!-- header-top -->
     <div class="header-top">
         <div class="container">

             <!-- hotline -->
             <ul class="hotline nav-left">

                 <li class="dropdown switcher  switcher-currency">
                     <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle switcher-trigger"><span>USD</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                     <ul class="dropdown-menu switcher-options ">
                         <li class="switcher-option">
                             <a href="#">
                                 <i class="fa fa-usd" aria-hidden="true"></i> USD
                             </a>
                         </li>
                         <li class="switcher-option">
                             <a href="#">
                                 <i class="fa fa-eur" aria-hidden="true"></i> eur
                             </a>
                         </li>
                         <li class="switcher-option">
                             <a href="#">
                                 <i class="fa fa-gbp" aria-hidden="true"></i> gbp
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="dropdown switcher  switcher-language">
                     <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle switcher-trigger" aria-expanded="false">

                         <span>English</span>
                         <i aria-hidden="true" class="fa fa-angle-down"></i>
                     </a>
                     <ul class="dropdown-menu switcher-options ">
                         <li class="switcher-option">
                             <a href="#">
                                 <img class="switcher-flag" alt="flag" src="{{ asset('/kuteshop_v1/images/flags/flag_english.png')}}">English
                             </a>
                         </li>
                         <li class="switcher-option">
                             <a href="#">
                                 <img class="switcher-flag" alt="flag" src="{{ asset('/kuteshop_v1/images/flags/flag_french.png')}}">French
                             </a>
                         </li>
                         <li class="switcher-option">
                             <a href="#">
                                 <img class="switcher-flag" alt="flag" src="{{ asset('/kuteshop_v1/images/flags/flag_germany.png')}}">Germany
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="social">
                     <a href="" class="sh-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                     <a href="" class="sh-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                     <a href="" class="sh-pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                     <a href="" class="sh-google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                 </li>
             </ul><!-- hotline -->

             <!-- heder links -->
             <ul class="links nav-right">
                 @if(auth()->guest())
                 <li><a href="{{ route('login') }}">Customer Login</a></li>
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
     </div> <!-- header-top -->

     <!-- header-content -->
     <div class="header-content">
         <div class="container">

             <div class="clearfix">

                 <div class="nav-left">
                     <!-- logo -->
                     <strong class="logo">
                         <a href=""><img src="{{ asset('/kuteshop_v1/images/media/index6/logo.png')}}" alt="logo"></a>
                     </strong><!-- logo -->
                 </div>

                 <div class="nav-mind">

                     <!-- block search -->
                     <div class="block-search">
                         <div class="block-title">
                             <span>Search</span>
                         </div>
                         <div class="block-content">
                             <div class="categori-search  ">
                                 <select data-placeholder="All Categories" class="categori-search-option">
                                     <option>All Categories</option>
                                     <option>Fashion</option>
                                     <option>Tops Blouses</option>
                                     <option>Clothing</option>
                                     <option>Furniture</option>
                                     <option>Bathtime Goods</option>
                                     <option>Shower Curtains</option>
                                 </select>
                             </div>
                             <div class="form-search">
                                 <form>
                                     <div class="box-group">
                                         <input type="text" class="form-control" placeholder="I’m searching for...">
                                         <button class="btn btn-search" type="button"><span>search</span></button>
                                     </div>
                                 </form>
                             </div>

                         </div>
                     </div><!-- block search -->
                 </div>

                 <div class="nav-right">

                     <!-- link  wishlish-->
                     <a href="" class="link-compare"><span>compare</span></a>
                     <!-- link  wishlish-->

                     <!-- link  wishlish-->
                     <a href="" class="link-wishlist"><span>wishlish</span></a>
                     <!-- link  wishlish-->

                     <!-- block mini cart -->
                     <div class="block-minicart dropdown">
                         <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                             <span class="cart-icon"></span>
                             <span class="cart-text">cart</span>
                             <span class="counter qty">
                                 <span class="counter-number">6</span>
                                 <span class="counter-label">6 <span>Item(s)</span></span>
                                 <span class="counter-price">$75.00</span>
                             </span>
                         </a>
                         <div class="dropdown-menu">
                             <form>
                                 <div class="minicart-content-wrapper">
                                     <div class="subtitle">
                                         You have 6 item(s) in your cart
                                     </div>
                                     <div class="minicart-items-wrapper">
                                         <ol class="minicart-items">
                                             <li class="product-item">
                                                 <a class="product-item-photo" href="#" title="The Name Product">
                                                     <img class="product-image-photo" src="{{ asset('/kuteshop_v1/images/media/index1/minicart.jpg')}}" alt="The Name Product">
                                                 </a>
                                                 <div class="product-item-details">
                                                     <strong class="product-item-name">
                                                         <a href="#">Donec Ac Tempus</a>
                                                     </strong>
                                                     <div class="product-item-price">
                                                         <span class="price">61,19 €</span>
                                                     </div>
                                                     <div class="product-item-qty">
                                                         <span class="label">Qty: </span><span class="number">1</span>
                                                     </div>
                                                     <div class="product-item-actions">
                                                         <a class="action delete" href="#" title="Remove item">
                                                             <span>Remove</span>
                                                         </a>
                                                     </div>
                                                 </div>
                                             </li>
                                             <li class="product-item">
                                                 <a class="product-item-photo" href="#" title="The Name Product">
                                                     <img class="product-image-photo" src="{{ asset('/kuteshop_v1/images/media/index1/minicart2.jpg')}}" alt="The Name Product">
                                                 </a>
                                                 <div class="product-item-details">
                                                     <strong class="product-item-name">
                                                         <a href="#">Donec Ac Tempus</a>
                                                     </strong>
                                                     <div class="product-item-price">
                                                         <span class="price">61,19 €</span>
                                                     </div>
                                                     <div class="product-item-qty">
                                                         <span class="label">Qty: </span><span class="number">1</span>
                                                     </div>
                                                     <div class="product-item-actions">
                                                         <a class="action delete" href="#" title="Remove item">
                                                             <span>Remove</span>
                                                         </a>
                                                     </div>
                                                 </div>
                                             </li>
                                         </ol>
                                     </div>
                                     <div class="subtotal">
                                         <span class="label">Total</span>
                                         <span class="price">$630</span>
                                     </div>
                                     <div class="actions">
                                         <!-- <a class="btn btn-viewcart" href="">
                                                    <span>Shopping bag</span>
                                                </a> -->
                                         <button class="btn btn-checkout" type="button" title="Check Out">
                                             <span>Checkout</span>
                                         </button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div><!-- block mini cart -->


                 </div>

             </div>

         </div>
     </div><!-- header-content -->

     <div class="  header-nav mid-header">
         <div class="container">
             <div class="box-header-nav">


                 <!-- menu -->
                 @include('templates.kuteshop_v1.layouts.frontend.includes.headerMenu')
                 <!-- menu -->

                 <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                 <div class="block-minicart dropdown ">
                     <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                         <span class="cart-icon"></span>
                     </a>
                     <div class="dropdown-menu">
                         <form>
                             <div class="minicart-content-wrapper">
                                 <div class="subtitle">
                                     You have 6 item(s) in your cart
                                 </div>
                                 <div class="minicart-items-wrapper">
                                     <ol class="minicart-items">
                                         <li class="product-item">
                                             <a class="product-item-photo" href="#" title="The Name Product">
                                                 <img class="product-image-photo" src="{{ asset('/kuteshop_v1/images/media/index1/minicart.jpg')}}" alt="The Name Product">
                                             </a>
                                             <div class="product-item-details">
                                                 <strong class="product-item-name">
                                                     <a href="#">Donec Ac Tempus</a>
                                                 </strong>
                                                 <div class="product-item-price">
                                                     <span class="price">61,19 €</span>
                                                 </div>
                                                 <div class="product-item-qty">
                                                     <span class="label">Qty: </span><span class="number">1</span>
                                                 </div>
                                                 <div class="product-item-actions">
                                                     <a class="action delete" href="#" title="Remove item">
                                                         <span>Remove</span>
                                                     </a>
                                                 </div>
                                             </div>
                                         </li>
                                         <li class="product-item">
                                             <a class="product-item-photo" href="#" title="The Name Product">
                                                 <img class="product-image-photo" src="{{ asset('/kuteshop_v1/images/media/index1/minicart2.jpg')}}" alt="The Name Product">
                                             </a>
                                             <div class="product-item-details">
                                                 <strong class="product-item-name">
                                                     <a href="#">Donec Ac Tempus</a>
                                                 </strong>
                                                 <div class="product-item-price">
                                                     <span class="price">61,19 €</span>
                                                 </div>
                                                 <div class="product-item-qty">
                                                     <span class="label">Qty: </span><span class="number">1</span>
                                                 </div>
                                                 <div class="product-item-actions">
                                                     <a class="action delete" href="#" title="Remove item">
                                                         <span>Remove</span>
                                                     </a>
                                                 </div>
                                             </div>
                                         </li>
                                     </ol>
                                 </div>
                                 <div class="subtotal">
                                     <span class="label">Total</span>
                                     <span class="price">$630</span>
                                 </div>
                                 <div class="actions">
                                     <!-- <a class="btn btn-viewcart" href="">
                                                <span>Shopping bag</span>
                                            </a> -->
                                     <button class="btn btn-checkout" type="button" title="Check Out">
                                         <span>Checkout</span>
                                     </button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>

                 <div class="block-search">
                     <div class="block-title">
                         <span>Search</span>
                     </div>
                     <div class="block-content">
                         <div class="form-search">
                             <form>
                                 <div class="box-group">
                                     <input type="text" class="form-control" placeholder="I’m searching for...">
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
                                         <img class="switcher-flag" alt="flag" src="{{ asset('/kuteshop_v1/images/flags/flag_french.png')}}">
                                     </a>
                                 </li>
                                 <li class="switcher-option">
                                     <a href="#">
                                         <img class="switcher-flag" alt="flag" src="{{ asset('/kuteshop_v1/images/flags/flag_germany.png')}}">
                                     </a>
                                 </li>
                                 <li class="switcher-option">
                                     <a href="#">
                                         <img class="switcher-flag" alt="flag" src="{{ asset('/kuteshop_v1/images/flags/flag_english.png')}}">
                                     </a>
                                 </li>
                                 <li class="switcher-option switcher-active">
                                     <a href="#">
                                         <img class="switcher-flag" alt="flag" src="{{ asset('/kuteshop_v1/images/flags/flag_spain.png')}}">
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

                 <div class="custom-links">
                     <a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i> Buy This Template</a>
                 </div>

             </div>
         </div>
     </div>

 </header><!-- end HEADER -->
