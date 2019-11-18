   <!-- HEADER -->
   <header class="site-header header-opt-12 cate-show">

       <div class=" container">
           <div class="header-top">

               <ul class="nav-left">
                   <li><a href="">Login</a></li>
                   <li><a href="">Register </a></li>
                   <li><a href="">Wishlist</a></li>
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
                           <img class="switcher-flag" alt="flag" src="images/flags/flag_english.png">
                           <span>English</span>
                           <i aria-hidden="true" class="fa fa-angle-down"></i>
                       </a>
                       <ul class="dropdown-menu switcher-options ">
                           <li class="switcher-option">
                               <a href="#">
                                   <img class="switcher-flag" alt="flag" src="images/flags/flag_english.png">English
                               </a>
                           </li>
                           <li class="switcher-option">
                               <a href="#">
                                   <img class="switcher-flag" alt="flag" src="images/flags/flag_french.png">French
                               </a>
                           </li>
                           <li class="switcher-option">
                               <a href="#">
                                   <img class="switcher-flag" alt="flag" src="images/flags/flag_germany.png">Germany
                               </a>
                           </li>
                       </ul>
                   </li>
               </ul>

               <ul class="nav-right">
                   <li class="hotline"><span><i class="fa fa-phone"></i>+ 006 258 658</span></li>
                   <li class="top-social">
                       <span class="">
                           <a title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                           <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                           <a title="Skype" href="#"><i class="fa fa-linkedin"></i></a>
                           <a title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a>
                       </span>
                   </li>
               </ul>
           </div>
       </div>

       <!-- header-content -->
       <div class="header-content mid-header">
           <div class="container">

               <div class="clearfix">

                   <div class="nav-left">
                       <!-- logo -->
                       <strong class="logo">
                           <a href=""><img src="images/media/index12/logo.png" alt="logo"></a>
                       </strong><!-- logo -->
                   </div>


                   <div class="nav-mind">

                       <!-- menu -->
                       @include('templates.kuteshop_v1.layouts.frontend.includes.headerMenu')
                       <!-- menu -->

                   </div>

               </div>

           </div>
       </div><!-- header-content -->

       <div class=" header-nav ">
           <div class="container">
               <div class="box-header-nav">

                   <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat"><span>Categories</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                   <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span><i aria-hidden="true" class="fa fa-bars"></i></span>

                   <!-- categori -->
                   @include('templates.kuteshop_v1.layouts.frontend.includes.navigation')
                   <!-- categori -->

                   <!-- search -->
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
                                       <input type="text" class="form-control" placeholder="Search your products">
                                       <button class="btn btn-search" type="button"><span>search</span></button>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>

                   <!-- block mini cart -->
                   <div class="block-minicart dropdown">
                       <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                           <span class="cart-icon"></span>
                           <span class="counter qty">
                               <span class="cart-text">Cart: </span>
                               <span class="counter-number">2</span>
                               <span class="counter-label">2 <span>Item(s)</span></span>
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
                                                   <img class="product-image-photo" src="images/media/index1/minicart.jpg" alt="The Name Product">
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
                                                   <img class="product-image-photo" src="images/media/index1/minicart2.jpg" alt="The Name Product">
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
                   <!-- block mini cart -->

               </div>
           </div>
       </div>

   </header><!-- end HEADER -->
