 <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
     <div class="block block-account">
         <div class="block-title">{{ __('buyer.My Account') }}</div>
         <div class="block-content">
             <ul>
                 <li >
                     <a href="{{ route('buyer.home') }}">{{ __('buyer.dashboard') }}</a>
                 </li>
                 <li class="@yield('buyer.order.index')">
                     <a href="{{ route('buyer.order.index') }}">{{ __('buyer.my_orders') }}</a>
                 </li>
                 <li class="@yield('MyWishlist')">
                     <a href="{{ route('buyer.wish_list') }}">{{ __('buyer.wishlist') }}</a>
                 </li>
                 <li class="@yield('ProductReviews')">
                     <a href="{{ route('buyer.reviews.index') }}">{{ __('buyer.product_review') }}</a>
                 </li>
                 <li class="@yield('AddressBook')">
                     <a href="{{ route('buyer.address.book') }}">{{ __('buyer.address_book') }}</a>
                 </li>
                 <li class="@yield('AccountInformation')">
                     <a href="{{ route('buyer.account.info') }}">{{ __('buyer.account_info') }}</a>
                 </li>
             </ul>
         </div>
     </div>
     @if(auth()->user()->account_type === 3)
     <div class="block block-account">
         <div class="block-title">{{ __('buyer.Seller Option') }}</div>
         <div class="block-content">
             <ul>
                 <li>
                     <a href="{{ route('buyer.seller.home') }}">{{ __('buyer.seller_dashboard') }}</a>
                 </li>
                 <li>
                     <a href="{{ route('buyer.seller.product.index') }}">{{ __('buyer.product_list') }}</a>
                 </li>
                 <li>
                     <a href="{{ route('buyer.seller.product.create') }}">{{ __('buyer.add_product') }}</a>
                 </li>
             </ul>
         </div>
     </div>
     @endif
 </aside>
