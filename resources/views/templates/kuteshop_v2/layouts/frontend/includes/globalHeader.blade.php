<header class="site-header header-opt-2 cate-show">

    <!-- header-top -->
    <div class="header-top">
        <div class="container">

            <!-- hotline -->
            <ul class=" nav-left" >
                <li ><span><i class="fa fa-phone" aria-hidden="true"></i>+ 00 123 456 789</span></li>
                <li ><span><i class="fa fa-envelope" aria-hidden="true"></i> Contact us today !</span></li>
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

                <li class="dropdown setting">
                    <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>My Account</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
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
                </li>
                <li><a href="" >Support</a></li>
                <li><a href="">Services </a></li>
            </ul><!-- heder links -->

        </div>
    </div> <!-- header-top -->

    <!-- header-content -->
    <div class="header-content">
        <div class="container">

            <div class="row">

                <div class="col-md-3 nav-left">
                    <!-- logo -->
                    <strong class="logo">
                        <a href=""><img src="{{ asset('kuteshop_v2/images/media/index2/logo.png') }}" alt="logo"></a>
                    </strong><!-- logo -->
                </div>



                <div class=" nav-right">

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
                                <div  class="minicart-content-wrapper" >
                                    <div class="subtitle">
                                        You have 6 item(s) in your cart
                                    </div>
                                    <div class="minicart-items-wrapper">
                                        <ol class="minicart-items">
                                            <li class="product-item">
                                                <a class="product-item-photo" href="#" title="The Name Product">
                                                    <img class="product-image-photo" src="{{ asset('kuteshop_v2/images/media/index1/minicart.jpg') }}" alt="The Name Product">
                                                </a>
                                                <div class="product-item-details">
                                                    <strong class="product-item-name">
                                                        <a href="#">Donec Ac Tempus</a>
                                                    </strong>
                                                    <div class="product-item-price">
                                                        <span class="price">61,19 €</span>
                                                    </div>
                                                    <div class="product-item-qty">
                                                        <span class="label">Qty: </span ><span class="number">1</span>
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
                                                    <img class="product-image-photo" src="{{ asset('kuteshop_v2/images/media/index1/minicart2.jpg') }}" alt="The Name Product">
                                                </a>
                                                <div class="product-item-details">
                                                    <strong class="product-item-name">
                                                        <a href="#">Donec Ac Tempus</a>
                                                    </strong>
                                                    <div class="product-item-price">
                                                        <span class="price">61,19 €</span>
                                                    </div>
                                                    <div class="product-item-qty">
                                                        <span class="label">Qty: </span ><span class="number">1</span>
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

                <div class=" nav-mind">

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
                                    <option>All Categories</option>
                                    <option>Fashion</option>
                                    <option>Tops Blouses</option>
                                    <option>Clothing</option>
                                    <option>Furniture</option>
                                    <option>Bathtime Goods</option>
                                    <option>Shower Curtains</option>
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
                <div class="block-nav-categori">

                    <div class="block-title">
                        <span>Categories</span>
                    </div>

                    <div class="block-content">
                        <div class="clearfix"><span data-action="close-cat" class="close-cate"><span>Categories</span></span></div>
                        <ul class="ui-categori">
                            <li class="parent">
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat1.png') }}" alt="nav-cat"></span>
                                    Electronics
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu" style="background-image: url({{ asset('kuteshop_v2/images/media/index1/bgmenu.jpg') }});">
                                    <ul class="categori-list clearfix">
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">Smartphone</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">TElevision</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">Camera</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="categori-list clearfix">
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">Smartphone</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">TElevision</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">Camera</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="parent">
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat2.png') }}" alt="nav-cat"></span>
                                    Sports & Outdoors
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu">
                                    <div class="categori-img">
                                        <a href=""><img src="{{ asset('kuteshop_v2/images/media/index1/categori-img1.jpg') }}" alt="categori-img"></a>
                                    </div>
                                    <ul class="categori-list">
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">Smartphone</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">TElevision</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">Camera</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                        <li class="col-sm-3">
                                            <strong class="title"><a href="">washing machine</a></strong>
                                            <ul>
                                                <li><a href="">Skirts    </a></li>
                                                <li><a href="">Jackets</a></li>
                                                <li><a href="">Jumpusuits</a></li>
                                                <li><a href="">Scarvest</a></li>
                                                <li><a href="">T-Shirts</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="parent">
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat3.png') }}" alt="nav-cat"></span>
                                    Smartphone & Tablets
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu">
                                    <strong class="subtitle"><span>special products</span></strong>
                                    <div class="owl-carousel"
                                         data-nav="true"
                                         data-dots="false"
                                         data-margin="30"
                                         data-autoplayTimeout="300"
                                         data-autoplay="true"
                                         data-loop="true"
                                         data-responsive='{
                                                "0":{"items":1},
                                                "380":{"items":1},
                                                "480":{"items":1},
                                                "600":{"items":1},
                                                "992":{"items":4}
                                                }'>

                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/product-menu1.jpg') }}"></a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Asus Ispiron 20</a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/product-menu2.jpg') }}"></a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Ispiron 20 </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/product-menu3.jpg') }}"></a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Samsung Ispiron 20 </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/product-menu4.jpg') }}"></a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Electronics Ispiron 20 </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item product-item-opt-1">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <a class="product-item-img" href=""><img alt="product name" src="{{ asset('kuteshop_v2/images/media/index1/product-menu4.jpg') }}"></a>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="">Samsung Ispiron 20 </a></strong>
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat4.png') }}" alt="nav-cat"></span>
                                    Health & Beauty
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat5.png') }}" alt="nav-cat"></span>
                                    Bags, Shoes & Accessories
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat6.png') }}" alt="nav-cat"></span>
                                    Toys & Hobbies
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat7.png') }}" alt="nav-cat"></span>
                                    Computers & Networking
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat8.png') }}" alt="nav-cat"></span>
                                    Laptops & Accessories
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat9.png') }}" alt="nav-cat"></span>
                                    Jewelry  & Watches
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat10.png') }}" alt="nav-cat"></span>
                                    Flashlights & Lamps
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat11.png') }}" alt="nav-cat"></span>
                                    Cameras & Photo
                                </a>
                            </li>
                            <li class="cat-link-orther">
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat10.png') }}" alt="nav-cat"></span>
                                    Sport & Outdoors
                                </a>
                            </li>
                            <li class="cat-link-orther">
                                <a href="">
                                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat9.png') }}" alt="nav-cat"></span>
                                    Watch & Jewellry
                                </a>
                            </li>


                        </ul>

                        <div class="view-all-categori">
                            <a  class="open-cate btn-view-all">All Categories</a>
                        </div>
                    </div>

                </div><!-- categori -->

                <!-- menu -->
                <div class="block-nav-menu">
                    <div class="clearfix"><span data-action="close-nav" class="close-nav"><span>close</span></span></div>
                    <ul class="ui-menu">
                        <li class="parent parent-megamenu active">
                            <a href="index.html">Home</a>
                            <span class="toggle-submenu"></span>
                            <div class="megamenu drop-menu demo-menu">
                                <ul>
                                    <li class="col-md-3">
                                        <strong class="title"><a href=""><span>Home </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="home1.html">Home page 1</a></li>
                                            <li><a href="home2.html">Home page 2</a></li>
                                            <li><a href="home3.html">Home page 3</a></li>
                                            <li><a href="home4.html">Home page 4</a></li>
                                            <li><a href="home5.html">Home page 5</a></li>
                                            <li><a href="home6.html">Home page 6</a></li>
                                            <li><a href="home7.html">Home page 7</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">
                                        <strong class="title"><a href=""><span>Home </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="home8.html">Home page 8</a></li>
                                            <li><a href="home9.html">Home page 9</a></li>
                                            <li><a href="home10.html">Home page 10</a></li>
                                            <li><a href="home11.html">Home page 11</a></li>
                                            <li><a href="home12.html">Home page 12</a></li>
                                            <li><a href="home13.html">Home page 13</a></li>
                                            <li><a href="home14.html">Home page 14</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">
                                        <strong class="title"><a href=""><span>Page </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="Login.html">Login</a></li>
                                            <li><a href="About.html">About</a></li>
                                            <li><a href="Contact.html">Contact</a></li>
                                            <li><a href="Blog.html">Blog</a></li>
                                            <li><a href="Blog_Post.html">Blog Post</a></li>
                                            <li><a href="Checkout.html">Checkout</a></li>
                                            <li><a href="Order.html">Order</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">
                                        <strong class="title"><a href=""><span>Page </span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="Category1.html">Category 1</a></li>
                                            <li><a href="Category2.html">Category 2</a></li>
                                            <li><a href="Product1.html">Product 1</a></li>
                                            <li><a href="Product2.html">Product 2</a></li>
                                            <li><a href="Product3.html">Product 3</a></li>
                                            <li><a href="WishList.html">WishList </a></li>
                                            <li><a href="Compare.html">Compare</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="">Sports</a></li>
                        <li class="parent parent-submenu">
                            <a href="Contact.html"> Fashion  </a>
                            <span class="toggle-submenu"></span>
                            <div class="submenu drop-menu">
                                <ul >
                                    <li><a href="">Shoes</a></li>
                                    <li><a href="">Clothing</a></li>
                                    <li><a href="">Accessories</a></li>
                                    <li><a href="">Sunglasses</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="parent parent-megamenu">
                            <a href="">Electronics  <span class="label-menu">New</span></a>
                            <span class="toggle-submenu"></span>
                            <div class="megamenu drop-menu">
                                <ul>
                                    <li class="col-md-3">
                                        <div class="img-categori">
                                            <a href=""><img alt="img" src="{{ asset('kuteshop_v2/images/media/index1/img-categori1.jpg') }}"></a>
                                        </div>
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
                                            <a href=""><img  alt="img"  src="{{ asset('kuteshop_v2/images/media/index1/img-categori2.jpg') }}"></a>
                                        </div>
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
                                            <a href=""><img alt="img"  src="{{ asset('kuteshop_v2/images/media/index1/img-categori3.jpg') }}"></a>
                                        </div>
                                        <strong class="title"><a href=""> <span>Kid's</span></a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="">Shoes</a></li>
                                            <li><a href="">Clothing</a></li>
                                            <li><a href="">Accessories</a></li>
                                            <li><a href="">Sunglasses</a></li>
                                        </ul>
                                    </li>
                                    <li class="col-md-3">

                                        <div class="img-categori">
                                            <a href=""><img alt="img"  src="{{ asset('kuteshop_v2/images/media/index1/img-categori4.jpg') }}"></a>
                                        </div>
                                        <strong class="title"><a href=""><span>Trending</span> </a></strong>
                                        <ul class="list-submenu">
                                            <li><a href="">Shoes</a></li>
                                            <li><a href="">Clothing</a></li>
                                            <li><a href="">Accessories</a></li>
                                            <li><a href="">Sunglasses</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="parent parent-megamenu">
                            <a href="Contact.html">Digital </a>
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
                        <li><a href="#"> Furniture </a></li>
                        <li><a href="#"> Jewelry  </a></li>
                        <li><a href="Blog.html">Blog</a></li>
                    </ul>

                </div><!-- menu -->

                <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                <div class="block-minicart dropdown ">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="cart-icon"></span>
                    </a>
                    <div class="dropdown-menu">
                        <form>
                            <div  class="minicart-content-wrapper" >
                                <div class="subtitle">
                                    You have 6 item(s) in your cart
                                </div>
                                <div class="minicart-items-wrapper">
                                    <ol class="minicart-items">
                                        <li class="product-item">
                                            <a class="product-item-photo" href="#" title="The Name Product">
                                                <img class="product-image-photo" src="{{ asset('kuteshop_v2/images/media/index1/minicart.jpg') }}" alt="The Name Product">
                                            </a>
                                            <div class="product-item-details">
                                                <strong class="product-item-name">
                                                    <a href="#">Donec Ac Tempus</a>
                                                </strong>
                                                <div class="product-item-price">
                                                    <span class="price">61,19 €</span>
                                                </div>
                                                <div class="product-item-qty">
                                                    <span class="label">Qty: </span ><span class="number">1</span>
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
                                                <img class="product-image-photo" src="{{ asset('kuteshop_v2/images/media/index1/minicart2.jpg') }}" alt="The Name Product">
                                            </a>
                                            <div class="product-item-details">
                                                <strong class="product-item-name">
                                                    <a href="#">Donec Ac Tempus</a>
                                                </strong>
                                                <div class="product-item-price">
                                                    <span class="price">61,19 €</span>
                                                </div>
                                                <div class="product-item-qty">
                                                    <span class="label">Qty: </span ><span class="number">1</span>
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
