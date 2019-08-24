<!-- Main sidebar -->
<div class="sidebar sidebar-main ">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#">
                        <img src="{{ auth()->guard('admin')->user()->avatar }}" class="img-circle img-responsive" alt="">
                    </a>
                    <h6>{{ ucwords(auth()->guard('admin')->user()->full_name)  }}</h6>
                    <span class="text-size-small">{{ auth()->guard('admin')->user()->role }}</span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    <li><a href="#"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
                    <li><a href="#"><i class="icon-coins"></i> <span>My balance</span></a></li>
                    <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
                    <li><a href="#"><i class="icon-switch2"></i> <span>Logout</span></a></li>
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
                    <li ><a href="{{ route('admin.home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="icon-cart"></i> <span>Product</span></a>
                        <ul>
                            <li><a href="{{ route('admin.product.index') }}"><i class="icon-list-numbered"></i>Manage Product</a></li>
                            <li><a href="{{ route('admin.product.create') }}"><i class="icon-plus2"></i> Add Product</a></li>
                        </ul>
                    </li>
                    <li ><a href="{{ route('admin.category.create') }}"><i class="icon-list"></i> <span>Category</span></a></li>
                    <li ><a href="{{ route('admin.brand.create') }}"><i class="icon-list"></i> <span>Brand</span></a></li>
                    <li ><a href="{{ route('admin.color.create') }}"><i class="icon-brush"></i> <span>Color</span></a></li>
                    <li ><a href="{{ route('admin.tag.create') }}"><i class="icon-price-tag2"></i> <span>Tag</span></a></li>
                    <li ><a href="{{ route('admin.size_group.create') }}"><i class="icon-rulers"></i> <span>Product Size</span></a></li>
                    <li ><a href="{{ route('admin.delivery_cost.create') }}"><i class="icon-truck"></i> <span>Delivery Cost</span></a></li>
                    <li ><a href="{{ route('admin.skinType.create') }}"><i class="icon-woman"></i> <span>SkinType</span></a></li>
                    <li>
                        <a href="#"><i class="icon-megaphone"></i> <span>Campaign</span></a>
                        <ul>
                            <li><a href="{{ route('admin.campaign.create') }}"><i class="icon-plus2"></i> Create Campaign</a></li>
                            <li><a href="{{ route('admin.campaign.index') }}"><i class="icon-list-numbered"></i> Campaign List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-ticket"></i> <span>Voucher</span></a>
                        <ul>
                            <li><a href="{{ route('admin.voucher.create') }}">Create Voucher</a></li>
                            <li><a href="{{ route('admin.voucher.index') }}">Voucher List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-cart"></i> <span>CMS</span></a>
                        <ul>
                            <li><a href="{{ route('admin.cms.sliders.index') }}"><i class="icon-list-numbered"></i>Slider</a></li>
                            <li><a href="{{ route('admin.product.create') }}"><i class="icon-plus2"></i> Add Product</a></li>
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
