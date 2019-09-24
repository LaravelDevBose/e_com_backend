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


<!-- block filter products -->
<div id="layered-filter-block" class="block-sidebar block-filter no-hide">
    <div class="close-filter-products"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="block-content">
        <!-- filter price -->
        <div class="filter-options-item filter-options-price">
            <div class="filter-options-title">Price</div>
            <div class="filter-options-content">
                <div class="slider-range">

                    <div id="slider-range" ></div>

                    <div class="action">
                        <span class="price">
                            <span>Range:</span>
                            $<span id="amount-left"></span>
                            -
                            $<span id="amount-right"></span>
                        </span>
                    </div>
                </div>
                <ol class="items">
                    <li class="item ">
                        <label>
                            <input type="checkbox"><span>$20 - $50 <span class="count">(20)</span>  </span>
                        </label>
                    </li>
                    <li class="item ">
                        <label>
                            <input type="checkbox"><span>$50 - $100 <span class="count">(20)</span> </span>
                        </label>
                    </li>
                    <li class="item ">
                        <label>
                            <input type="checkbox"><span>$100 - $250 <span class="count">(20)</span> </span>
                        </label>
                    </li>

                </ol>
            </div>
        </div><!-- filter price -->

        <!-- filter brad-->
        @if(!empty($brands))
        <div class="filter-options-item filter-options-brand">
            <div class="filter-options-title">BRAND</div>
            <div class="filter-options-content">
                <ol class="items">
                    @foreach($brands as $brand)
                    <li class="item ">
                        <label>
                            <input type="checkbox"><span>{{ $brand->brand_name }} </span>
                        </label>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div><!-- Filter Item -->
        @endif

        @if(!empty($colors))
        <!-- filter color-->
        <div class="filter-options-item filter-options-color">
            <div class="filter-options-title">COLOR</div>
            <div class="filter-options-content">
                <ol class="items">
                    @foreach($colors as $color)
                    <li class="item">
                        <label>
                            <input type="checkbox">
                            <span>
                                <span class="img" style="background-color: {{ $color->color_code }}; border: 1px solid #ccc;"></span>
                                <span class="count">{{ $color->color_name }}</span>
                            </span>

                        </label>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div><!-- Filter Item -->
        @endif

        @if(!empty($sizes))
        <!-- Filter Item  size-->
        <div class="filter-options-item filter-options-size">
            <div class="filter-options-title">SIZE</div>
            <div class="filter-options-content">
                <ol class="items">
                    @foreach($sizes as $size)
                    <li class="item ">
                        <label>
                            <input type="checkbox"><span>{{ $size->size_name }}</span>
                        </label>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div><!-- Filter Item  size-->
        @endif
    </div>
</div><!-- Filter -->

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
