<template>
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Ready To Ship Order List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>
            <order-list-table :reqData="reqData"></order-list-table>
        </div>

    </div>
</template>

<script>
    import OrderListTable from './OrderListTable';
    export default {
        name: "ShippingOrderPage",
        components: {OrderListTable},
        data(){
            return{
                reqData:{
                    paginate:20,
                    order_by:'desc',
                    status:5,
                    seller_id:'seller'
                }
            }
        }
    }
</script>

<style scoped>

</style>
