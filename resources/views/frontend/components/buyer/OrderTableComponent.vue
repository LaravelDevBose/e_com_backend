<template>
    <div class="table-responsive wow bounceInUp animated">
        <table class="table table-bordered  cart_summary">
            <thead>
                <tr>
                    <th>Order Info</th>
                    <th class="text-center">Qty</th>
                    <th class="text-right">Discount</th>
                    <th class="text-right">Change</th>
                    <th class="text-right">Total</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-if="orderList && orderList.length > 0"
                    v-for="order in orderList"
                    :key="order.order_no"
                >
                    <td>
                        <p style="margin: 0"><strong>Invoice:</strong> {{ order.order_no}}</p>
                        <p style="margin: 0"><strong>Date:</strong> {{ order.date}}</p>
                        <p v-if="order.shippingInfo" style="margin: 0">
                            <strong>Name: </strong>
                            {{ order.shippingInfo.firstName + ' ' +  order.shippingInfo.lastName  }}
                        </p>
                    </td>
                    <td class="text-center">{{ order.total_qty }}</td>
                    <td class="text-right">{{ order.discount }}</td>
                    <td class="text-right">{{ order.delivery_charge }}</td>
                    <td class="text-right">{{ order.total }}</td>
                    <td class="text-center">
                        <span class="badge badge-info" v-if="order.status === 1">{{ order.statusLabel }}</span>
                        <span class="badge badge-danger" v-else-if="order.status === 2">{{ order.statusLabel }}</span>
                        <span class="badge badge-danger" v-else-if="order.status === 3">{{ order.statusLabel }}</span>
                        <span class="badge badge-primary" v-else-if="order.status === 4">{{ order.statusLabel }}</span>
                        <span class="badge badge-primary" v-else-if="order.status === 5">{{ order.statusLabel }}</span>
                        <span class="badge badge-success" v-else-if="order.status === 6">{{ order.statusLabel }}</span>
                        <span class="badge badge-warning" v-else-if="order.status === 7">{{ order.statusLabel }}</span>
                    </td>
                    <td class="text-center">
                        <router-link :to="{name: 'invoice', params:{order_no: order.order_no }}" class="btn btn-info">
                            view
                        </router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
export default {
    name: "OrderTableComponent",
    created() {
        this.getOrderList();
    },
    computed:{
        ...mapGetters(['orderList']),
    },
    methods:{
        ...mapActions(['getOrderList'])
    }
}
</script>

<style scoped>

</style>
