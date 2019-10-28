<template>
    <div class="table-responsive wow bounceInUp animated">
        <table class="table table-bordered  cart_summary">
            <thead>
            <tr>
                <th>Order #</th>
                <th>Date</th>
                <th>Ship To.</th>
                <th class="text-right">Total Order</th>
                <th class="text-center">Status</th>
                <th class="action text-center">View</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="orderList" v-for="(order,index) in orderList" :key="index">
                <td>{{ order.order_no }}</td>
                <td>{{ order.order_date }}</td>
                <td>{{ order.shipping.first_name }} {{ order.shipping.last_name}}</td>
                <td class="text-right">
                    <span class="price">$ {{order.total }}</span>
                </td>
                <td class="text-center">
                    <em>{{ order.status_label }}</em>
                </td>
                <td class="text-center">
                    <a href="#" @click.prevent="showInvoiceModal(order.order_no)" class="text-primary"> <i class="fa fa-eye"></i></a>
                </td>
            </tr>
            <tr v-else>
                <td colspan="7">On Purchase yet</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import InvoiceModelOne from './InvoiceModalOne';

    export default {
        name: "OrderListTable",
        components:{InvoiceModelOne},
        methods:{
            ...mapActions([
                'getOrderInfo'
            ]),
            viewOrderInfo(order_no){
                location.href = `/buyer/order/${order_no}/show`;
            },
            showInvoiceModal(orderNo){
                this.getOrderInfo(orderNo)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            $('#invoice').modal('show');
                        }else{
                            alert(response.message);
                        }

                    })
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
