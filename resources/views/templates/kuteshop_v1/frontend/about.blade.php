@extends('templates.kuteshop_v1.layouts.frontend.master')

@section('Title', 'About Us')

@section('PageCss')

@endsection

@section('Content')
<main class="site-main">

    <div class="columns container">
        <!-- Block  Breadcrumb-->

        <ol class="breadcrumb no-hide">
            <li><a href="#">Home </a></li>
            <li class="active">About Us</li>
        </ol><!-- Block  Breadcrumb-->

        <div class="row">

            <!-- Main Content -->
            <div class="col-md-9 col-md-push-3   col-main">
                <h2 class="page-heading">
                    <span class="page-heading-title2">About Us</span>
                </h2>

                <div class="content-text clearfix">

                    <img width="310" alt="" class="alignleft" src="/kuteshop_v2/images/media/detail/about-us.jpg">

                    <p>Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel.</p>

                    <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros.</p>

                    <p>Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, <a href="#">malesuada at</a>, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. </p>

                    <p>Nam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae,dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. Vestibulum iaculis lacinia est. Proin dictum elementum velit. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl. </p>
                    <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros.</p>

                    <p>Integer rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, <a href="#">malesuada at</a>, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue. </p>

                </div>

            </div><!-- Main Content -->

            <!-- Sidebar -->
            <div class="col-md-3 col-md-pull-9   col-sidebar">

                <!-- Block  bestseller products-->
                <div class="block-sidebar block-sidebar-categorie">
                    <div class="block-title">
                        <strong>PRODUCT TYPES</strong>
                    </div>
                    <div class="block-content">
                        <ul class="items">
                            <li class="parent">
                                <a href="">Dress</a>
                                <span class="toggle-submenu"></span>
                                <ul class="subcategory">
                                    <li>
                                        <a href="">subcategory 1</a>

                                    </li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">Bags</a>
                            </li>
                            <li class="parent">
                                <a href="">Cost &amp; Jackets</a>
                                <span class="toggle-submenu"></span>
                                <ul class="subcategory">
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="">Beauty</a>
                                <span class="toggle-submenu"></span>
                                <ul class="subcategory">
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="">Jewellery</a>
                                <span class="toggle-submenu"></span>
                                <ul class="subcategory">
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="">Nightwear</a>
                                <span class="toggle-submenu"></span>
                                <ul class="subcategory">
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                </ul>
                            </li>
                            <li class="parent">
                                <a href="">Jumpers &amp; Cardigans</a>
                                <span class="toggle-submenu"></span>
                                <ul class="subcategory">
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                    <li><a href="">subcategory 1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!-- Block  bestseller products-->
                <!-- block slide top -->
                <div class="block-sidebar block-banner-sidebar">
                    <div class="owl-carousel" data-nav="false" data-dots="true" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="true" data-loop="true">
                        <div class="item item1">
                            <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
                        </div>
                        <div class="item item2">
                            <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
                        </div>
                        <div class="item item3">
                            <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
                        </div>
                    </div>
                </div><!-- block slide top -->
            </div><!-- Sidebar -->
        </div>
    </div>
</main>
@endsection

@section('PageJs')

@endsection
