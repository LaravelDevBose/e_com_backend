<footer>
{{--    <div class="footer-add"> <a href="#"><img src="{{asset('crocus_v2/images/footer-banner.png')}}" alt="download"> </a> </div>--}}
    <div class="footer-inner">
        <div class="container">

            <div class="row">
                <div class="col-sm-8 col-xs-12 col-lg-9">
                    @if(!empty($headerPageMenus))
                    <div class="footer-column pull-left">
                        <h4>QUICK LINKS</h4>
                        <ul class="links">
                            @foreach($headerPageMenus as $pageMenu)
                                <li class=" @if($loop->first) first @elseif($loop->last) last @endif">
                                    <a href="{{ route('front.pages', $pageMenu->page_slug) }}" title="{{ $pageMenu->menu_title }}">{{ $pageMenu->menu_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="footer-column pull-left">
                        <h4>Style Advisor</h4>
                        <ul class="links">
                            <li class="first"><a href="#" title="Your Account">Your Account</a></li>
                            <li><a href="#" title="Information">Information</a></li>
                            <li><a href="#" title="Addresses">Addresses</a></li>
                            <li><a href="#" title="Addresses">Discount</a></li>
                            <li><a href="#" title="Orders History">Orders History</a></li>
                            <li class="last"><a href="#" title=" Additional Information"> Additional Information</a></li>
                        </ul>
                    </div>
                    <div class="footer-column pull-left">
                        <h4>Information</h4>
                        <ul class="links">
                            <li class="first"><a href="#" title="Site Map">Site Map</a></li>
                            <li><a href="#" title="Search Terms">Search Terms</a></li>
                            <li><a href="#" title="Advanced Search">Advanced Search</a></li>
                            <li><a href="#" title="History">About Us</a></li>
                            <li><a href="#" title="History">Contact Us</a></li>
                            <li><a href="#" title="Suppliers">Suppliers</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-3 col-sm-4">
                    <div class="footer-column-last">
                        <div class="newsletter-wrap">
                            <h4>Download the App</h4>
                            <div class="app-img"><img src="{{asset('crocus_v2/images/android-app.png')}}" alt="android"></div>
                            <div class="app-img"><img src="{{asset('crocus_v2/images/ios-app.png')}}" alt="android"></div>
                            <div class="app-img"><img src="{{asset('crocus_v2/images/windows-btn.png')}}" alt="android"></div>
                        </div>
                        <div class="payment-accept">
                            <div><img src="{{asset('crocus_v2/images/payment-1.png')}}" alt="payment1"> <img src="{{asset('crocus_v2/images/payment-2.png')}}" alt="payment2"> <img src="{{asset('crocus_v2/images/payment-3.png')}}" alt="payment3"> <img src="{{asset('crocus_v2/images/payment-4.png')}}" alt="payment4"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Logo -->

    <div class="brand-logo">
        <div class="container">
            <div class="slider-items-products">
                <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">
                        @if(!empty($brands))
                            @foreach($brands as $brand)
                                @if(!empty($brand->attachment->image_path))
                            <!-- Item -->
                                <div class="item">
                                    <a href="#"><img src="{{ $brand->attachment->image_path }}" alt="Image"> </a>
                                </div>
                                @endif
                            <!-- End Item -->
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <address>
                    @if(!empty($contactUs))
                        @if(!empty($contactUs->contact_address))
                            <span> <i class="fa fa-map-marker"></i> {!! $contactUs->contact_address !!}</span>
                        @endif

                        @if(!empty($contactUs->contact_email))
                            <span><i class="fa fa-mobile"></i> {{ $contactUs->contact_email }}</span>
                        @endif

                        @if(!empty($contactUs->contact_address))
                            <span><i class="fa fa-envelope"></i>{{ $contactUs->contact_mobile }}</span>
                        @endif

                    @endif
                    <span><i class="fa fa-handshake"></i> Powered By: <a href="http://brainchildsoft.com/" target="_blank">Brain Child Software</a></span>
                </address>
            </div>
        </div>
    </div>
</footer>
