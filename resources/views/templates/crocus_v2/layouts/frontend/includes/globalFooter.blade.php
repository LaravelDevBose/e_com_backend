<footer>
{{--    <div class="footer-add"> <a href="#"><img src="{{asset('crocus_v2/images/footer-banner.png')}}" alt="download"> </a> </div>--}}
    <div class="footer-inner">
        <div class="container">

            <div class="row">
                <div class="col-sm-8 col-xs-12 col-lg-9">
                    <div class="footer-column pull-left">
                        <h4>{{ __('footer.About Us') }}</h4>
                        <ul class="links" style="color: #fff;">
                            <li class="first">
                                {!! (!empty($contactInfos['about_us']))? $contactInfos['about_us'] : '' !!}
                            </li>
                            <li>
                                <a>{{ __('footer.Address') }}: </a>
                                {!!  (!empty($contactInfos['contact_address']))? $contactInfos['contact_address'] : ''  !!}
                            </li>
                            <li>
                                <a><b>{{ __('footer.Phone') }}: </b></a>
                                {{ (!empty($contactInfos['contact_phone']))? $contactInfos['contact_phone'] : '' }}
                            </li>
                            <li>
                                <a href="#"><b>{{ __('footer.Hours') }}:</b></a>
                                {{ __('footer.Open 24 hours') }}
                            </li>
                        </ul>
                    </div>
                    <div class="footer-column pull-left">
                        <h4>{{ __('footer.Terms and Conditions') }}</h4>
                        @if(!empty($tcPageMenus))
                        <ul class="links">
                            @foreach($tcPageMenus as $tcPageMenu)
                                <li class=" @if($loop->first) first @elseif($loop->last) last @endif">
                                    <a href="{{ route('front.pages', $tcPageMenu->page_slug) }}" title="{{ $tcPageMenu->menu_title }}">{{ $tcPageMenu->menu_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="footer-column pull-left">
                        <h4>{{ __('footer.Privacy') }}</h4>
                        @if(!empty($ppPageMenus))
                        <ul class="links">
                            @foreach($ppPageMenus as $ppPageMenu)
                                <li class=" @if($loop->first) first @elseif($loop->last) last @endif">
                                    <a href="{{ route('front.pages', $ppPageMenu->page_slug) }}" title="{{ $ppPageMenu->menu_title }}">{{ $ppPageMenu->menu_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                        @if(!empty($csPageMenus))
                            <ul class="links">
                                @foreach($csPageMenus as $csPageMenu)
                                    <li class=" @if($loop->first) first @elseif($loop->last) last @endif">
                                        <a href="{{ route('front.pages', $csPageMenu->page_slug) }}" title="{{ $csPageMenu->menu_title }}">{{ $csPageMenu->menu_title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-lg-3 col-sm-4">
                    <div class="footer-column-last">
                        <div class="newsletter-wrap">
                            <h4>{{ __('footer.Download the App') }}</h4>
                            <div class="app-img"><img src="{{asset('crocus_v2/images/android-app.png')}}" alt="android"></div>
                            <div class="app-img"><img src="{{asset('crocus_v2/images/ios-app.png')}}" alt="android"></div>
{{--                            <div class="app-img"><img src="{{asset('crocus_v2/images/windows-btn.png')}}" alt="android"></div>--}}
                        </div>
                        <div class="payment-accept">
                            <div>
                                <img src="{{asset('crocus_v2/images/payment/payment-1.png')}}" alt="payment1">
                                <img src="{{asset('crocus_v2/images/payment/payment-2.png')}}" alt="payment2">
                                <img src="{{asset('crocus_v2/images/payment/payment-3.png')}}" alt="payment3">
                                <img src="{{asset('crocus_v2/images/payment/payment-4.png')}}" alt="payment4">
                            </div>
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
