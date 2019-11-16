<!-- Block  bestseller products-->
@if(!empty($categories))
<div class="block-sidebar block-sidebar-categorie">
    <div class="block-title">
        <strong>Categories</strong>
    </div>
    <div class="block-content">
        <ul class="items">
            @foreach($categories as $categoryData)
            <li class="parent">
                <a href="{{ route('front.category.product', $categoryData->category_slug) }}">{{ $categoryData->category_name }}</a>
                @if(!empty($categoryData->children) && count($categoryData->children) > 0)
                <span class="toggle-submenu"></span>
                <ul class="subcategory">
                    @foreach($categoryData->children as $secCategory)
                    <li >
                        <a href="{{ route('front.category.product', $secCategory->category_slug) }}">{{ $secCategory->category_name }}</a>
                        @if(!empty($secCategory->children) && count($secCategory->children) > 0)
                        <span class="toggle-submenu"></span>
                        <ul class="subcategory">
                            @foreach($secCategory->children as $trdCategory)
                                <li>
                                    <a href="{{ route('front.category.product', $trdCategory->category_slug) }}">{{ $trdCategory->category_name }}</a>
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
        </ul>
    </div>
</div>

@endif
<!-- Block  bestseller products-->
<hot-deal-products-block :hotProducts="{{ $hotProducts }}"></hot-deal-products-block>
<product-sidebar :categoryId="{{ $category->category_id }}"></product-sidebar>
<!-- block slide top -->
@if(!empty($tags))
<!-- Block  tags-->
<div class="block-sidebar block-sidebar-tags">
    <div class="block-title">
        <strong>product tags</strong>
    </div>
    <div class="block-content">
        <ul>
            @foreach($tags as $tag)
            <li><a href="" class="lv2">{{ $tag->tag_title }}</a></li>
            @endforeach
        </ul>
    </div>
</div><!-- Block  tags-->
@endif
