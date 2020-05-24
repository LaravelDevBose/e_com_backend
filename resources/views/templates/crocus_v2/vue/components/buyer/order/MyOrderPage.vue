<template>
    <div class="my-account">
        <div class="page-title">
            <h2>{{ $t('buyer.order.order_list')}}</h2>
        </div>
        <div class="dashboard">
            <div class="recent-orders">
                <order-list-table></order-list-table>
            </div>
        </div>
    </div>
</template>

<script>
    import OrderListTable from "./OrderListTable";
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "MyOrderPage",
        components: {OrderListTable},
        data(){
            return{
                reqData:{
                    buyer_id:'buyer',
                    order_by:'desc'
                }
            }
        },
        mounted(){
            this.getOrderList(this.reqData);
        },
        methods:{
            ...mapActions([
                'getOrderList',
            ])
        }
    }
</script>

<style scoped>

</style>
