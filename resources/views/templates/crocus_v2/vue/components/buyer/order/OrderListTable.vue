<template>
    <div class="table-responsive">
        <table class="data-table" id="my-orders-table">
            <thead>
                <tr class="first last">
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Ship to</th>
                    <th>
                        <span class="nobr">Order Total</span>
                    </th>
                    <th>Status</th>
                    <th class="text-center">View </th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="orderList" v-for="(order,index) in orderList" :class="{'first':index === 0, 'last':(index+1) === orderList.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                    <td>{{ order.order_no }}</td>
                    <td>{{ order.order_date }}</td>
                    <td>
                        <span v-if="order.shipping !== null">{{ order.shipping.full_name }}</span>
                    </td>
                    <td>
                        <span class="price">$ {{order.total }}</span>
                    </td>
                    <td>
                        <em>{{ order.status_label }}</em>
                    </td>
                    <td class="a-center last text-center">
                        <a href="#" @click.prevent="showInvoiceDetails(order.order_id)" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i></a>
                        <a href="#" @click.prevent="goToAddReviewPage(order.order_id)" class="btn btn-sm btn-success"> <i class="fa fa-comment"></i></a>
                    </td>
                </tr>
                <tr v-else class="last even">
                    <td colspan="6">{{ $t('buyer.order.no_order')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "OrderListTable",
        methods:{
            ...mapActions([
                'getOrderInfo'
            ]),
            showInvoiceDetails(order_id){
                location.href = `/buyer/order/${order_id}/show`;
            },
            goToAddReviewPage(order_id){
                location.href = `/buyer/reviews/add/${order_id}`;
            },
        },
        computed:{
            ...mapGetters([
                'orderList',
                'pagination'
            ])
        }
    }
</script>

<style scoped>

</style>
