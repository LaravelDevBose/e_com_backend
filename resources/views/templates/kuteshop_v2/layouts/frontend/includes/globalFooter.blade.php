
@if(!empty($brands))
<div class="block-top-brand-opt14 block-brand-tabs">
    <div class="container">

        <div class="block-title">
            <span class="title">{{ trans_choice('footer.top_brand', count($brands)) }}</span>
        </div>

        <div class="block-content" >

            <ul class="nav-brand owl-carousel"
                data-nav="true"
                data-loop="true"
                data-dots="false"
                data-margin="25"
                data-responsive='{
                "0":{"items":3},
                "380":{"items":3},
                "480":{"items":4},
                "640":{"items":5},
                "992":{"items":7}
                            }'>
                @foreach($brands as $brand)
                    @if(!empty($brand->attachment->image_path))
                        <li>
                            <clazy-load src="{{ $brand->attachment->image_path }}">
                                <img title="{{ $brand->brand_name }}" src="{{ $brand->attachment->image_path }}" style="width:100%; height:auto;">
                                <div class="preloader" slot="placeholder">
                                    <img title="{{ $brand->brand_name }}" src="/images/placeholder.png" style="width:100%; height:auto;">
                                </div>
                            </clazy-load>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

    </div>
</div>
@endif

<footer class="site-footer footer-opt-1">
    <div class="container">
        <div class="footer-column">

            <div class="row">
                <div class="col-md-4 col-lg-4 col-xs-4 col">
                    <strong class="logo-footer">
                        <a href="{{ route('front.index') }}">
                            <img src="{{ asset('saliim.png') }}" alt="logo" style="height: 80px;">
                        </a>
                    </strong>

                    <table class="address">
                        <tr>
                            <td><b>Address:  </b></td>
                            <td>Bakaaro,  Mogadishu, Somalia</td>
                        </tr>
                        <tr>
                            <td><b>Phone: </b></td>
                            <td>00252617500005</td>
                        </tr>
                        <tr>
                            <td><b>Hours:</b></td>
                            <td>Open 24 hours</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-4 col">
                    @if(!empty($headerPageMenus))
                    <div class="links">
                        <h3 class="title">Company</h3>
                        <ul>
                            @foreach($headerPageMenus as $pageMenu)
                            <li>
                                <a href="{{ route('front.pages', $pageMenu->page_slug) }}" title="{{ $pageMenu->menu_title }}">{{ $pageMenu->menu_title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-md-4 col-lg-4 col-xs-4 col">
                    <div class="links">
                        <h3 class="title">Support</h3>
                        @if(auth()->guard('seller')->check())
                            <ul>
                                <li><a href="{{ route('seller.home') }}">@lang('header.dashboard')</a></li>
                                <li><a href="{{ route('seller.order.index') }}">{{ trans_choice('header.order',2) }}</a></li>
                                <li><a href="{{ route('seller.product.index') }}">{{ trans_choice('header.product', 2) }}</a></li>
{{--                                <li><a href="{{ route('seller.logout') }}">@lang('logout')</a></li>--}}
                            </ul>
                        @else
                            <ul>
                                <li><a href="{{ route('buyer.home') }}">@lang('header.dashboard')</a></li>
                                <li><a href="{{ route('buyer.wish_list') }}">@lang('wishlist')</a></li>
                                <li><a href="{{ route('buyer.order.index') }}">{{ trans_choice('header.order',2) }}</a></li>
{{--                                <li><a href="{{ route('buyer.logout') }}">@lang('logout')</a></li>--}}
                            </ul>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <div class="payment-methods">
            <div class="block-title">
                Accepted Payment Methods
            </div>
            <div class="block-content">
                <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-1.png')}}">
                <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-2.png')}}">
                <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-3.png')}}">
                <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-4.png')}}">
            </div>
        </div>
        @if(!empty($categoryTree))
        <div class="footer-links">
            @foreach($categoryTree as $category)
            <ul class="links">
                <li><strong class="title">{{ $category->category_name }}</strong></li>
                @if(!empty($category->children) && count($category->children) > 0)
                    @foreach($category->children as $secCategory)
                        <li><a href="{{ route('front.category.product', $secCategory->category_slug) }}">{{ $secCategory->category_name }}</a></li>
                        @if(!empty($secCategory->children))
                            @foreach($secCategory->children as $trdCategory)
                            <li><a href="{{ route('front.category.product', $trdCategory->category_slug) }}">{{ $trdCategory->category_name }}</a></li>
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </ul>
            @endforeach
        </div>
        @endif
        <div class="copyright">

            Copyright © 2020 Saliim. All Rights Reserved. Designed by Saliim

        </div>

    </div>

</footer>
