<div id="mobile-menu">
    <ul>
        <li>
            <div class="mm-search">
                <form id="search1" name="search">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                        </div>
                        <input type="text" class="form-control simple" placeholder="{{ __('header.search_here') }}" name="srch-term" id="srch-term">
                    </div>
                </form>
            </div>
        </li>
        <li><a href="{{ route('front.index') }}">{{ __('header.home') }}</a> </li>
        @if(!empty($categoryTree))
            @foreach($categoryTree as $category)
                <li><a href="{{ route('front.category.product', $category->category_slug) }}">{{ $category->category_name }}</a>
                    @if(!empty($category->children) && count($category->children) > 0)
                    <ul>
                        @foreach($category->children as $secCategory)
                        <li> <a href="{{ route('front.category.product', $secCategory->category_slug) }}" class="">{{ $secCategory->category_name }}</a>
                            @if(!empty($secCategory->children) && count($secCategory->children) > 0)
                            <ul>
                                @foreach($secCategory->children as $trdCategory)
                                <li>
                                    <a href="{{ route('front.category.product', $trdCategory->category_slug) }}" class="">{{ $trdCategory->category_name }}</a>
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
            @if(auth()->guest())

                <li><a title="{{ __('header.my_account') }}" href="{{ route('login') }}">{{ __('header.my_account') }}</a> </li>
                <li class="last"><a title="{{ __('header.login') }}" href="{{ route('login') }}">{{ __('header.login') }}</a> </li>
                <li class="last"><a title="{{ __('header.seller_login') }}" href="{{ route('seller.login') }}">{{ __('header.seller_login') }}</a> </li>

            @elseif(auth()->guard('admin')->check())

                <li><a title="{{ __('header.my_account') }}" href="{{ route('admin.home') }}">{{ __('header.my_account') }}</a> </li>
                <li class="last"><a title="{{ __('header.logout') }}" href="{{ route('admin.logout') }}">{{ __('header.logout') }}</a> </li>

            @elseif(auth()->guard('seller')->check())

                <li><a title="{{ __('header.my_account') }}" href="{{ route('seller.home') }}">{{ __('header.my_account') }}</a> </li>
                <li class="last"><a title="{{ __('header.logout') }}" href="{{ route('seller.logout') }}">{{ __('header.logout') }}</a> </li>

            @else

                <li><a title="{{ __('header.my_account') }}" href="{{ route('buyer.home') }}">{{ __('header.my_account') }}</a> </li>
                <li><a title="{{ __('header.checkout') }}" href="{{ route('buyer.checkout') }}">{{ __('header.checkout') }}</a> </li>
                <li class="last"><a title="{{ __('header.logout') }}" href="{{ route('buyer.logout') }}">{{ __('header.logout') }}</a> </li>

            @endif

        </ul>
    </div>
</div>
