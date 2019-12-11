<div class="navbar navbar-default navbar-fixed-top header-highlight">
    <div class="navbar-header">

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">

                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ auth()->guard('admin')->user()->avatar }}" style="width: 40px; max-height: 40px!important;" alt="{{ auth()->guard('admin')->user()->user_name }}">{{ ucwords(auth()->guard('admin')->user()->full_name)  }}
{{--                    <img src="" style="width: 40px; max-height: 40px!important;" alt="{{ auth()->guard('admin')->user()->user_name }}">{{ ucwords(auth()->guard('admin')->user()->full_name)  }}--}}
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('admin.account.setting.page') }}"><i class="icon-cog5"></i> Account settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('admin.account.index') }}"><i class="icon-cog5"></i> Admin Account </a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
