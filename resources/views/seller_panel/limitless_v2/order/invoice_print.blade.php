<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>invoice No {{ $order->order_no }}</title>
    @include('order.print_asset')
    <style>
        .table>tbody>tr>td {
            padding: 5px !important;
        }
        @media print {
            .table>tbody>tr>td {
                padding: 5px !important;
                font-size: 12px;
            }
            .table>thead>tr>th {
                padding: 10px 5px  !important;
                font-size: 13px;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
<div class="content" >
    <div class="panel">

        <div class="panel-body no-padding-bottom">
            <div class="row" style="border-bottom: 2px solid #ddd; margin-bottom: 15px;">
                <div class="col-sm-10 col-md-6 content-group" style="float:left; width: 10%">
                    <img src="/saliim.png" alt="logo" style="max-width:100px; max-height: 80px;">
                </div>
                <div class="col-sm-10 col-md-6 content-group" style="float:left; width: 80%">
                    <ul class="list-condensed list-unstyled">
                        <li style="margin: 0;"><h5 class="text-uppercase text-semibold" style="margin: 0;">Saliim</h5></li>
                        <li style="margin: 0;">Address: Bakaaro,  Mogadishu, Somalia</li>
                        <li style="margin: 0;">Phone: 00252617500005</li>
                        <li style="margin: 0;">Email: info@saliim.com</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                @if(!empty($order->shipping))
                <div class="col-sm-4 col-md-4 col-lg-4" style="float:left; width: 33%">
                    <div class="content-group">
                        <span class="text-muted">Shipping To:</span>
                        <ul class="list-condensed list-unstyled">
                            <li style="margin: 0;"><h5 style="margin: 0; font-size: 14px;"> {{ $order->shipping->full_name}} </h5></li>
                            <li style="margin: 0;"><span class="text-semibold">{{ $order->shipping->phone_no}} </span></li>
                            <li style="margin: 0;"> {{ $order->shipping->address}} , {{ $order->shipping->city }} </li>
                            <li style="margin: 0;"> {{ $order->shipping->state}}
                                @if(!empty($order->shipping->postal_code))
                                <span class="text-semibold">-  {{ $order->shipping->postal_code }} </span>
                                @endif
                                {{ $order->shipping->country }}
                            </li>
                        </ul>
                    </div>
                </div>
                @endif
                @if(!empty($order->payment))
                <div class="col-sm-4 col-md-4 col-lg-4" style="float:left; width: 33%">
                    <div class=" content-group">
                        <span class="text-muted">Payment Details:</span>
                        <ul class="list-condensed list-unstyled">
                            <li style="margin: 0;"><h5 style="margin: 0; font-size: 14px;">Total: <span class="text-semibold">$  {{ number_format($orderItem->total_price, 2)}} </span></h5></li>
                            <li style="margin: 0;">Paid By: <span class="text-semibold"> {{ $order->payment->paid_by }} </span></li>
                        </ul>
                    </div>
                </div>
                @endif
                <div class="col-sm-4 col-md-4 col-lg-4" style="float:left; width: 33%">
                    <div class="invoice-details content-group">
                        <h5 class="text-uppercase text-semibold" style="margin: 0; font-size: 14px;">Order No # {{ $order->order_no }} </h5>
                        <p>Order Date: <span class="text-semibold">{{ $order->order_date }} </span></p>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($orderItem))
        <div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width:70px">Image</th>
                    <th style="width: 43%; ">Product Description</th>
                    <th style="text-align: center;">Shop Name</th>
                    <th style="text-align: right;">Rate</th>
                    <th style="text-align: center;">QTY</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 70px">
                            <img src="{{ $orderItem->image->image_path }}" alt="{{ $orderItem->product_name }}" style="width:55px; height:55px;">
                        </td>
                        <td>
                            <h6 style="margin: 0;">{{ $orderItem->product_name }}</h6>
                            <span class="text-muted"> SKU: {{ $orderItem->product->product_sku }} </span>
                            @if($orderItem->product->product_type == 2)
                            <div class="text-muted text-size-small"> Size: {{ $orderItem->size }} </div>
                            <div class="text-muted text-size-small"> Color: {{ $orderItem->color }} </div>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if(!empty($orderItem->seller->shop))
                                {{ $orderItem->seller->shop->shop_name }}
                            @endif
                        </td>
                        <td class="text-right">$ {{ number_format($orderItem->price, 2) }} </td>
                        <td class="text-center"> X {{  $orderItem->qty }} </td>
                        <td class="text-right"><span class="text-semibold">$  {{ number_format($orderItem->total_price, 2) }} </span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif
        <div class="panel-body">
            <div class="row invoice-payment">
                <div class="col-sm-5 col-sm-offset-7" style="float: right; width: 50%;">
                    <div class="content-group">
                        <h6>Summary</h6>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <th>Total:</th>
                                    <td class="text-right text-primary">
                                        <h5 class="text-semibold" style="margin: 0px;">$ {{ number_format($orderItem->total_price, 2) }} </h5></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('load', (event) => {
        console.log('page is fully loaded');
        window.print();
    });

    window.addEventListener("afterprint", function(event) {
        console.log('print cancel');
        window.close();
    });
</script>
</body>
</html>
