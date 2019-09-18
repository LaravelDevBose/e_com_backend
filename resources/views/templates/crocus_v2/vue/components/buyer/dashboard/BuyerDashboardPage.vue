<template>
    <div class="my-account">
        <div class="page-title">
            <h2>My Dashboard</h2>
        </div>
        <div class="dashboard">
            <div class="welcome-msg">
                <strong>Hello, Jon Doe!</strong>
                <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
            </div>
            <div class="recent-orders">
                <div class="title-buttons">
                    <strong>Recent Orders</strong>
                    <a href="/buyer/my-orders" >View All</a>
                </div>
                <order-list-table></order-list-table>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import OrderListTable from "../order/OrderListTable";

    export default {
        name: "BuyerDashboardPage",
        components: {OrderListTable},
        data(){
            return{
                reqData:{
                    buyer_id:'buyer',
                    take:5,
                    order_by:'desc'
                }
            }
        },
        created(){

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

            ])
        }


    }
</script>

<style scoped>

</style>
