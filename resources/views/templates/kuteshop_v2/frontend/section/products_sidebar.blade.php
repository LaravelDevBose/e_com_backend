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

<product-sidebar :categoryId="{{ $category->category_id }}"></product-sidebar>
<!-- block slide top -->
<div class="block-sidebar block-banner-sidebar">
    <div class="owl-carousel"
         data-nav="false"
         data-dots="true"
         data-margin="0"
         data-items='1'
         data-autoplayTimeout="700"
         data-autoplay="true"
         data-loop="true">
        <div class="item item1" >
            <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
        </div>
        <div class="item item2" >
            <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
        </div>
        <div class="item item3" >
            <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
        </div>
    </div>
</div><!-- block slide top -->
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
