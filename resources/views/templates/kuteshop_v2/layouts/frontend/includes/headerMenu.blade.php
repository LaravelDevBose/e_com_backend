<div class="block-nav-menu">
    <div class="clearfix"><span data-action="close-nav" class="close-nav"><span>close</span></span></div>
    <ul class="ui-menu">
        <li class="active"><a href="{{ route('front.index') }}" > @lang('home') </a></li>
        <?php $headerCategories = $categoryTree->where('is_show', 1);?>
        @if(!empty($headerCategories))
            @foreach($headerCategories as $category)
            <li class="{{ (!empty($category->children) && count($category->children) > 0)?'parent parent-megamenu':'' }}">
                <a href="{{ route('front.category.product', $category->category_slug) }}">{{ $category->category_name }}</a>
                @if(!empty($category->children) && count($category->children) > 0)
                <span class="toggle-submenu"></span>
                <div class="megamenu drop-menu demo-menu">
                    @foreach($category->children as $secCategory)
                        @if($loop->first || $loop->iteration % 4 == 0 )
                            <ul class="row clearfix">
                        @endif
                            <li class="col-md-3">
                                <strong class="title"><a href="{{ route('front.category.product', $secCategory->category_slug) }}">{{ $secCategory->category_name }}</a></strong>
                                @if(!empty($secCategory->children))
                                <ul class="list-submenu">
                                    @foreach($secCategory->children as $trdCategory)
                                        <li><a href="{{ route('front.category.product', $trdCategory->category_slug) }}">{{ $trdCategory->category_name }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                        @if($loop->last || $loop->iteration % 4 == 0 )
                            </ul>
                        @endif
                    @endforeach
                </div>
                @endif
            </li>
            @endforeach
        @endif
    </ul>
</div>
