<div id="mobile-menu">
    <ul>
        <li>
            <div class="mm-search">
                <form id="search1" name="search">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                        </div>
                        <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
                    </div>
                </form>
            </div>
        </li>
        <li><a href="{{ route('front.index') }}">Home</a> </li>
        @if(!empty($categoryTree))
            @foreach($categoryTree as $category)
                <li><a href="{{ route('front.category.product', $category->category_id) }}">{{ $category->category_name }}</a>
                    @if(!empty($category->children) && count($category->children) > 0)
                    <ul>
                        @foreach($category->children as $secCategory)
                        <li> <a href="{{ route('front.category.product', $secCategory->category_id) }}" class="">{{ $secCategory->category_name }}</a>
                            @if(!empty($secCategory->children) && count($secCategory->children) > 0)
                            <ul>
                                @foreach($secCategory->children as $trdCategory)
                                <li>
                                    <a href="{{ route('front.category.product', $trdCategory->category_id) }}" class="">{{ $trdCategory->category_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
            @endforeach
        @endif

        @if(!empty($headerPageMenus))
            @foreach($headerPageMenus as $pageMenu)
                <li>
                    <a href="{{ route('front.pages', $pageMenu->page_slug) }}">{{ $pageMenu->menu_title }}</a>
                </li>
            @endforeach
        @endif
    </ul>
    <div class="top-links">
        <ul class="links">
            <li><a title="My Account" href="{{ route('login') }}">My Account</a> </li>
            <li><a title="Wishlist" href="{{ route('login') }}">Wishlist</a> </li>
            <li><a title="Checkout" href="{{ route('front.checkout') }}">Checkout</a> </li>
            <li class="last"><a title="Login" href="{{ route('login') }}">Login</a> </li>
            <li class="last"><a title="Login" href="{{ route('login') }}">Seller Login</a> </li>
        </ul>
    </div>
</div>
