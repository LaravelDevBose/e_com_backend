<template>
    <div class="col-md-9 col-md-push-3   col-main">
        <h2 class="page-heading">
            <span class="page-heading-title2">My Order List</span>
        </h2>

        <div class="content-text clearfix">
            <order-list-table></order-list-table>
        </div>
        <invoice-modal-one></invoice-modal-one>
    </div>
</template>

<script>
    import OrderListTable from "./OrderListTable";
    import InvoiceModalOne from './InvoiceModalOne';
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "MyOrderPage",
        components: {OrderListTable, InvoiceModalOne},
        data(){
            return{
                reqData:{
                    buyer_id:'buyer',
                    paginate:5,
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
