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
                    <td>{{ order.shipping.first_name }} {{ order.shipping.last_name}}</td>
                    <td>
                        <span class="price">$ {{order.total }}</span>
                    </td>
                    <td>
                        <em>{{ order.status_label }}</em>
                    </td>
                    <td class="a-center last text-center">
                        <a href="#" @click.prevent="viewOrderInfo(order.order_no)"> <i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                <tr v-else class="last even">
                    <td colspan="6">On Purchase yet</td>
                </tr>
            </tbody>
        </table>
<!--        TODO Table Pagination-->
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "OrderListTable",
        methods:{
            viewOrderInfo(order_no){
                location.href = `/buyer/order/${order_no}/show`;
            }
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
