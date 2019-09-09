 <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
     <div class="block block-account">
         <div class="block-title">My Account</div>
         <div class="block-content">
             <ul>
                 <li :class="nothing">
                     <a href="{{ route('buyer.home') }}">Account Dashboard</a>
                 </li>
                 <li class="@yield('AccountInformation')">
                     <a href="{{ route('buyer.account.info') }}">Account Information</a>
                 </li>
                 <li class="@yield('AddressBook')">
                     <a href="{{ route('buyer.address.book') }}">Address Book</a>
                 </li>
                 <li class="@yield('MyOrders')">
                     <a href="{{ route('buyer.myOrders') }}">My Orders</a>
                 </li>
                 <li class="@yield('ProductReviews')">
                     <a href="{{ route('buyer.reviews') }}">My Product Reviews</a>
                 </li>
                 <li class="@yield('MyWishlist')">
                     <a href="{{ route('buyer.wish_list') }}">My Wishlist</a>
                 </li>
             </ul>
         </div>
     </div>
     <div class="block block-compare">
         <div class="block-title">
             <span>Compare Products (2)</span>
         </div>
         <div class="block-content">
             <ol id="compare-items">
                 <li class="item odd">
                     <input type="hidden" value="2173" class="compare-item-id" />
                     <a class="btn-remove1" title="Remove This Item" href="#"></a>
                     <a href="#" class="product-name">Sofa with Box-Edge Polyester Wrapped Cushions</a>
                 </li>
                 <li class="item last even">
                     <input type="hidden" value="2174" class="compare-item-id" />
                     <a class="btn-remove1" title="Remove This Item" href="#"></a>
                     <a href="#" class="product-name">Sofa with Box-Edge Down-Blend Wrapped Cushions</a>
                 </li>
             </ol>
             <div class="ajax-checkout">
                 <button type="submit" title="Submit" class="button button-compare">
                     <span>Compare</span>
                 </button>
                 <button type="submit" title="Submit" class="button button-clear">
                     <span>Clear</span>
                 </button>
             </div>
         </div>
     </div>
 </aside>
