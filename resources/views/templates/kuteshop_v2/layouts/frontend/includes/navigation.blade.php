<!-- categori -->
<div class="block-nav-categori">

    <div class="block-title">
        <span>Categories</span>
    </div>
    @if(!empty($categoryTree))
    <div class="block-content">
        <div class="clearfix"><span data-action="close-cat" class="close-cate"><span>Categories</span></span></div>
        <ul class="ui-categori">
            @foreach($categoryTree as $category)
            <li class="{{ (!empty($category->children) && count($category->children) > 0)?'parent':'' }}">
                <a href="{{ route('front.category.product', $category->category_slug) }}">
                    <span class="icon"><img src="{{ asset('kuteshop_v2/images/icon/index3/nav-cat1.png')}}" alt="nav-cat"></span>
                    {{ $category->category_name }}
                </a>
                @if(!empty($category->children) && count($category->children) > 0)
                    <span class="toggle-submenu"></span>
                    <div class="submenu" @if(!empty($category->attachment)) style="background-image: url({{ $category->attachment->image_path }});" @endif >
                        <ul class="categori-list clearfix">
                            @foreach($category->children as $secCategory)
                            <li class="col-sm-3">
                                <strong class="title"><a href="{{ route('front.category.product', $secCategory->category_slug) }}">{{ $secCategory->category_name }}</a></strong>
                                @if(!empty($secCategory->children))
                                    <ul>
                                        @foreach($secCategory->children as $trdCategory)
                                            <li><a href="{{ route('front.category.product', $trdCategory->category_slug) }}">{{ $trdCategory->category_name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </li>
            @endforeach
        </ul>

        <div class="view-all-categori">
            <a  class="open-cate btn-view-all">All Categories</a>
        </div>
    </div>
    @endif
</div>
<!-- categori -->
