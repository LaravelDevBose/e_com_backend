<!-- Main sidebar -->
<div class="sidebar sidebar-main bg-teal-800">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#">
                        <img src="{{ asset('assets/images/placeholder.jpg') }}" class="img-circle img-responsive" alt="">
                    </a>
                    <h6>{{ ucwords(auth()->guard('seller')->user()->full_name)  }}</h6>
                    <span class="text-size-small">{{ auth()->guard('seller')->user()->role }}</span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    @if(auth()->id() !== 1)
                    <li><a href="{{ route('seller.account.setting.page') }}"><i class="icon-user-plus"></i> <span>Profile Setting</span></a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('seller.shop.setting') }}"><i class="icon-cog5"></i> <span>Shop settings</span></a></li>
                    @endif
                    <li class="divider"></li>
                    <li><a href="{{ route('seller.logout') }}"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible ">

            <div class="category-content no-padding ">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li ><a href="{{ route('seller.home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="icon-cart"></i> <span>Manage Product</span></a>
                        <ul>
                            <li><a href="{{ route('seller.product.index') }}"><i class="icon-list-numbered"></i>Manage Product</a></li>
                            <li><a href="{{ route('seller.product.create') }}"><i class="icon-plus2"></i> New Product</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-cart-remove"></i> <span>Manage Orders </span></a>
                        <ul>
                            <li><a href="{{ route('seller.order.index') }}"><i class="icon-cart2"></i> Order List</a></li>
                            <li><a href="{{ route('seller.order.deliver') }}"><i class="icon-truck"></i> Deliver Order</a></li>
                            <li><a href="{{ route('seller.order.ready_to_ship') }}"><i class="icon-bag"></i>  Ready To Ship </a></li>
                            <li><a href="{{ route('seller.order.cancel_order') }}"><i class="icon-cart4"></i>  Cancel Order </a></li>
                        </ul>
                    </li>
                </ul>
                <div style="min-height: 70px; width: 100%;"></div>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
