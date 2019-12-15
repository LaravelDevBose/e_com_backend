<template>
    <div class="col-md-9 col-md-push-3   col-main">
        <h2 class="page-heading">
            <span class="page-heading-title2">{{ $t('buyer.order.recent_order_list')}}</span>
        </h2>

        <div class="content-text clearfix">
            <order-list-table></order-list-table>
        </div>
        <invoice-modal-one></invoice-modal-one>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import OrderListTable from "../order/OrderListTable";
    import InvoiceModelOne from './../order/InvoiceModalOne';

    export default {
        name: "BuyerDashboardPage",
        components: {OrderListTable},
        data(){
            return{
                reqData:{
                    buyer_id:'buyer',
                    take:10,
                    order_by:'desc'
                },
                buyerInfo:{},
                buyer_name:''
            }
        },
        created(){
            if(AppStorage.getWhoIs() !== 'buyer'){
                location.href = '/login';
            }
            this.buyer_name = AppStorage.getFullName();
        },
        mounted(){
            this.getOrderList(this.reqData);
        },
        methods:{
            ...mapActions([
                'getOrderList',
            ])
        },
        computed:{
            ...mapGetters([

            ]),
        }


    }
</script>

<style scoped>

</style>
