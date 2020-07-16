@extends('seller_panel.limitless_v1.seller')
@section('PageTitle','Product List')

@section('PageCss')
    <style>
        .table > thead > tr > th>.sort{
            float: right!important;
        }
        .table{
            margin-top: 1rem;
            margin-bottom: 1rem;
            padding: 1rem!important;
        }
        .table > thead> tr > th:first-child{
            width: 50px;
        }
    </style>
@endsection

@section('ThemeJs')
    <script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switch.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>
@endsection

@section('content')
    <div class="content">
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Product List</h5>
                <div class="heading-elements">
                    <a href="{{ route('seller.product.create') }}" class="btn btn-sm btn-primary">Add Product</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table datatable-basic table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th style="width: 25%">Product Name</th>
                        <th>Product Sku</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Brand</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($products))
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <img src="{{ $product->thumbImage->image_path }}" alt="{{ $product->product_title }}" style="max-height: 50px;">
                                </td>
                                <td>
                                    <span>{{ $product->product_name }}</span>
                                </td>
                                <td>
                                    <span>{{ $product->product_sku }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $product->category->category_name }}</span>
                                </td>
                                <td class="text-center">
                                    @if(!empty($product->brand))
                                        <span>{{ $product->brand->brand_name }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($product->product_type == 1)
                                        <span>{{ $product->product_qty }}</span>
                                    @else
                                        <span>{{ $product->variations->sum('quantity') }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?php

                                        $statusArray =['class' => 'bg-danger','title' => 'Delete'];
                                        switch ($product->product_status){
                                            case  1:
                                                $statusArray =['class' => 'bg-success','title' => 'Active'];
                                                break;
                                            case  2:
                                                $statusArray =['class' => 'bg-info','title' => 'In-Active'];
                                                break;
                                            case  3:
                                                $statusArray =['class' => 'bg-warning','title' => 'Pending'];
                                                break;
                                            case  4:
                                                $statusArray =['class' => 'bg-primary','title' => 'On Review'];
                                                break;
                                            case  5:
                                                $statusArray =['class' => 'btn-warning','title' => 'Out Of Stock'];
                                                break;
                                            default:
                                                $statusArray =['class' => 'bg-warning','title' => 'Undefined'];
                                                break;
                                        }
                                        ?>
                                        <span  class="label  dropdown-toggle {{ $statusArray['class']}}" data-toggle="dropdown" aria-expanded="false">
                                        {{ $statusArray['title'] }}
                                    </span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <seller-product-action :row="{{ json_encode($product) }}"></seller-product-action>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
@endsection
@section('PageJs')

@endsection
