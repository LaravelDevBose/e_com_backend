<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal-400">
                <h5 class="panel-title">Manage All Order Items </h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
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
        name: "ManageOrderPage",
        components: {OrderListTable},
        data(){
            return{
                reqData:{
                    paginate:20,
                    order_by:'desc'
                }
            }
        }
    }
</script>

<style scoped>

</style>
