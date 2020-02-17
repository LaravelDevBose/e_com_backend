<div class="navbar-fixed-top">

    <!-- Main navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-header">

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="">
                        <span>{{ ucwords(auth()->guard('seller')->user()->full_name)  }}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        @if(auth()->id() !== 1)
                        <li><a href="{{ route('seller.account.setting.page') }}"><i class="icon-user-plus"></i> Profile Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('seller.shop.setting') }}"><i class="icon-store"></i> Shop settings</a></li>
                        <li class="divider"></li>
                        @endif
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
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!-- /second navbar -->
</div>
