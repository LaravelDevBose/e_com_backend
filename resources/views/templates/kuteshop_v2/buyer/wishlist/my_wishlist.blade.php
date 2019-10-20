@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title','My Wishlist')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li><a href="#">My account    </a></li>
                <li class="active">My wishlist</li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">

                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3  col-main">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">My wishlist</span>
                    </h2>

                    <div class="box-border box-wishlist">
                        <h2>New wishlist</h2>
                        <label >Name</label>
                        <input type="text" class="form-control input">
                        <button class="button">Save</button>
                    </div>

                    <table class="table table-bordered table-wishlist">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Viewed</th>
                            <th>Created</th>
                            <th>Derect link</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>My wishlist</td>
                            <td>7</td>
                            <td>0</td>
                            <td>2015-06-18</td>
                            <td>View</td>
                            <td class="text-center"><a href="#"><i class="fa fa-close"></i></a></td>
                        </tr>
                        </tbody>
                    </table>

                    <ul class="row list-wishlist">
                        <li class="col-sm-3">
                            <div class="product-img">
                                <a href="#"><img alt="Product" src="/kuteshop_v2/images/media/detail/wishlist1.jpg"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#">Adipiscing aliquet sed in lacus, Liqui-gels 24</a>
                            </h5>
                            <div class="qty">
                                <label>Quantity</label>
                                <input type="text" class="form-control input input-sm">
                            </div>
                            <div class="priority">
                                <label>Priority</label>
                                <select class="form-control input iput-sm">
                                    <option>Medium</option>
                                </select>
                            </div>
                            <div class="button-action">
                                <button class="button button-sm">Save</button>
                                <a href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="product-img">
                                <a href="#"><img alt="Product" src="/kuteshop_v2/images/media/detail/wishlist2.jpg"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#">Adipiscing aliquet sed in lacus, Liqui-gels 24</a>
                            </h5>
                            <div class="qty">
                                <label>Quantity</label>
                                <input type="text" class="form-control input input-sm">
                            </div>
                            <div class="priority">
                                <label>Priority</label>
                                <select class="form-control input iput-sm">
                                    <option>Medium</option>
                                </select>
                            </div>
                            <div class="button-action">
                                <button class="button button-sm">Save</button>
                                <a href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="product-img">
                                <a href="#"><img alt="Product" src="/kuteshop_v2/images/media/detail/wishlist3.jpg"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#">Adipiscing aliquet sed in lacus, Liqui-gels 24</a>
                            </h5>
                            <div class="qty">
                                <label>Quantity</label>
                                <input type="text" class="form-control input input-sm">
                            </div>
                            <div class="priority">
                                <label>Priority</label>
                                <select class="form-control input iput-sm">
                                    <option>Medium</option>
                                </select>
                            </div>
                            <div class="button-action">
                                <button class="button button-sm">Save</button>
                                <a href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="product-img">
                                <a href="#"><img alt="Product" src="/kuteshop_v2/images/media/detail/wishlist4.png"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#">Adipiscing aliquet sed in lacus, Liqui-gels 24</a>
                            </h5>
                            <div class="qty">
                                <label>Quantity</label>
                                <input type="text" class="form-control input input-sm">
                            </div>
                            <div class="priority">
                                <label>Priority</label>
                                <select class="form-control input iput-sm">
                                    <option>Medium</option>
                                </select>
                            </div>
                            <button class="button button-sm">Save</button>
                        </li>
                        <li class="col-sm-3">
                            <div class="product-img">
                                <a href="#"><img alt="Product" src="/kuteshop_v2/images/media/detail/wishlist5.jpg"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#">Adipiscing aliquet sed in lacus, Liqui-gels 24</a>
                            </h5>
                            <div class="qty">
                                <label>Quantity</label>
                                <input type="text" class="form-control input input-sm">
                            </div>
                            <div class="priority">
                                <label>Priority</label>
                                <select class="form-control input iput-sm">
                                    <option>Medium</option>
                                </select>
                            </div>
                            <div class="button-action">
                                <button class="button button-sm">Save</button>
                                <a href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="product-img">
                                <a href="#"><img alt="Product" src="/kuteshop_v2/images/media/detail/wishlist6.jpg"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#">Adipiscing aliquet sed in lacus, Liqui-gels 24</a>
                            </h5>
                            <div class="qty">
                                <label>Quantity</label>
                                <input type="text" class="form-control input input-sm">
                            </div>
                            <div class="priority">
                                <label>Priority</label>
                                <select class="form-control input iput-sm">
                                    <option>Medium</option>
                                </select>
                            </div>
                            <div class="button-action">
                                <button class="button button-sm">Save</button>
                                <a href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="product-img">
                                <a href="#"><img alt="Product" src="/kuteshop_v2/images/media/detail/wishlist7.jpg"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#">Adipiscing aliquet sed in lacus, Liqui-gels 24</a>
                            </h5>
                            <div class="qty">
                                <label>Quantity</label>
                                <input type="text" class="form-control input input-sm">
                            </div>
                            <div class="priority">
                                <label>Priority</label>
                                <select class="form-control input iput-sm">
                                    <option>Medium</option>
                                </select>
                            </div>
                            <div class="button-action">
                                <button class="button button-sm">Save</button>
                                <a href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </li>
                        <li class="col-sm-3">
                            <div class="product-img">
                                <a href="#"><img alt="Product" src="/kuteshop_v2/images/media/detail/wishlist8.jpg"></a>
                            </div>
                            <h5 class="product-name">
                                <a href="#">Adipiscing aliquet sed in lacus, Liqui-gels 24</a>
                            </h5>
                            <div class="qty">
                                <label>Quantity</label>
                                <input type="text" class="form-control input input-sm">
                            </div>
                            <div class="priority">
                                <label>Priority</label>
                                <select class="form-control input iput-sm">
                                    <option>Medium</option>
                                </select>
                            </div>
                            <div class="button-action">
                                <button class="button button-sm">Save</button>
                                <a href="#"><i class="fa fa-close"></i></a>
                            </div>
                        </li>
                    </ul>

                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9  col-sidebar">

                    <!-- Block  bestseller products-->
                    <div class="block-sidebar block-sidebar-products">
                        <div class="block-title">
                            <strong>BEST SALES</strong>
                        </div>
                        <div class="block-content">
                            <div class="owl-carousel"
                                 data-nav="false"
                                 data-dots="true"
                                 data-margin="0"
                                 data-autoplayTimeout="700"
                                 data-autoplay="true"
                                 data-loop="true"
                                 data-responsive='{
                                "0":{"items":1},
                                "420":{"items":1},
                                "480":{"items":2},
                                "600":{"items":2},
                                "992":{"items":1}
                                }'>
                                <div class="item">
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href=""><img alt="product name" src="/kuteshop_v2/images/media/detail/best1.jpg"></a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Man’s Within Plus Size Flared</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div title="70%" class="rating-result">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href=""><img alt="product name" src="/kuteshop_v2/images/media/detail/best2.jpg"></a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Woman Within Plus Size Flared</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div title="70%" class="rating-result">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href=""><img alt="product name" src="/kuteshop_v2/images/media/detail/best3.jpg"></a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Plus Size Rock Star Skirt</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div title="70%" class="rating-result">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href=""><img alt="product name" src="/kuteshop_v2/images/media/detail/best1.jpg"></a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Man’s Within Plus Size Flared</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div title="70%" class="rating-result">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href=""><img alt="product name" src="/kuteshop_v2/images/media/detail/best2.jpg"></a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Woman Within Plus Size Flared</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div title="70%" class="rating-result">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item product-item-opt-1">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href=""><img alt="product name" src="/kuteshop_v2/images/media/detail/best3.jpg"></a>
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name"><a href="">Plus Size Rock Star Skirt</a></strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        <span class="price">$45.00</span>
                                                    </div>
                                                    <div class="product-reviews-summary">
                                                        <div class="rating-summary">
                                                            <div title="70%" class="rating-result">
                                                                    <span style="width:70%">
                                                                        <span><span>70</span>% of <span>100</span></span>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Block  bestseller products-->

                    <!-- block slide top -->
                    <div class="block-sidebar block-banner-sidebar">
                        <div class="owl-carousel"
                             data-nav="false"
                             data-dots="true"
                             data-margin="0"
                             data-items='1'
                             data-autoplayTimeout="700"
                             data-autoplay="true"
                             data-loop="true">
                            <div class="item item1" >
                                <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
                            </div>
                            <div class="item item2" >
                                <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
                            </div>
                            <div class="item item3" >
                                <img src="/kuteshop_v2/images/media/banner-sidebar1.jpg" alt="images">
                            </div>
                        </div>
                    </div><!-- block slide top -->

                    <!-- Block  bestseller products-->
                    <div class="block-sidebar block-sidebar-products">
                        <div class="block-title">
                            <strong>SPECIAL PRODUCTS</strong>
                        </div>
                        <div class="block-content">
                            <div class="product-item product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="product-item-photo">
                                        <a class="product-item-img" href=""><img alt="product name" src="/kuteshop_v2/images/media/floor5-1.jpg"></a>
                                    </div>
                                    <div class="product-item-detail">
                                        <strong class="product-item-name"><a href="">Security Camera Size Flared</a></strong>
                                        <div class="clearfix">
                                            <div class="product-item-price">
                                                <span class="price">$45.00</span>
                                            </div>
                                            <div class="product-reviews-summary">
                                                <div class="rating-summary">
                                                    <div title="70%" class="rating-result">
                                                            <span style="width:70%">
                                                                <span><span>70</span>% of <span>100</span></span>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="" class="btn all-products">All products <i aria-hidden="true" class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div><!-- Block  bestseller products-->

                    <!-- Block  tags-->
                    <div class="block-sidebar block-sidebar-tags">
                        <div class="block-title">
                            <strong>product tags</strong>
                        </div>
                        <div class="block-content">
                            <ul>
                                <li><a href="" class="lv2">actual</a></li>
                                <li><a href="" class="lv1">adorable</a></li>
                                <li><a href="" class="lv3">amaze</a></li>
                                <li><a href="" class="lv5">change</a></li>
                                <li><a href="" class="lv2">consider</a></li>
                                <li><a href="" class="lv1">delivery</a></li>
                                <li><a href="" class="lv1">Top</a></li>
                                <li><a href="" class="lv4">flexib</a></li>
                                <li><a href="" class="lv1">phenomenon </a></li>
                            </ul>
                        </div>
                    </div><!-- Block  tags-->

                    <!-- block slide top -->
                    <div class="block-sidebar block-sidebar-testimonials">
                        <div class="block-title">
                            <strong>Testimonials</strong>
                        </div>
                        <div class="block-content">
                            <div class="owl-carousel"
                                 data-nav="false"
                                 data-dots="true"
                                 data-margin="0"
                                 data-items='1'
                                 data-autoplayTimeout="700"
                                 data-autoplay="true"
                                 data-loop="true">
                                <div class="item " >
                                    <strong class="name">Roverto & Maria</strong>
                                    <div class="avata">
                                        <img src="/kuteshop_v2/images/media/avata.jpg" alt="avata">
                                    </div>
                                    <div class="des">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </div>
                                <div class="item " >
                                    <strong class="name">Roverto & Maria</strong>
                                    <div class="avata">
                                        <img src="/kuteshop_v2/images/media/avata.jpg" alt="avata">
                                    </div>
                                    <div class="des">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </div>
                                <div class="item " >
                                    <strong class="name">Roverto & Maria</strong>
                                    <div class="avata">
                                        <img src="/kuteshop_v2/images/media/avata.jpg" alt="avata">
                                    </div>
                                    <div class="des">
                                        "Your product needs to improve more. To suit the needs and update your image up"
                                    </div>
                                </div>
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
