<template>
    <div class="table-responsive wow bounceInUp animated">
        <table class="table table-bordered  cart_summary">
            <thead>
            <tr>
                <th>{{ $t('buyer.order.order')}} #</th>
                <th>{{ $t('buyer.order.date')}}</th>
                <th>{{ $t('buyer.order.ship_to')}}</th>
                <th class="text-right">{{ $t('buyer.order.total_order')}}</th>
                <th class="text-center">{{ $t('buyer.order.status')}}</th>
                <th class="action text-center">{{ $t('buyer.order.view')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="orderList" v-for="(order,index) in orderList" :key="index">
                <td>{{ order.order_no }}</td>
                <td>{{ order.order_date }}</td>
                <td>
                    <span v-if="order.shipping">{{ order.shipping.full_name }}</span>
                    <span v-else>55</span>
                </td>
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
                <td colspan="7">{{ $t('buyer.order.no_order')}}</td>
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
