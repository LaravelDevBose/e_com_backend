 <!-- block-brand -->
 @if(!empty($brands))
 <div class="block-brand-op12">
     <div class="container">
         <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="30" data-loop="true" data-responsive='{
                            "0":{"items":3},
                            "480":{"items":4},
                            "600":{"items":5},
                            "992":{"items":6},
                            "1200":{"items":7}
                        }'>
             @foreach($brands as $brand)
             @if(!empty($brand->attachment->image_path))
             <div class="item">
                 <a href=""><img src="{{ $brand->attachment->image_path }}" alt="{{ $brand->brand_name }}" title="{{ $brand->brand_name }}">
                 </a>
             </div>

             @endif
             @endforeach

         </div>
     </div>
 </div>
 @endif
 <!-- block-brand -->

 <!-- FOOTER -->
 <footer class="site-footer footer-opt-12">
     <div class="container ">
         <div class="footer-column">
             <div class="column-left">
                 <div class="row">

                     <div class="col-md-4  col-sm-4">
                         <div class="links">
                             <h3 class="title">Kuteshop</h3>
                             <ul>
                                 <li><a href="#">About us</a></li>
                                 <li><a href="#">Customer Service</a></li>
                                 <li><a href="#">New Collection</a></li>
                                 <li><a href="#">Manufacturers</a></li>
                                 <li><a href="#">Privacy policy</a></li>
                                 <li><a href="#">Terms & condition</a></li>
                                 <li><a href="#">Blog</a></li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-md-4  col-sm-4">
                         @if(!empty($headerPageMenus))
                         <div class="links">
                             <h3 class="title">Company</h3>
                             <ul>
                                 @foreach($headerPageMenus as $pageMenu)
                                 <li>
                                     <a href="{{ route('front.pages', $pageMenu->page_slug) }}" title="{{ $pageMenu->menu_title }}">{{ $pageMenu->menu_title }}</a>
                                 </li>
                                 @endforeach
                             </ul>
                         </div>
                         @endif
                     </div>
                     <div class="col-md-4  col-sm-4">
                         <div class="links">
                             <h3 class="title">customer service</h3>
                             <ul>
                                 <li><a href="#">Advanced Search</a></li>
                                 <li><a href="#">Orders and Returns</a></li>
                                 <li><a href="#">Contact Us</a></li>
                                 <li><a href="#">RSS</a></li>
                                 <li><a href="#">Help & FAQs</a></li>
                                 <li><a href="#">Consultant</a></li>
                                 <li><a href="#">Store Locations</a></li>
                             </ul>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="column-right">
                 <div class="block-social">
                     <div class="block-title">Let’s Socialize </div>
                     <div class="block-content">
                         <a href="" class="sh-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                         <a href="" class="sh-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                         <a href="" class="sh-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                         <a href="" class="sh-google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                         <a href="" class="sh-pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                         <a href="" class="sh-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>

                     </div>
                 </div>
                 <div class="block-newletter">
                     <div class="block-title">SIGN UP FOR NEWSLETTER</div>
                     <div class="block-content">
                         <form>
                             <div class="input-group">
                                 <input type="text" class="form-control" placeholder="Your email address...">
                                 <span class="input-group-btn">
                                     <button class="btn btn-subcribe" type="button"><span>Subcribe</span></button>
                                 </span>
                             </div>
                         </form>
                     </div>

                 </div>

             </div>
         </div>
         <div class="payment-methods">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment1.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment2.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment3.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment4.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment5.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment6.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment7.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment8.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment9.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment10.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment11.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment12.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment13.jpg')}}">
             <img alt="payment" src="{{ asset('/kuteshop_v1/images/media/index12/payment14.jpg')}}">
         </div>
         @if(!empty($categoryTree))
         <div class="footer-bottom">
             @foreach($categoryTree as $category)
             <ul class="links">
                 <li><strong class="title">{{ $category->category_name }}</strong></li>
                 @if(!empty($category->children) && count($category->children) > 0)
                 @foreach($category->children as $secCategory)
                 <li><a href="{{ route('front.category.product', $secCategory->category_slug) }}">{{ $secCategory->category_name }}</a></li>
                 @if(!empty($secCategory->children))
                 @foreach($secCategory->children as $trdCategory)
                 <li><a href="{{ route('front.category.product', $trdCategory->category_slug) }}">{{ $trdCategory->category_name }}</a></li>
                 @endforeach
                 @endif
                 @endforeach
                 @endif
             </ul>
             @endforeach
         </div>
         @endif
         <div class="copyright">

             Copyright © 2015 KuteShop. All Rights Reserved. Designed by KuteThemes.com

         </div>

     </div>

     </div>
 </footer><!-- end FOOTER -->
