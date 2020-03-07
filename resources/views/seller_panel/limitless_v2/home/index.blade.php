@extends('seller_panel.limitless_v2.seller')
@section('PageTitle','DashBoard')

@section('PageCss')

@endsection
@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
@endsection
@section('content')
    <!-- Content area -->
    <div class="content" >
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Latest posts -->
                <div class="panel panel-flat bounceInRight" >
                    <div class="panel-body">
                        <h1 class="text text-blue  text-center text-bold">
                            <span> Welcome to {{ (auth()->id() == 1)? 'Saliim' : '' }} Seller Panel
                            </span>
                        </h1>
                    </div>
                </div>
                <!-- /latest posts -->
            </div>
        </div>
        <!-- /dashboard content -->
    </div>
    <!-- /content area -->
@endsection
@section('PageJs')

@endsection

