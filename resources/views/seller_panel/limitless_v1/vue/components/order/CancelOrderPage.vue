<template>
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Cancel Order List</h5>
            </div>
            <order-list-table :reqData="reqData"></order-list-table>
        </div>

    </div>
</template>

<script>
    import OrderListTable from './OrderListTable';
    export default {
        name: "CancelOrderPage",
        components: {OrderListTable},
        data(){
            return{
                reqData:{
                    paginate:20,
                    order_by:'desc',
                    status:2,
                    seller_id:'seller',

                }
            }
        }
    }
</script>

<style scoped>

</style>
