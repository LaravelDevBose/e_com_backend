<nav>
    <div class="container">
        <div class="mm-toggle-wrap">
            <div class="mm-toggle"><i class="fa fa-bars"></i><span class="mm-label">{{ __('header.menu') }}</span> </div>
        </div>
        <div class="nav-inner">
            <!-- BEGIN NAV -->
            <ul id="nav" class="hidden-xs">
                <li class="level0" >
                    <a href="{{ route('front.index') }}" class="level-top"><span>{{ __('header.home') }}</span></a>
                </li>
                @if(!empty($categoryTree))
                    @foreach($categoryTree as $category)
                        <li class="mega-menu">
                            <a class="level-top" href="{{ route('front.category.product', $category->category_slug) }}"><span>{{ $category->category_name }}</span></a>
                            @if(!empty($category->children) && count($category->children) > 0)
                            <div class="level0-wrapper dropdown-6col">
                                <div class="container">
                                    <div class="level0-wrapper2">
                                        <div class="nav-block nav-block-center">
                                            @if(!empty($category->attachment))
                                            <div class="col-2">
                                                <div class="menu_image1">
                                                    <a title="" href="#">
                                                        <img alt="{{ $category->category_name }}" src="{{ $category->attachment->image_path }}">
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                            <!--mega menu-->
                                            <div class="col-1">
                                                <ul class="level0">
                                                    @foreach($category->children as $secCategory)
                                                        <li class="level3 nav-6-1 parent item">
                                                            <a href="{{ route('front.category.product', $secCategory->category_slug) }}"><span>{{ $secCategory->category_name }}</span></a>
                                                            @if(!empty($secCategory->children))
                                                                @foreach($secCategory->children as $trdCategory)
                                                                    <ul class="level1">
                                                                        <li class="level2 nav-6-1-1">
                                                                            <a href="{{ route('front.category.product', $trdCategory->category_slug) }}"><span>{{ $trdCategory->category_name }}</span></a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <!--level0-->
                                            </div>
                                        </div>
                                        <!--nav-block nav-block-center-->

                                    </div>
                                    <!--level0-wrapper2-->
                                </div>
                                <!--container-->
                            </div>
                            @endif
                        </li>
                    @endforeach
                @endif

                @if(!empty($headerPageMenus))
                    @foreach($headerPageMenus as $pageMenu)
                    <li class="mega-menu">
                        <a class="level-top" href="{{ route('front.pages', $pageMenu->page_slug) }}"><span>{{ $pageMenu->menu_title }}</span></a>
                    </li>
                    @endforeach
                @endif
            </ul>
            <!--nav-->
        </div>
    </div>
</nav>
