<template>
    <div id="invoice" class="modal fade">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Order No # {{ order.order_no }}</h5>
                </div>

                <div class="panel-body no-padding-bottom">
                    <div class="row">
                        <div class="col-md-6 content-group">
                            <img src="/assets/images/logo_demo.png" class="content-group mt-10" alt="" style="width: 120px;">
                            <ul class="list-condensed list-unstyled">
<!--                                TODO add Company Address Dynamic-->
                                <li>Company Address</li>
                                <li>Company Address</li>
                                <li>Company Address</li>
                                <li>Company Address</li>
                            </ul>
                        </div>

                        <div class="col-md-6 content-group">
                            <div class="invoice-details">
                                <h5 class="text-uppercase text-semibold">Order No #{{ order.order_no }}</h5>
                                <ul class="list-condensed list-unstyled">
                                    <li>Date: <span class="text-semibold">{{ order.order_date }}</span></li>
                                    <li>Delivery date: <span class="text-semibold">{{ order.delivery_date}}</span></li>
                                    <li>Status:
                                        <span  class="label"
                                            :class="{'bg-info':order.order_status == 1, 'bg-danger':order.order_status == 2, 'bg-warning':order.order_status == 3, 'bg-primary':order.order_status == 4, 'bg-indigo-400':order.order_status == 5, 'bg-teal':order.order_status == 6 }"
                                            >
                                                {{ order.status_label }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div v-if="order.shipping !== null" class="col-md-4 col-lg-5 content-group">
                            <span class="text-muted">Shipping To:</span>
                            <ul class="list-condensed list-unstyled">
                                <li><h5>{{ order.shipping.full_name }}</h5></li>
                                <li><span class="text-semibold">{{ order.shipping.phone_no }}</span></li>
                                <li>{{ order.shipping.address }}</li>
                                <li>{{ order.shipping.city }}</li>
                                <li>{{ order.shipping.state }} <span v-if="order.shipping.postal_code" class="text-semibold">- {{ order.shipping.postal_code }}</span></li>
                                <li>{{ order.shipping.country }}</li>
                            </ul>
                        </div>
                        <div v-if="order.billing !== null" class="col-md-4 col-lg-4 content-group">
                            <span class="text-muted">Billing To:</span>
                            <ul class="list-condensed list-unstyled">
                                <li><h5>{{ order.billing.full_name }}</h5></li>
                                <li><span class="text-semibold">{{ order.billing.phone_no }}</span></li>
                                <li>{{ order.billing.address }}</li>
                                <li>{{ order.billing.city }}</li>
                                <li>{{ order.billing.state }} <span v-if="order.billing.postal_code" class="text-semibold">- {{ order.billing.postal_code }}</span></li>
                                <li>{{ order.billing.country }}</li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-lg-3 content-group">
                            <span class="text-muted">Payment Details:</span>
                            <ul class="list-condensed list-unstyled invoice-payment-details">
                                <li><h5>Total: <span class="text-right text-semibold">$ {{ order.total }}</span></h5></li>
                                <li>Invoice: <span class="text-bold text-uppercase">{{ order.payment.invoice_no }}</span></li>
                                <li>Paid By: <span class="text-semibold">{{ order.payment.paid_by }}</span></li>
                                <li>Paid At: <span class="text-semibold">{{ order.payment.paid_at }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div v-if="order.order_items" class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>Order Item Description</th>
                                <th class="col-sm-1">Rate</th>
                                <th class="col-sm-1">QTY</th>
                                <th class="col-sm-1">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item,index) in order.order_items" :key="index">
                                <td>
                                    <h6 class="no-margin">{{ item.product.product_name}}</h6>
                                    <span class="text-muted">
                                        <span class="text-teal" style="margin-right:.5rem; " v-if="item.seller"> <i class="icon-store2"></i> {{ item.seller.shop_name }}</span>
                                        <span class="text-slate"> <i class="icon-barcode2"></i> {{ item.product.product_sku }}</span>
                                    </span>
                                </td>
                                <td>$ {{ item.price }}</td>
                                <td>{{ item.qty }}</td>
                                <td><span class="text-semibold">$ {{ item.total_price }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="panel-body">
                    <div class="row invoice-payment">
                        <!--<div class="col-sm-7">
                            <div class="content-group">
                                <h6>Order By</h6>
                                <div class="mb-15 mt-15">
                                    <img src="/assets/images/signature.png" class="display-block" style="width: 150px;" alt="">
                                </div>

                                <ul class="list-condensed list-unstyled text-muted">
                                    <li>Eugene Kopyov</li>
                                    <li>2269 Elba Lane</li>
                                    <li>Paris, France</li>
                                    <li>888-555-2311</li>
                                </ul>
                            </div>
                        </div>-->

                        <div class="col-sm-5 col-sm-offset-7">
                            <div class="content-group">
                                <h6>Total due</h6>
                                <div class="table-responsive no-border">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td class="text-right">$ {{ order.sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax: <span class="text-regular">(0%)</span></th>
                                            <td class="text-right">$ 0</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td class="text-right text-primary"><h5 class="text-semibold">$ {{ order.total }}</h5></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--<div class="text-right">
                                    <button type="button" class="btn btn-primary btn-labeled"><b><i class="icon-printer"></i></b> Print invoice</button>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "InvoiceModalView",
        methods:{
            ...mapActions([

            ])
        },
        computed:{
            ...mapGetters([
                'order',
            ])
        }
    }
</script>

<style scoped>

</style>
