<template>
    <div class="my-account">
        <div class="page-title">
            <h2>{{ $t('buyer.dashboard.my_dashboard')}}</h2>
        </div>
        <div class="dashboard">
            <div class="recent-orders">
                <div class="title-buttons">
                    <strong>{{ $t('buyer.order.recent_order_list')}}</strong>
                    <a href="/buyer/my-orders" >{{ $t('buyer.view_all')}}</a>
                </div>
                <order-list-table></order-list-table>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import OrderListTable from "../order/OrderListTable";
    import WelcomeMessage from "../section/WelcomeMessage";

    export default {
        name: "BuyerDashboardPage",
        components: {WelcomeMessage, OrderListTable},
        data(){
            return{
                reqData:{
                    buyer_id:'buyer',
                    take:5,
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
