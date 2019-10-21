<div class="navbar-fixed-top">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('front.index') }}">
                <img src="{{ asset('assets/images/brainchildsoft.png') }}" alt="" style="width: 190px; height: 40px; ">
            </a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

            <ul class="nav navbar-nav navbar-right">
                {{--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="visible-xs-inline-block position-right">Messages</span>
                        <span class="badge bg-warning-400">2</span>
                    </a>

                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Messages
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-compose"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body">
                            <li class="media">
                                <div class="media-left">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">5</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">James Alexander</span>
                                        <span class="media-annotation pull-right">04:58</span>
                                    </a>

                                    <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">4</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Margo Baker</span>
                                        <span class="media-annotation pull-right">12:16</span>
                                    </a>

                                    <span class="text-muted">That was something he was unable to do because...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Jeremy Victorino</span>
                                        <span class="media-annotation pull-right">22:48</span>
                                    </a>

                                    <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Beatrix Diaz</span>
                                        <span class="media-annotation pull-right">Tue</span>
                                    </a>

                                    <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Richard Vango</span>
                                        <span class="media-annotation pull-right">Mon</span>
                                    </a>

                                    <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                </div>
                            </li>
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
--}}
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="">
                        <span>{{ ucwords(auth()->guard('seller')->user()->full_name)  }}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ route('seller.account.setting.page') }}"><i class="icon-user-plus"></i> Profile Setting</a></li>
{{--                        <li><a href="#"><i class="icon-coins"></i> My balance</a></li>--}}
                        <li class="divider"></li>
                        <li><a href="{{ route('seller.shop.setting') }}"><i class="icon-store"></i> Shop settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('seller.logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->


    <!-- Second navbar -->
    <div class="navbar navbar-default" id="navbar-second">
        <div class="navbar-collapse collapse" id="navbar-second-toggle">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('seller.home') }}"><i class="icon-display4 position-left"></i> Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bag position-left"></i>Manage Product <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-200">
                        <li><a href="{{ route('seller.product.index') }}"><i class="icon-list-numbered"></i> Product List</a></li>
                        <li><a href="{{ route('seller.product.create') }}"><i class="icon-plus2"></i> New Product</a></li>
{{--                        <li><a href="{{ route('seller.product.create') }}"><i class="icon-drawer3"></i> Daft List</a></li>--}}
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cart-add position-left"></i>Manage Orders <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-200">
                        <li><a href="{{ route('seller.order.index') }}"><i class="icon-cart2 position-left"></i> Order List</a></li>
                        <li><a href="{{ route('seller.order.deliver') }}"><i class="icon-truck position-left"></i> Deliver Order</a></li>
                        <li><a href="{{ route('seller.order.ready_to_ship') }}"><i class="icon-bag position-left"></i>  Ready To Ship </a></li>
                        <li><a href="{{ route('seller.order.cancel_order') }}"><i class="icon-cart4 position-left"></i>  Cancel Order </a></li>
{{--                        <li><a href="{{ route('seller.order.latest') }}"><i class="icon-reply-all position-left"></i>  Latest Order </a></li>--}}
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class=" icon-cart-remove position-left"></i>Return Order <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu width-200">
                        <li><a href="{{ route('seller.home') }}"><i class="icon-reply position-left"></i> New Return</a></li>
                        <li><a href="{{ route('seller.home') }}"><i class="icon-reply-all position-left"></i>Return List</a></li>
                    </ul>
                </li>
                {{--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class=" icon-megaphone position-left"></i>Manage Campaign<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu width-200">
                        <li><a href="{{ route('seller.campaign.index') }}"><i class="icon-list-numbered position-left"></i> All Campaign List</a></li>
                        <li><a href="{{ route('seller.campaign.joined.list') }}"><i class="icon-googleplus5 position-left"></i>Joined Campaing List</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-ticket position-left"></i>Manage Voucher<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu width-200">
                        <li><a href="{{ route('seller.product.index') }}"><i class="icon-grid position-left"></i> Voucher List</a></li>
                        <li><a href="{{ route('seller.product.create') }}"><i class=" icon-plus-circle2 position-left"></i>Add Voucher</a></li>
                    </ul>
                </li>--}}
            </ul>
        </div>
    </div>
    <!-- /second navbar -->
</div>
