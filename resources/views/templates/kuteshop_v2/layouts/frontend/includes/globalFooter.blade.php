
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
                <div class="col-md-3 col-lg-3 col-xs-6 col">
                    <div class="block-newletter">
                        <div class="block-title">About Us</div>
                        {!! (!empty($contactInfos['about_us']))? $contactInfos['about_us'] : '' !!}
                    </div>
                    <table class="address">
                        <tr>
                            <td><b>Address:  </b></td>
                            <td>{!!  (!empty($contactInfos['contact_address']))? $contactInfos['contact_address'] : ''  !!}</td>
                        </tr>
                        <tr>
                            <td><b>Phone: </b></td>
                            <td>{{ (!empty($contactInfos['contact_phone']))? $contactInfos['contact_phone'] : '' }}</td>
                        </tr>
                        <tr>
                            <td><b>Hours:</b></td>
                            <td>Open 24 hours</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-2 col-lg-2 col-xs-6 col">
                    @if(!empty($tcPageMenus))
                    <div class="links">
                        <h3 class="title">Terms and Conditions</h3>
                        <ul>
                            @foreach($tcPageMenus as $tcPageMenu)
                            <li>
                                <a href="{{ route('front.pages', $tcPageMenu->page_slug) }}" title="{{ $tcPageMenu->menu_title }}">{{ $tcPageMenu->menu_title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-md-2 col-lg-2 col-xs-6 col">
                    @if(!empty($ppPageMenus))
                        <div class="links">
                            <h3 class="title">Privacy</h3>
                            <ul>
                                @foreach($ppPageMenus as $ppPageMenu)
                                    <li>
                                        <a href="{{ route('front.pages', $ppPageMenu->page_slug) }}" title="{{ $ppPageMenu->menu_title }}">{{ $ppPageMenu->menu_title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-2 col-lg-2 col-xs-6 col">
                    @if(!empty($csPageMenus))
                        <div class="links">
                            <h3 class="title">Customer Services</h3>
                            <ul>
                                @foreach($csPageMenus as $csPageMenu)
                                    <li>
                                        <a href="{{ route('front.pages', $csPageMenu->page_slug) }}" title="{{ $csPageMenu->menu_title }}">{{ $csPageMenu->menu_title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-3 col-lg-3 col-xs-6 col">
                    <news-letter-section></news-letter-section>
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
                <img alt="payment" src="{{ asset('kuteshop_v2/images/payment/payment-5.png')}}" style="width: 115px; height: 46px;">
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
