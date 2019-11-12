 <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
     <div class="block block-account">
         <div class="block-title">My Account</div>
         <div class="block-content">
             <ul>
                 <li >
                     <a href="{{ route('buyer.home') }}">Account Dashboard</a>
                 </li>
                 <li class="@yield('buyer.order.index')">
                     <a href="{{ route('buyer.order.index') }}">My Orders</a>
                 </li>
                 <li class="@yield('MyWishlist')">
                     <a href="{{ route('buyer.wish_list') }}">My Wishlist</a>
                 </li>
                 {{--<li class="@yield('ProductReviews')">
                     <a href="{{ route('buyer.reviews') }}">My Product Reviews</a>
                 </li>--}}
                 <li class="@yield('AddressBook')">
                     <a href="{{ route('buyer.address.book') }}">Address Book</a>
                 </li>
                 <li class="@yield('AccountInformation')">
                     <a href="{{ route('buyer.account.info') }}">Account Information</a>
                 </li>
             </ul>
         </div>
     </div>
     @if(auth()->user()->account_type === 3)
     <div class="block block-account">
         <div class="block-title">Seller Option</div>
         <div class="block-content">
             <ul>
                 <li>
                     <a href="{{ route('buyer.seller.home') }}">Seller Dashboard</a>
                 </li>
                 <li>
                     <a href="{{ route('buyer.seller.product.index') }}">Product List</a>
                 </li>
             </ul>
         </div>
     </div>
     @endif
 </aside>
