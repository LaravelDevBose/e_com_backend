<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>invoice No {{ $order->order_no }}</title>
    @include('admin_panel.limitless_v2.order.print_asset')
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
                    <img src="/logo.jpg" alt="logo" style="max-width:100px; max-height: 80px;">
                </div>
                <div class="col-sm-10 col-md-6 content-group" style="float:left; width: 80%">
                    <ul class="list-condensed list-unstyled">
                        <li style="margin: 0;"><h5 class="text-uppercase text-semibold" style="margin: 0;">Saliim</h5></li>
                        <li style="margin: 0;">Address: {{ $contactInfos['contact_address'] }}</li>
                        <li style="margin: 0;">Phone: {{ $contactInfos['contact_phone'] }}</li>
                        <li style="margin: 0;">Email: {{ $contactInfos['contact_email'] }}</li>
                    </ul>
                </div>
            </div>

            <div class="row">
                @if(!empty($order->shipping))
                <div class="col-sm-6 col-md-6 col-lg-6" style="float:left; width: 49%">
                    <div class="content-group">
                        <span class="text-muted">Shipping To:</span>
                        <ul class="list-condensed list-unstyled">
                            <li style="margin: 0;"><h5 style="margin: 0; font-size: 14px;"> {{ $order->shipping->full_name}} </h5></li>
                            <li style="margin: 0;"><span class="text-semibold">{{ $order->shipping->phone_no}} </span></li>
                            <li style="margin: 0;"> {{ $order->shipping->address}} , {{ $order->shipping->district }} </li>
                            <li style="margin: 0;"> {{ $order->shipping->region}}
                                @if(!empty($order->shipping->postal_code))
                                <span class="text-semibold">-  {{ $order->shipping->postal_code }} </span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                @endif

                <div class="col-sm-6 col-md-6 col-lg-6" style="float: left; text-align:right; width: 49%">
                    <div class="invoice-details content-group">
                        <h5 class="text-uppercase text-semibold" style="margin: 0; font-size: 14px;">Order No # {{ $order->order_no }} </h5>
                        <p>Order Date: <span class="text-semibold">{{ $order->order_date }} </span></p>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($order->orderItems))
        <div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width:70px">Image</th>
                    <th style="width: 43%; ">Product Description</th>
                    <th style="text-align: right;">Rate</th>
                    <th style="text-align: center;">QTY</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td style="width: 70px">
                            <img src="{{ $item->image->image_path }}" alt="{{ $item->product_name }}" style="width:55px; height:55px;">
                        </td>
                        <td>
                            <h6 style="margin: 0;">{{ $item->product_name }}</h6>
                            <span class="text-muted"> SKU: {{ $item->product->product_sku }} </span>
                            @if($item->size)
                            <div class="text-muted text-size-small"> Size: {{ $item->size->size_name }} </div>
                            @endif
                            @if($item->color)
                            <div class="text-muted text-size-small"> Color: {{ $item->color->color_name }} </div>
                            @endif
                        </td>
                        <td class="text-right"> {{ number_format($item->price, 2) }} </td>
                        <td class="text-center"> X {{  $item->qty }} </td>
                        <td class="text-right"><span class="text-semibold">  {{ $item->total_price }} </span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <div class="panel-body">
            <div class="row invoice-payment">
                @if(!empty($order->payment))
                    <div class="col-sm-6 col-md-6 col-lg-6" style="float:left; width: 33%">
                        <div class=" content-group">
                            <span class="text-muted">Payment Details:</span>
                            <ul class="list-condensed list-unstyled">
                                <li style="margin: 0;"><h5 style="margin: 0; font-size: 14px;">Total: <span class="text-semibold">$  {{ $order->total}} </span></h5></li>
                                <li style="margin: 0;">Paid By: <span class="text-semibold"> {{ $order->payment->paid_by }} </span></li>
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="col-sm-5 {{ empty($order->payment)? 'col-sm-offset-7': 'col-sm-offset-1' }} " style="float: right; width: 50%;">
                    <div class="content-group">
                        <h6>Summary</h6>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <th>Subtotal:</th>
                                    <td class="text-right"> {{ $order->sub_total }} </td>
                                </tr>
                                <tr>
                                    <th>Delivery:</th>
                                    <td class="text-right"> {{ number_format($order->delivery_charge, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Discount:</th>
                                    <td class="text-right"> {{ $order->discount }}</td>
                                </tr>
                                @if($order->cancel_total > 0)
                                <tr style="background: #ddd">
                                    <th style="background: #ddd">Canceled:</th>
                                    <td class="text-right" style="background: #ddd"> {{ $order->cancel_total  }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Total:</th>
                                    <td class="text-right text-primary">
                                        <h5 class="text-semibold" style="margin: 0px;"> {{ $order->total }} </h5></td>
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
