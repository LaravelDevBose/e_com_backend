<div class="navbar navbar-default navbar-fixed-top header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" style="padding: 0px; width: 100%; background-color: #fff;" href="http://brainchildsoft.com/" target="_blank"><img src="{{ asset('assets/images/brainchildsoft.png') }}" alt="" style="width: 190px; height: 40px; "></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <p class="navbar-text"><a href="<?php //if(Auth::user()->type == 'D'){echo route('licence');}else{echo '#';}?>" style="text-decoration: none;"><span class="label bg-success">Online</span></a></p>
        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">

                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ auth()->guard('admin')->user()->avatar }}" style="width: 40px; max-height: 40px!important;" alt="{{ auth()->guard('admin')->user()->user_name }}">{{ ucwords(auth()->guard('admin')->user()->full_name)  }}
{{--                    <img src="" style="width: 40px; max-height: 40px!important;" alt="{{ auth()->guard('admin')->user()->user_name }}">{{ ucwords(auth()->guard('admin')->user()->full_name)  }}--}}
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
