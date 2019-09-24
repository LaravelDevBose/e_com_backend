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
                    @if(!empty($category->attachment))
                    <div class="category-view">
                        <img alt="{{ $category->category_name }}" src="{{ $category->attachment->image_path }}" style="width: 100%; height: auto; max-height: 350px;">
                    </div>
                    @endif

                    <!-- link categori -->
                    <ul class="category-links text-center text-capitalize">

                        <h5>{{ $category->category_name }}</h5>
                    </ul><!-- link categori -->

                    <!-- List Products -->
                    <div class="products  products-grid">
                        @if(!empty($products))
                        <ol class="product-items row">
                            @foreach($products as $product)
                            <product-grid :product="{{ $product }}"></product-grid>
                            @endforeach
                        </ol><!-- list product -->
                        @endif
                    </div> <!-- List Products -->

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
