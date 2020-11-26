<template>
    <div class="col-md-9 col-md-push-3   col-main">
        <div class="content-text clearfix" style="padding-top: 0">
            <div class="panel-body no-padding-bottom">

                <div class="row">
                    <div class="col-md-6 col-lg-6">
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
                    <div class="col-md-6 content-group">
                        <div class="invoice-details text-right">
                            <h5 class="text-uppercase text-semibold">Order No #{{ orderInfo.order_no }}</h5>
                            <ul class="list-condensed list-unstyled">
                                <li>Order Date: <span class="text-semibold">{{ orderInfo.order_date }}</span></li>
<!--                                <li>Delivery date: <span class="text-semibold">{{ orderInfo.delivery_date}}</span></li>-->
                                <li>Order Status:
                                    <div class="btn-group">
                                <span
                                    class="label  dropdown-toggle"
                                    :class="{
                                        'btn-info':orderInfo.order_status == 1 || orderInfo.order_status == 5,
                                        'btn-danger':orderInfo.order_status == 2,
                                        'btn-warning':orderInfo.order_status == 3,
                                        'btn-primary':orderInfo.order_status == 4,
                                        'btn-success':orderInfo.order_status == 6 }"
                                    data-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ orderInfo.status_label }}
                                    <span v-if="orderInfo.order_status === 1" class="caret"></span>
                                </span>
                                        <div v-if="orderInfo.order_status === 1">
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="#" @click.prevent="cancelOrder(orderInfo.order_id)">
                                                        Cancel
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="orderInfo.order_items" class="table-responsive" style="padding: 10px;">
                <table class="table table-striped table-bordered data-table" id="my-orders-table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Order Item Description</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Rate</th>
                        <th class="text-center">QTY</th>
                        <th class="text-right">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item,index) in orderInfo.order_items" :key="index">
                        <td>
                            <img :src="item.image.image_path" :alt="item.product_name" style="width:55px; height:55px;">
                        </td>
                        <td>
                            <h6 class="no-margin text-bold">{{ item.product.product_name}}</h6>
                            <span class="text-muted">
                                <span class="text-teal" style="margin-right:.5rem; " v-if="item.seller.shop"> <i class="icon-store2"></i> {{ item.seller.shop.shop_name }}</span>
                                <span class="text-slate"> <i class="icon-qrcode"></i> {{ item.product.product_sku }}</span>
                            </span>
                            <div v-if="item.product.product_type === 2">
                                <div class="text-muted text-size-small">
                                    <span class="text-warning position-left text-bold">Color:</span>
                                    {{ item.color }}
                                </div>
                                <div class="text-muted text-size-small">
                                    <span class="text-warning position-left text-bold">Size:</span>
                                    {{ item.size }}
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <span
                                    class="label  dropdown-toggle"
                                   :class="{
                                        'btn-info':item.item_status === 1||item.item_status === 5,
                                        'btn-danger':item.item_status === 2,
                                        'btn-warning':item.item_status === 3,
                                        'btn-primary':item.item_status === 4,
                                        'btn-success':item.item_status === 6
                                        }"
                                       data-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ item.item_status_label }}
                                    <span v-if="item.item_status === 1" class="caret"></span>
                                </span>
                                <div v-if="item.item_status === 1">
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#" @click.prevent="changeOrderItemCancel(item.item_id)">
                                                Cancel
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                    <div  class="col-sm-6">
                        <div v-if="orderInfo.payment" class="content-group">
                            <span class="text-muted">Payment Details:</span>
                            <ul class="list-condensed list-unstyled invoice-payment-details">
                                <li><h5>Total: <span class="text-right text-semibold">$ {{ orderInfo.total }}</span></h5></li>
                                <li>Paid By: <span class="text-semibold">{{ orderInfo.payment.paid_by }}</span></li>
<!--                                <li>Paid At: <span class="text-semibold">{{ orderInfo.payment.paid_at }}</span></li>-->
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="content-group">
                            <h6>Summery</h6>
                            <div class="table-responsive no-border">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td class="text-right text-bold">$ {{ orderInfo.sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery: </th>
                                            <td class="text-right text-bold">$ {{ orderInfo.delivery_charge !== 0 ? orderInfo.delivery_charge : 0 }}</td>
                                        </tr>
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
        </div>
    </div>
</template>

<script>
    import CartListTable from '../../cart/CartListTable';
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "InvoiceDetailsPage",
        components: {CartListTable},
        props:['orderno'],
        data(){
            return{

            }
        },
        created() {
            if(typeof this.orderno !== "undefined" && this.orderno !== ''){
                this.getOrderInfo(this.orderno)
                .then(response=>{
                    if(typeof response.code !== "undefined" && response.code === 200){
                        this.$noty.success(response.message);
                    }else if(response.code === 404){
                        this.$noty.error(response.message);
                        setTimeout(()=>{
                            location.href = '/buyer/home';
                        },3000);
                    }else{
                        this.$noty.error(response.message);
                    }
                })
            }
        },
        methods:{
            ...mapActions([
                'getOrderInfo',
                'cancelOrderItem',
                'orderCancel'
            ]),
            changeOrderItemCancel(itemId){
                this.cancelOrderItem(itemId)
                .then(response=>{
                    if(typeof response.code !== "undefined" && response.code === 200){
                        this.$noty.success(response.message);
                    }else if(response.status === 'validation'){
                        this.$noty.warning(response.message);
                    }else {
                        this.$noty.error(response.message);
                    }
                })
            },
            cancelOrder(orderId){
                this.orderCancel(orderId)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else {
                            this.$noty.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'orderInfo'
            ])
        },
        watch:{

        }

    }
</script>

<style scoped>

</style>
