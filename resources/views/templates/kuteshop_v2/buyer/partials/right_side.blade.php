<div class="block-sidebar block-sidebar-categorie">
    <div class="block-title">
        <strong>Menu</strong>
    </div>
    <div class="block-content">
        <ul class="items">
            <li> <a href="{{ route('buyer.home') }}">Dashboard</a> </li>
            <li> <a href="{{ route('buyer.order.index') }}">My Orders</a> </li>
            <li> <a href="{{ route('buyer.wish_list') }}">Wishlist</a> </li>
{{--            <li> <a href="{{ route('buyer.reviews') }}">Product Reviews</a> </li>--}}
            <li> <a href="{{ route('buyer.address.book') }}">Address Book</a> </li>
            <li> <a href="{{ route('buyer.account.info') }}">Account Information</a> </li>
        </ul>
    </div>
</div>
<hot-deal-products-block :hotProducts="{{ $hotProducts }}"></hot-deal-products-block>
