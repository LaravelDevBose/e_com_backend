<template>
    <div class="table-responsive">
        <table class="data-table" id="my-orders-table">
            <thead>
                <tr class="first last">
                    <th>{{ $t('buyer.order.order')}} #</th>
                    <th>{{ $t('buyer.order.date')}}</th>
                    <th>{{ $t('buyer.order.ship_to')}}</th>
                    <th>
                        <span class="nobr">{{ $t('buyer.order.total_order')}}</span>
                    </th>
                    <th>{{ $t('buyer.order.status')}}</th>
                    <th class="text-center">{{ $t('buyer.order.view')}} </th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="paginatedData" v-for="(order,index) in paginatedData" :class="{'first':index === 0, 'last':(index+1) === paginatedData.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                    <td>{{ order.order_no }}</td>
                    <td>{{ order.order_date }}</td>
                    <td>
                        <span v-if="order.shipping">{{ order.shipping.first_name  }} {{ order.shipping.last_name  }}</span>
                    </td>
                    <td>
                        <span class="price">$ {{order.total }}</span>
                    </td>
                    <td>
                        <em>{{ order.status_label }}</em>
                    </td>
                    <td class="a-center last text-center">
                        <a href="#" @click.prevent="showInvoiceDetails(order.order_id)" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i></a>
                        <a href="#" @click.prevent="goToAddReviewPage(order.order_id)" class="btn btn-sm btn-success"> <i class="fa fa-comment"></i></a>
                    </td>
                </tr>
                <tr v-else class="last even">
                    <td colspan="6">{{ $t('buyer.order.no_order')}}</td>
                </tr>
            </tbody>
        </table>
        <div class="text-right" style="margin-top: 1rem;" v-if="orderList.length > size">
            <button
                class="btn btn-sm btn-primary"
                :disabled="pageNumber === 0"
                @click="prevPage">
                Previous
            </button>
            <button
                class="btn btn-sm btn-primary"
                :disabled="pageNumber >= pageCount -1"
                @click="nextPage">
                Next
            </button>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "OrderListTable",
        data () {
            return {
                pageNumber: 0,
                size: 10,
            }
        },
        methods:{
            ...mapActions([
                'getOrderInfo'
            ]),
            showInvoiceDetails(order_id){
                location.href = `/buyer/order/${order_id}/show`;
            },
            goToAddReviewPage(order_id){
                location.href = `/buyer/reviews/add/${order_id}`;
            },
            nextPage(){
                this.pageNumber++;
            },
            prevPage(){
                this.pageNumber--;
            }
        },
        computed:{
            ...mapGetters([
                'orderList',
                'pagination'
            ]),
            pageCount(){
                let l = this.orderList.length,
                    s = this.size;
                return Math.ceil(l/s);
            },
            paginatedData(){
                const start = this.pageNumber * this.size,
                    end = start + this.size;
                return this.orderList
                    .slice(start, end);
            }
        }
    }
</script>

<style scoped>

</style>
