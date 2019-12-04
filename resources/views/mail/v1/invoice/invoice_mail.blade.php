@include('mail.v1.include.head')
@include('mail.v1.include.header')
<div class="container">
    <div class="row my-3 invoice-info">
        <div class="col-sm-4">
            <h6 class="mb-3 head-title">Shipping To:</h6>
            <div>
                <strong>{{ $orderInfo->shipping->full_name }}</strong>
            </div>
            <div class="address">{{ $orderInfo->shipping->address }}</div>
            <div class="address">{{ $orderInfo->shipping->city }},{{ $orderInfo->shipping->district }}</div>
            <div class="address">{{ $orderInfo->shipping->region }}-{{ $orderInfo->shipping->postal_code }}</div>
            <div class="phone"><strong>Phone:</strong> {{ $orderInfo->shipping->phone_no }}</div>
        </div>
        <div class="col-sm-4">
            <h6 class="mb-3 head-title">Billing To:</h6>
            <div>
                <strong>{{ $orderInfo->billing->full_name }}</strong>
            </div>
            <div class="address">{{ $orderInfo->billing->address }}</div>
            <div class="address">{{ $orderInfo->billing->city }},{{ $orderInfo->billing->district }}</div>
            <div class="address">{{ $orderInfo->billing->region }}-{{ $orderInfo->billing->postal_code }}</div>
            <div class="phone"><strong>Phone:</strong> {{ $orderInfo->billing->phone_no }}</div>
        </div>
        <div class="col-sm-4">
            <h6 class="mb-3 head-title">Payment Details:</h6>
            <div>
                <strong>Invoice: #{{ $orderInfo->payment->invoice_no }}</strong>
            </div>
            <div class="email"><strong>Total:</strong> ${{ $orderInfo->total }}</div>
            <div class="phone"><strong>Paid By:</strong> {{ $orderInfo->payment->paid_by }}</div>
            <div class="phone"><strong>Paid At:</strong> {{ $orderInfo->payment->paid_at }}</div>
        </div>
    </div>
    <div >
        @if(!empty($orderInfo->orderItems))
        <div class="table-responsive-sm">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Order Item Description</th>
                    <th class="text-right">Unit Cost</th>
                    <th class="text-center">Qty</th>
                    <th class="text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderInfo->orderItems as $orderItem)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>
                        <h6 class="m-0 font-weight-bold">{{ $orderItem->product->product_name}}</h6>
                        <span style="font-size: 12px;">
                            @if(!empty($orderItem->seller))
                            <span class="text-info mr-1"> <i class="icon-store2"></i> {{ $orderItem->seller->shop_name }}</span>
                            @endif
                            <span class="text-primary"> <i class="icon-qrcode"></i> {{ $orderItem->product->product_sku }}</span>
                        </span>
                    </td>
                    <td class="text-right">${{ $orderItem->price }}</td>
                    <td class="text-center">{{ $orderItem->qty }}</td>
                    <td class="text-right">${{ $orderItem->total_price }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-5 col-sm-6">

            </div>

            <div class="col-lg-5 col-sm-6 ml-auto">
                <table class="table table-clear">
                    <tbody>
                    <tr>
                        <td class="text-left">
                            <strong>Subtotal</strong>
                        </td>
                        <td class="text-right">${{ $orderInfo->sub_total }}</td>
                    </tr>

                    <tr>
                        <td class="text-left">
                            <strong>Discount</strong>
                        </td>
                        <td class="text-right">${{ $orderInfo->discount }}</td>
                    </tr>
                    <tr>
                        <td class="text-left">
                            <strong>Total</strong>
                        </td>
                        <td class="text-right">
                            <strong>$ {{ $orderInfo->total }}</strong>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
@include('mail.v1.include.footer')
