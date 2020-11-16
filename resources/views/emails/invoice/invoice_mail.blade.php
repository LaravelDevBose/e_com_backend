@include('emails.include.head')
@include('emails.include.header')
<h2 style=" background-color: #00c0ef;    color: #fff;">Invoice No: #{{ $orderInfo->order_no }}</h2>
<div class="content">
    <table class="panel" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td class="panel-content">
                <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="panel-item">
                            <div class="invoice-info">
                                <h6 class="mb-3 head-title">Shipping To:</h6>
                                <div>
                                    <strong>{{ $orderInfo->shipping->full_name }}</strong>
                                </div>
                                <div class="address">{{ $orderInfo->shipping->address }}</div>
                                <div class="address">{{ $orderInfo->shipping->city }},{{ $orderInfo->shipping->district }}</div>
                                <div class="address">{{ $orderInfo->shipping->region }}-{{ $orderInfo->shipping->postal_code }}</div>
                                <div class="phone"><strong>Phone:</strong> {{ $orderInfo->shipping->phone_no }}</div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="container">
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
    <div class="action" style="width: 100%; clear: both;">
        <a style="color: #fff !important;" href="{{ $url }}"  class="button button-primary">View Order</a>
    </div>
</div>


@include('emails.include.footer')
