<template>
    <div v-if="Object.entries(orderInfo).length !== 0" id="invoice" class="modal fade">
        <div class="modal-dialog modal-lg modal-full" style="top:4rem;">
            <div class="modal-content">
               <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>-->

                <div class="panel-body no-padding-bottom">
                    <div class="row" style="border-bottom: 1px solid #ddd; padding-bottom: 1rem; margin-bottom: 1rem;">
                        <div class="col-md-6 content-group">
                            <img src="/assets/images/logo_demo.png" class="content-group mt-10" alt="" style="width: 120px;">
                            <ul class="list-condensed list-unstyled">
<!--                                TODO add Company Address Dynamic-->
                                <li><h5 class="text-uppercase text-semibold">Company Name</h5></li>
                                <li>Address: </li>
                                <li>Phone: </li>
                                <li>Email: </li>
                            </ul>
                        </div>

                        <div class="col-md-6 content-group">
                            <div class="invoice-details text-right">
                                <h5 class="text-uppercase text-semibold">Order No #{{ orderInfo.order_no }}</h5>
                                <ul class="list-condensed list-unstyled">
                                    <li>Date: <span class="text-semibold">{{ orderInfo.order_date }}</span></li>
                                    <li>Delivery date: <span class="text-semibold">{{ orderInfo.delivery_date}}</span></li>
                                    <li>Status:
                                        <span  class="label "
                                            :class="{'btn-info':orderInfo.order_status == 1, 'btn-danger':orderInfo.order_status == 2, 'btn-warning':orderInfo.order_status == 3, 'btn-primary':orderInfo.order_status == 4, 'btn-indigo-400':orderInfo.order_status == 5, 'btn-teal':orderInfo.order_status == 6 }"
                                            >
                                                {{ orderInfo.status_label }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div v-if="orderInfo.shipping !== null" class="content-group">
                                <span class="text-muted">Shipping To:</span>
                                <ul class="list-condensed list-unstyled">
                                    <li><h5>{{ orderInfo.shipping.full_name }}</h5></li>
                                    <li><span class="text-semibold">{{ orderInfo.shipping.phone_no }}</span></li>
                                    <li>{{ orderInfo.shipping.address }}</li>
                                    <li>{{ orderInfo.shipping.city }}, {{orderInfo.shipping.district }}</li>
                                    <li>{{ orderInfo.shipping.region }} <span v-if="orderInfo.shipping.postal_code" class="text-semibold">- {{ orderInfo.shipping.postal_code }}</span></li>
                                    <li>{{ orderInfo.shipping.country }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 ">
                            <div v-if="orderInfo.billing !== null" class="content-group">
                                <span class="text-muted">Billing To:</span>
                                <ul class="list-condensed list-unstyled">
                                    <li><h5>{{ orderInfo.billing.full_name }}</h5></li>
                                    <li><span class="text-semibold">{{ orderInfo.billing.phone_no }}</span></li>
                                    <li>{{ orderInfo.billing.address }}</li>
                                    <li>{{ orderInfo.billing.city }},{{orderInfo.billing.district }}</li>
                                    <li>{{ orderInfo.billing.region }} <span v-if="orderInfo.billing.postal_code" class="text-semibold">- {{ orderInfo.billing.postal_code }}</span></li>
                                    <li>{{ orderInfo.billing.country }}</li>
                                </ul>
                            </div>
                        </div>
                        <div v-if="orderInfo.payment" class="col-md-4 col-lg-3">
                            <div class="content-group">
                                <span class="text-muted">Payment Details:</span>
                                <ul class="list-condensed list-unstyled invoice-payment-details">
                                    <li><h5>Total: <span class="text-right text-semibold">$ {{ orderInfo.total }}</span></h5></li>
                                    <li>Invoice: <span class="text-bold text-uppercase">{{ orderInfo.payment.invoice_no }}</span></li>
                                    <li>Paid By: <span class="text-semibold">{{ orderInfo.payment.paid_by }}</span></li>
                                    <li>Paid At: <span class="text-semibold">{{ orderInfo.payment.paid_at }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="orderInfo.order_items" class="table-responsive" style="padding: 10px;">
                    <table class="table table-striped table-bordered data-table" id="my-orders-table">
                        <thead>
                            <tr>
                                <th>Order Item Description</th>
                                <th class="text-center">Rate</th>
                                <th class="text-center">QTY</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item,index) in orderInfo.order_items" :key="index">
                                <td>
                                    <h6 class="no-margin text-bold">{{ item.product.product_name}}</h6>
                                    <span class="text-muted">
                                        <span class="text-teal" style="margin-right:.5rem; " v-if="item.seller.shop"> <i class="icon-store2"></i> {{ item.seller.shop.shop_name }}</span>
                                        <span class="text-slate"> <i class="icon-qrcode"></i> {{ item.product.product_sku }}</span>
                                    </span>
                                </td>
                                <td class="text-center">$ {{ item.price }}</td>
                                <td class="text-center">{{ item.qty }}</td>
                                <td class="text-right"><span class="text-semibold">$ {{ item.total_price }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div >
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
                                <h6>Summery</h6>
                                <div class="table-responsive no-border">
                                    <table class="table">
                                        <tbody>
                                        <!--<tr>
                                            <th>Subtotal:</th>
                                            <td class="text-right text-bold">$ {{ orderInfo.sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax: <span class="text-regular">(0%)</span></th>
                                            <td class="text-right text-bold">$ 0.00</td>
                                        </tr>-->
                                        <tr>
                                            <th>Total:</th>
                                            <td class="text-right text-primary"><h5 class="text-bold">$ {{ orderInfo.total }}</h5></td>
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
        name: "InvoiceModalOne",
        methods:{
            ...mapActions([

            ])
        },
        computed:{
            ...mapGetters([
                'orderInfo',
            ])
        }
    }
</script>

<style scoped>

</style>
