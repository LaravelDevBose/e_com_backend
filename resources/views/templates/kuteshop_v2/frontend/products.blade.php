@extends('templates.kuteshop_v2.layouts.frontend.master')

@section('Title', 'Products')

@section('PageCss')

@endsection

@section('Content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->
            <ol class="breadcrumb no-hide">
                <li><a href="#">Home    </a></li>
                <li><a href="#">Electronics    </a></li>
                <li class="active">Machine Pro</li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">
                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3  col-main">
                    <!-- images categori -->
                    <div class="category-view">
                        <img src="/kuteshop_v2/images/media/category-images1.jpg" alt="category-images">
                    </div><!-- images categori -->

                    <!-- link categori -->
                    <ul class="category-links">
                        <li class="current-cate"><a href="">All Products</a></li>
                        <li><a href="">Tops</a></li>
                        <li><a href="">Dresses</a></li>
                        <li><a href="">Bags & Shoes</a></li>
                        <li><a href="">Scaves</a></li>
                        <li><a href="">Pants</a></li>
                        <li><a href="">Blouses</a></li>
                    </ul><!-- link categori -->

                    <!-- Toolbar -->
                    <div class=" toolbar-products toolbar-top">

                        <div class="btn-filter-products">
                            <span>Filter</span>
                        </div>

                        <h1 class="cate-title">Electronics</h1>

                        <div class="modes">
                            <strong  class="label">View as:</strong>
                            <strong  class="modes-mode active mode-grid" title="Grid">
                                <span>grid</span>
                            </strong>
                            <a  href="Category2.html" title="List" class="modes-mode mode-list">
                                <span>list</span>
                            </a>
                        </div><!-- View as -->

                        <div class="toolbar-option">

                            <div class="toolbar-sorter ">
                                <label    class="label">Short by:</label>
                                <select class="sorter-options form-control" >
                                    <option selected="selected" value="position">Position</option>
                                    <option value="name">Name</option>
                                    <option value="price">Price</option>
                                </select>
                                <a href="" class="sorter-action"></a>
                            </div><!-- Short by -->

                            <div class="toolbar-limiter">
                                <label   class="label">
                                    <span>Show:</span>
                                </label>

                                <select class="limiter-options form-control" >
                                    <option selected="selected" value="9">Show 18</option>
                                    <option value="15">Show 15</option>
                                    <option value="30">Show 30</option>
                                </select>

                            </div><!-- Show per page -->

                        </div>

                        <ul class="pagination">
                            <li class="action">
                                <a href="#">
                                    <span><i aria-hidden="true" class="fa fa-angle-left"></i></span>
                                </a>
                            </li>

                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li class="action">
                                <a href="#">
                                    <span><i aria-hidden="true" class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                        </ul>

                    </div><!-- Toolbar -->

                    <!-- List Products -->
                    <div class="products  products-grid">
                        <ol class="product-items row">
                            <li class="col-sm-4 product-item ">
                                <div class="product-item-opt-1">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/product1.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                            <span class="product-item-label label-price">30% <span>off</span></span>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Nano Washing Machine</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="80%">
                                                                <span style="width:80%">
                                                                    <span><span>80</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-sm-4 product-item ">
                                <div class="product-item-opt-1">
                                    <div class="product-item-info">
                                        <div class="product-item-photo">
                                            <a href="" class="product-item-img"><img src="/kuteshop_v2/images/media/product2.jpg" alt="product name"></a>
                                            <div class="product-item-actions">
                                                <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                                                <a href="" class="btn btn-compare"><span>compare</span></a>
                                                <a href="" class="btn btn-quickview"><span>quickview</span></a>
                                            </div>
                                            <button class="btn btn-cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                        <div class="product-item-detail">
                                            <strong class="product-item-name"><a href="">Electronic Cleaning Machine</a></strong>
                                            <div class="clearfix">
                                                <div class="product-item-price">
                                                    <span class="price">$45.00</span>
                                                    <span class="old-price">$52.00</span>
                                                </div>
                                                <div class="product-reviews-summary">
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="80%">
                                                                <span style="width:80%">
                                                                    <span><span>80</span>% of <span>100</span></span>
                                                                </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol><!-- list product -->
                    </div> <!-- List Products -->

                    <!-- Toolbar -->
                    <div class=" toolbar-products toolbar-bottom">

                        <div class="modes">
                            <strong  class="label">View as:</strong>
                            <strong  class="modes-mode active mode-grid" title="Grid">
                                <span>grid</span>
                            </strong>
                            <a  href="Category2.html" title="List" class="modes-mode mode-list">
                                <span>list</span>
                            </a>
                        </div><!-- View as -->

                        <div class="toolbar-option">

                            <div class="toolbar-sorter ">
                                <label    class="label">Short by:</label>
                                <select class="sorter-options form-control" >
                                    <option selected="selected" value="position">Product name</option>
                                    <option value="name">Name</option>
                                    <option value="price">Price</option>
                                </select>
                                <a href="" class="sorter-action"></a>
                            </div><!-- Short by -->

                            <div class="toolbar-limiter">
                                <label   class="label">
                                    <span>Show:</span>
                                </label>

                                <select class="limiter-options form-control" >
                                    <option selected="selected" value="9"> Show 18</option>
                                    <option value="15">Show 15</option>
                                    <option value="30">Show 30</option>
                                </select>

                            </div><!-- Show per page -->

                        </div>

                        <ul class="pagination">


                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">5</a>
                            </li>
                            <li class="action action-next">
                                <a href="#">
                                    Next <span><i aria-hidden="true" class="fa fa-angle-double-right"></i></span>
                                </a>
                            </li>
                        </ul>

                    </div><!-- Toolbar -->

                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9  col-sidebar">
                    @include('templates.kuteshop_v2.frontend.section.products_sidebar')
                </div><!-- Sidebar -->
            </div>
        </div>


    </main>
@endsection

@section('PageJs')
    <script>

        (function($) {

            "use strict";

            $(document).ready(function() {

                /*  [ Filter by price ]

                - - - - - - - - - - - - - - - - - - - - */

                $('#slider-range').slider({

                    range: true,

                    min: 0,

                    max: 500,

                    values: [0, 300],

                    slide: function (event, ui) {

                        $('#amount-left').text(ui.values[0] );
                        $('#amount-right').text(ui.values[1] );

                    }

                });

                $('#amount-left').text($('#slider-range').slider('values', 0));

                $('#amount-right').text($('#slider-range').slider('values', 1));
            });

        })(jQuery);

    </script>
@endsection
