<template>
    <div v-if="orderInfo">
        <h3>Invoice No:  {{ orderInfo.order_no}}</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="heading-counter warning" v-if="orderInfo.shippingInfo">Shipping To: {{ orderInfo.shippingInfo.firstName +' '+ orderInfo.shippingInfo.lastName }}
                    <p>{{ orderInfo.shippingInfo.phoneNo }}</p>
                    <p>{{ orderInfo.shippingInfo.address }}</p>
                    <p>
                        {{orderInfo.shippingInfo.district }},
                        {{ orderInfo.shippingInfo.region }}
                        <span v-if="orderInfo.shippingInfo.postalCode" class="text-semibold">
                            - {{ orderInfo.shippingInfo.postalCode }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="heading-counter warning">Order Details:
                    <p>Order Date: <span class="text-semibold">{{ orderInfo.date }}</span></p>
                    <p v-if="orderInfo.deliveryMethod">Delivery Method: <span class="text-semibold">{{ orderInfo.deliveryMethod.title }}</span></p>
                    Order Status:
                    <div class="btn-group">
                        <span
                            class="label  dropdown-toggle"
                            :class="{
                                'btn-info':orderInfo.status === 1 || orderInfo.status === 5,
                                'btn-danger':orderInfo.status === 2,
                                'btn-warning':orderInfo.status === 3 || orderInfo.status === 7,
                                'btn-primary':orderInfo.status === 4,
                                'btn-success':orderInfo.status === 6 }"
                            data-toggle="dropdown"
                            aria-expanded="false">
                            {{ orderInfo.statusLabel }}
                            <!--<span v-if="orderInfo.status === 1 || orderInfo.status === 7" class="caret"></span>-->
                        </span>
                        <!--<div v-if="orderInfo.status === 1 || orderInfo.status === 7">
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="#" @click.prevent="cancelOrder(orderInfo.order_id)">
                                        Cancel
                                    </a>
                                </li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered  cart_summary">
                    <thead>
                    <tr>
                        <th class="cart_product">Product</th>
                        <th>Description</th>
                        <th class="text-right">Unit price</th>
                        <th class="text-center">Qty</th>
                        <th class="text-right">Total</th>
                        <th class="action">Action</th>
                    </tr>
                    </thead>
                        <tbody>
                        <tr
                            v-if="orderInfo && orderInfo.orderItems.length > 0"
                            v-for="(item,index) in orderInfo.orderItems"
                            :key="index"
                        >
                            <td class="cart_product">
                                <router-link :to="{ name: 'Product', params:{ slug: item.slug } }" >
                                    <clazy-load :src="item.image">
                                        <img :title="item.productName" :src="item.image" style="width:100%; height:auto;">
                                        <div class="preloader" slot="placeholder">
                                            <img :title="item.productName" :src="$baseUrl+'/images/loader.gif'" style="width:100%; height:auto;">
                                        </div>
                                    </clazy-load>
                                </router-link>
                            </td>
                            <td class="cart_description">
                                <p class="product-name">
                                    <router-link :to="{ name: 'Product', params:{ slug: item.slug } }" >
                                        {{ item.productName }}
                                    </router-link>
                                </p>
                                <small v-if="item.color">Color : {{ item.color.name}}</small><br>
                                <small v-if="item.size">Size : {{ item.size.name }}</small>
                            </td>
                            <td class="price"><span>{{ item.price }}</span></td>
                            <td class="text-center"><span>{{ item.qty }}</span></td>
                            <td class="price">
                                <span>{{ item.subtotal }}</span>
                            </td>
                            <td class="text-center">
                                <a href="#"  class="btn btn-info" @click="addReview()" title="Add Review">
                                    <i class="far fa-comment-alt"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4"><strong>Subtotal</strong></td>
                        <td colspan="2"><strong>{{ orderInfo.subtotal }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Discount</strong></td>
                        <td colspan="2"><strong>{{ orderInfo.discount }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Delivery Charge</strong></td>
                        <td colspan="2"><strong>{{ orderInfo.delivery_charge }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td colspan="2"><strong>{{ orderInfo.total }}</strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
export default {
    name: "OrderDetailPage",
    beforeRouteEnter(to, from, next) {
        let orderNo = '';
        if (to.params.hasOwnProperty('order_no')) {
            orderNo = to.params.order_no;
        } else {
            vm.$router.push('/page_not_found');
        }

        next(vm => {
            vm.getOrderDetails(orderNo)
                .then(response => {
                    if (response.status !== 200) {
                        vm.$router.push('/page_not_found');
                    }
                });
        });
    },
    methods:{
        ...mapActions([
            'getOrderDetails'
        ])
    },
    computed:{
        ...mapGetters(['orderInfo'])
    }
}
</script>

<style scoped>
p{
    margin: 0;
}
.cart_product{
    text-align: center!important;
    padding: 0px!important;
}
.cart_product img{
    width: 50px!important;
    height: 50px!important;
}
.btn{
    padding: 10px!important;
    line-height: 0!important;
}
</style>
