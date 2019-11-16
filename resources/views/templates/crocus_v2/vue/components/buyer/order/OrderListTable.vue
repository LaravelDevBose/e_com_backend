<template>
    <div class="table-responsive">
        <table class="data-table" id="my-orders-table">
            <thead>
                <tr class="first last">
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Ship to</th>
                    <th>
                        <span class="nobr">Order Total</span>
                    </th>
                    <th>Status</th>
                    <th class="text-center">View </th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="orderList" v-for="(order,index) in orderList" :class="{'first':index === 0, 'last':(index+1) === orderList.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                    <td>{{ order.order_no }}</td>
                    <td>{{ order.order_date }}</td>
                    <td>
                        <span v-if="order.shipping !== null">{{ order.shipping.full_name }}</span>
                    </td>
                    <td>
                        <span class="price">$ {{order.total }}</span>
                    </td>
                    <td>
                        <em>{{ order.status_label }}</em>
                    </td>
                    <td class="a-center last text-center">
<!--                        <a href="#" @click.prevent="viewOrderInfo(order.order_no)"> <i class="fa fa-eye"></i></a>-->
                        <a href="#" @click.prevent="showInvoiceModal(order.order_no)"> <i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                <tr v-else class="last even">
                    <td colspan="6">On Purchase yet</td>
                </tr>
            </tbody>
        </table>
<!--        TODO Table Pagination-->
<!--        <invoice-modal></invoice-modal>-->
        <invoice-modal-one></invoice-modal-one>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import InvoiceModal from "../section/InvoiceModal";
    import InvoiceModalOne from "../section/InvoiceModalOne";

    export default {
        name: "OrderListTable",
        components: {InvoiceModalOne, InvoiceModal},
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
