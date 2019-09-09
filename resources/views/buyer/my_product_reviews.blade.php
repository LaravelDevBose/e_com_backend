@extends('layouts.frontend.master')

@section('Title','My Product Reviews')

@section('PageCss')

@endsection

@section('Content')
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 wow bounceInUp animated">
                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <h2>My Product Reviews</h2>
                        </div>
                        <div class="dashboard">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table class="data-table" id="my-orders-table">
                                        <col />
                                        <col />
                                        <col />
                                        <col width="1" />
                                        <col width="1" />
                                        <col width="1" />
                                        <thead>
                                            <tr class="first last">
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Reviews</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="first odd">
                                                <td>
                                                    <img src="{{asset('front/images/product-img.jpg')}}" class="img-thumbnail" alt="not found" style="height:50px; width:60px;" />
                                                </td>
                                                <td>T-shirt</td>
                                                <td style="color:#efca03;">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- right side -->
            @include('buyer.partials.right_side')
        </div>
    </div>
</div>
@endsection

@section('PageJs')

@endsection
