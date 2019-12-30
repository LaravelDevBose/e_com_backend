
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
                    <strong class="logo-footer">
                        <a href=""><img src="{{ asset('kuteshop_v2/images/media/index2/logo-footer.png')}}" alt="logo"></a>
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
                <div class="col-md-2 col-lg-2 col-xs-6 col">
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
                <div class="col-md-2 col-lg-2 col-xs-6 col">
                    <div class="links">
                        <h3 class="title">My Account</h3>
                        <ul>
                            <li><a href="">My Order</a></li>
                            <li><a href="">My Wishlist</a></li>
                            <li><a href="">My Credit Slip</a></li>
                            <li><a href="">My Addresses</a></li>
                            <li><a href="">My Account</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-xs-6 col">
                    <div class="links">
                        <h3 class="title">Support</h3>
                        <ul>
                            <li><a href="">New User Guide</a></li>
                            <li><a href="">Help Center</a></li>
                            <li><a href="">Refund Policy</a></li>
                            <li><a href="">Report Spam</a></li>
                            <li><a href="">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-6 col">
                    <div class="block-social">
                        <div class="block-title">Let’s Socialize </div>
                        <div class="block-content">
                            <a href="" class="sh-facebook"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            <a href="" class="sh-pinterest"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                            <a href="" class="sh-twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a href="" class="sh-google"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a>
                        </div>
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
