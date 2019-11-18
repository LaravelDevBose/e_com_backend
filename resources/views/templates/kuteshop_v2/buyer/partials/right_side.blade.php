<div class="block-sidebar block-sidebar-categorie">
    <div class="block-title">
        <strong>{{ __('buyer.menu') }}</strong>
    </div>
    <div class="block-content">
        <ul class="items">
            <li> <a href="{{ route('buyer.home') }}">{{ __('buyer.dashboard') }}</a> </li>
            <li> <a href="{{ route('buyer.order.index') }}">{{ __('buyer.my_orders') }}</a> </li>
            <li> <a href="{{ route('buyer.wish_list') }}">{{ __('buyer.wishlist') }}</a> </li>
{{--            <li> <a href="{{ route('buyer.reviews') }}">Product Reviews</a> </li>--}}
            <li> <a href="{{ route('buyer.address.book') }}">{{ __('buyer.address_book') }}</a> </li>
            <li> <a href="{{ route('buyer.account.info') }}">{{ __('buyer.account_info') }}</a> </li>
        </ul>
    </div>
</div>
<hot-deal-products-block :hotProducts="{{ $hotProducts }}"></hot-deal-products-block>
