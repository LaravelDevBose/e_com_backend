<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal-400">
                <h5 class="panel-title">Order Details</h5>
            </div>
            <div class="panel-body no-padding-bottom">
                <div class="text-right">
                    <button type="button" @click.prevent="invoicePrint()"  class="btn btn-sm btn-primary"><i class="icon-printer"></i></button>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-md-6 content-group">
                        <img src="/saliim.png" alt="logo" style="max-width:100px; max-height: 80px;">
                        <ul class="list-condensed list-unstyled">
                            <!--                                TODO add Company Address Dynamic-->
                            <li><h5 class="text-uppercase text-semibold">Saliim</h5></li>
                            <li>Address: Bakaaro,  Mogadishu, Somalia</li>
                            <li>Phone: 00252617500005</li>
                            <li>Email: info@saliim.com</li>
                        </ul>
                    </div>

                </div>

                <div class="row">
                    <div v-if="order.shipping !== null" class="col-sm-4 col-md-4 col-lg-4">
                        <div class="content-group">
                            <span class="text-muted">Shipping To:</span>
                            <ul class="list-condensed list-unstyled">
                                <li><h5 v-if="order.shipping.full_name">{{ order.shipping.full_name }}</h5></li>
                                <li><span class="text-semibold">{{ order.shipping.phone_no }}</span></li>
                                <li>{{ order.shipping.address }}</li>
                                <li>{{ order.shipping.city }}</li>
                                <li>{{ order.shipping.state }} <span v-if="order.shipping.postal_code" class="text-semibold">- {{ order.shipping.postal_code }}</span></li>
                                <li>{{ order.shipping.country }}</li>
                            </ul>
                        </div>
                    </div>
                    <div v-if="order.payment" class="col-sm-4 col-md-4 col-lg-4">
                        <div class=" content-group">
                            <span class="text-muted">Payment Details:</span>
                            <ul class="list-condensed list-unstyled">
                                <li><h5>Total: <span class="text-semibold">$ {{ order.total }}</span></h5></li>
                                <!--<li>Invoice: <span class="text-bold text-uppercase">{{ order.payment.invoice_no }}</span></li>-->
                                <li>Paid By: <span class="text-semibold">{{ order.payment.paid_by }}</span></li>
                                <li>Paid At: <span class="text-semibold">{{ order.payment.paid_at }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="invoice-details content-group">
                            <h5 class="text-uppercase text-semibold">Order No #{{ order.order_no }}</h5>
                            <ul class="list-condensed list-unstyled">
                                <li>Order Date: <span class="text-semibold">{{ order.order_date }}</span></li>
                                <!--                                    <li>Delivery date: <span class="text-semibold">{{ order.delivery_date}}</span></li>-->
                                <li>Status:
                                    <div class="btn-group">
                                        <span  class="label  dropdown-toggle"
                                               :class="{'bg-info':order.order_status == 1, 'bg-danger':order.order_status == 2, 'bg-warning':order.order_status == 3, 'bg-primary':order.order_status == 4, 'bg-indigo-400':order.order_status == 5, 'bg-teal':order.order_status == 6 }"
                                               data-toggle="dropdown" aria-expanded="false">
                                            {{ order.status_label }}
                                            <span v-if="order.order_status != 2  && order.order_status != 6" class="caret"></span>
                                        </span>
                                        <div v-if="order.order_status != 2 && order.order_status != 6" >
                                            <ul v-if="statusList" class="dropdown-menu dropdown-menu-right">
                                                <li v-for="(status, index) in statusList" v-if="order.order_status != index">
                                                    <a href="#" @click.prevent="changeOrderStatus(order.order_no, index)">
                                                        <span
                                                            class="status-mark position-left"
                                                            :class="{'bg-info':index == 1, 'bg-danger':index == 2, 'bg-warning':index == 3, 'bg-primary':index == 4, 'bg-indigo-400':index == 5, 'bg-teal':index == 6 }"
                                                        ></span> {{ status }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div v-if="order.order_status != 2 && order.order_status != 6" >
                                        <ul v-if="statusList" class="dropdown-menu dropdown-menu-right">
                                            <li v-for="(status, index) in statusList" v-if="order.order_status != index">
                                                <a href="#" @click.prevent="changeOrderStatus(order.order_no, index)">
                                                <span
                                                    class="status-mark position-left"
                                                    :class="{'bg-info':index == 1, 'bg-danger':index == 2, 'bg-warning':index == 3, 'bg-primary':index == 4, 'bg-indigo-400':index == 5, 'bg-teal':index == 6 }"
                                                ></span> {{ status }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="order.order_items">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="max-width:100px">Product Image</th>
                        <th>Product Description</th>
                        <th>Seller Info</th>
                        <th class="text-center">Item Status/ Cancel By</th>
                        <th class="col-sm-1 text-right">Rate</th>
                        <th class="col-sm-1 text-center">QTY</th>
                        <th class="col-sm-1 text-right">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item,index) in order.order_items" :key="index">
                        <td style="max-width:100px">
                            <img :src="item.image.image_path" :alt="item.product_name" style="width:55px; height:55px;">
                        </td>
                        <td>
                            <h6 class="no-margin">{{ item.product.product_name}}</h6>
                            <span class="text-muted">
                                <span class="text-slate"> <i class="icon-barcode2"></i> {{ item.product.product_sku }}</span>
                            </span>
                            <div v-if="item.product.product_type === 2">
                                <div class="text-muted text-size-small">
                                    <span class="text-warning position-left text-bold">Size:</span>
                                    {{ item.size }}
                                </div>
                                <div class="text-muted text-size-small">
                                    <span class="text-warning position-left text-bold">Color:</span>
                                    {{ item.color }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-teal" style="margin-right:.5rem; " v-if="item.seller.shop"> <i class="icon-store2"></i> {{ item.seller.shop.shop_name }}</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <span
                                    class="label  dropdown-toggle"
                                    :class="{
                                        'bg-info':item.item_status === 1,
                                        'bg-danger':item.item_status === 2,
                                        'bg-warning':item.item_status === 3,
                                        'bg-primary':item.item_status === 4,
                                        'bg-teal':item.item_status === 5,
                                        'bg-success':item.item_status === 6
                                        }"
                                    data-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ item.item_status_label }}

                                    <span v-if="item.item_status != 2 && item.item_status != 6" class="caret"></span>
                                </span>
                                <span v-if="item.item_status === 2 && item.cancel_by !== null">
                                        <span v-if="item.cancel_by === 1"> / Admin</span>
                                        <span v-if="item.cancel_by === 2"> / Buyer</span>
                                        <span v-if="item.cancel_by === 3"> / Seller</span>
                                    </span>
                                <div v-if="item.item_status != 2 && item.item_status != 6" >
                                    <ul v-if="statusList" class="dropdown-menu dropdown-menu-right">
                                        <li v-for="(status, index) in statusList" v-if="item.item_status != index">
                                            <a href="#" @click.prevent="changeOrderItemStatus(item.item_id, index)">
                                                <span
                                                    class="status-mark position-left"
                                                    :class="{'bg-info':index == 1, 'bg-danger':index == 2, 'bg-warning':index == 3, 'bg-primary':index == 4, 'bg-indigo-400':index == 5, 'bg-teal':index == 6 }"
                                                ></span> {{ status }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">$ {{ item.price }}</td>
                        <td class="text-center">{{ item.qty }}</td>
                        <td class="text-right"><span class="text-semibold">$ {{ item.total_price }}</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="panel-body">
                <div class="row invoice-payment">
                    <div class="col-sm-5 col-sm-offset-7">
                        <div class="content-group">
                            <h6>Summary</h6>
                            <div class="table-responsive ">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Subtotal:</th>
                                        <td class="text-right">$ {{ order.sub_total }}</td>
                                    </tr>
                                    <tr>
                                        <th>Delivery:</th>
                                        <td class="text-right">$ {{ order.delivery_charge}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td class="text-right text-primary"><h5 class="text-semibold">$ {{ order.total }}</h5></td>
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

</template>

<script>

    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "OrderDetailsPage",
        props:['orderid'],
        data(){
            return{

            }
        },
        created() {
            if(typeof this.orderid !== "undefined" && this.orderid !== ''){
                this.getOrderInfo(this.orderid)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            // Notify.success(response.message);
                        }else if(response.code === 404){
                            Notify.error(response.message);
                            setTimeout(()=>{
                                location.href = '/admin/order';
                            },3000);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
            this.getOrderStatus();
        },
        methods:{
            ...mapActions([
                'getOrderInfo',
                'getOrderStatus',
                'orderStatusChange',
                'orderItemStatusUpdate'
            ]),
            changeOrderItemStatus(itemId,status){
                const reqData = {
                    item_id: itemId,
                    status: status
                }
                this.orderItemStatusUpdate(reqData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            setTimeout( () =>{
                                location.reload()
                            },2000)
                        }else if(response.status === 'validation'){
                            Notify.warning(response.message);
                        }else {
                            Notify.error(response.message);
                        }
                    })
            },
            changeOrderStatus(orderNo, status){
                //TODO use nice Global Modal For Confirm Action

                let conf = confirm('Are You Sure Want To change Order Status.?');
                if(!conf){
                    return false;
                }
                this.orderStatusChange({order_no:orderNo, status:status})
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            setTimeout( () =>{
                                location.reload()
                            },2000)
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },
            invoicePrint(){
                window.open(`/admin/order/${this.orderid}/print`);
            }
        },
        computed:{
            ...mapGetters([
                'order',
                'statusList'
            ])
        },
    }
</script>

<style scoped>

</style>
