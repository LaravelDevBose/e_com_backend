@extends('layouts.app')
@section('PageTitle','Seller List')

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
        table>tbody>tr>td:nth-child(2){
            padding: 5px!important;
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
                <h5 class="panel-title">Shop List</h5>
            </div>

            <div class="table-responsive">
                <table class="table datatable-basic table-bordered table-striped table-hover table-sm">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Shop Logo</th>
                        <th>Shop Name</th>
                        <th>Seller Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Contact No</th>
                        <th class="text-center">Total Product</th>
                        <th class="text-center">Total Sell</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($sellers))
                        @foreach($sellers as $seller)
                            <tr>
                                <td class="text-center"> {{ $loop->iteration }}</td>
                                <td class="text-center">
                                    @if(!empty($seller->shop->shopLogo))
                                        <img src="{{ $seller->shop->shopLogo->image_path }}" alt="{{ $seller->shop->shop_name }}" style="max-height: 50px;">
                                    @endif

                                </td>
                                <td>
                                    <span>{{ $seller->shop->shop_name }}</span>
                                </td>
                                <td>
                                    <span>{{ $seller->seller_name }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $seller->user->email }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $seller->seller_phone }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $seller->products->count() }}</span>
                                </td>
                                <td class="text-center">
                                    <span>{{ $seller->orderItems->count() }}</span>
                                </td>
                                <td class="text-center">
                                    <shop-status-column
                                        :id="{{ json_encode($seller->seller_id) }}"
                                        :status="{{ json_encode($seller->seller_status)}}"
                                        :label="{{ json_encode($seller->status_label) }}"
                                    ></shop-status-column>
                                </td>
                                <td class="text-center">
                                    <shop-action></shop-action>
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
