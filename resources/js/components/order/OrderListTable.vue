<template>
    <div class="panel panel-body">
        <div class="row">
            <div class="col-xs-12 form-inline" style="margin:1em;">
                <div class="form-group">
                    <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                </div>
            </div>
            <div id="table" class="col-xs-12">
                <div class="table-responsive">
                    <datatable class="table table-bordered table-striped" :columns="columns" :data="orders" :filter-by="filter"></datatable>
                </div>
            </div>
            <div class="col-xs-12 form-inline">
                <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
            </div>
        </div>
    </div>
</template>

<script>

    import {mapGetters, mapActions} from 'vuex';
    import InvoiceModalView from "../invoice/InvoiceModalView";
    import OrderStatusBadge from "../helper/table/OrderStatusBadge";

    Vue.component('action-btn', {
        template: `<ul class="icons-list">
                        <li><a href="#" class="text text-primary-700" @click.prevent="showInvoiceModalView(row.order_id)"><i class="icon-file-eye"></i></a></li>
                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle text text-teal-600" data-toggle="dropdown" aria-expanded="false">
                                <i class="icon-cog7"></i>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-file-pdf"></i> Export to PDF</a></li>
                                <li><a href="#"><i class="icon-file-excel"></i> Export to CSV</a></li>
                                <li><a href="#"><i class="icon-file-word"></i> Export to DOC</a></li>
                            </ul>
                        </li>-->
                    </ul>`,
        props: ['row'],
        methods: {
            ...mapActions([
                'getOrderInfo',
            ]),
            showInvoiceModalView(order_id){
                location.href = `/admin/order/${order_id}/show`;
                this.getOrderInfo(order_id)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            $('#invoice').modal('show');
                        }else{
                            alert(response.message);
                        }

                    })
            },
            goToShowPage: function(orderId){
                window.location = `/admin/order/${orderId}/show`;
            }
        },
    });

    Vue.component('product-list', {
        template: `<div>
                       <ul v-if="row.order_items">
                            <li v-for="(oItem,index) in row.order_items">{{ oItem.product_name }} - ({{ oItem.qty }})</li>
                        </ul>
                    </div>`,
        props: ['row']
    });
    Vue.component('shipping-to', {
        template: `<div v-if="row.shipping"><span>{{ row.shipping.full_name }}</span></div>`,
        props: ['row']
    });
    export default {
        name: "OrderListTable",
        components: {
            InvoiceModalView,
            'order-status-badge':OrderStatusBadge,
        },
        props:['reqData'],
        data(){
            return {
                page: 1,
                per_page:0,
                orders:'',
                filter: '',
                rows:'',
                columns: [
                    { label: 'Order No', field: 'order_no',  },
                    { label: 'Order Date', field: 'order_date', filterable: true, sortable:true },
                    { label: 'Buyer', field: 'user.full_name' , filterable: true, sortable:true },
                    { label: 'Shipping To', component: 'shipping-to' , filterable: true, sortable:true },
                    { label: 'Products - (Qty)', component:'product-list', filterable: true, sortable:false },
                    { label: 'Quantity', field: 'total_qty', align: 'right',  },
                    { label: 'Subtotal', field: 'sub_total', align: 'right', sortable: true },
                    { label: 'Total', field: 'total', align: 'right', sortable: true },
                    { label: 'Status', component: 'order-status-badge', align: 'center', sortable: false },
                    { label: 'Action', component: 'action-btn', align: 'center', sortable: false },

                ],

            }
        },
        created(){
            this.getOrderStatus();
        },
        mounted(){
            this.getOrderList(this.reqData).then(response=>{
                if(typeof response.code !== "undefined" && response.code === 200){
                    this.orders = this.orderList;
                    this.per_page= this.reqData.paginate;
                }else{
                    alert(response.message);
                }
            })
        },
        methods:{
            ...mapActions([
                'getOrderList',
                'getOrderStatus'
            ]),

            sortBy(key) {

                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
                this.tableData.column = this.getIndex(this.columns, 'name', key);
                this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
                console.log(this.tableData);
                this.getProductsData();
            },
            getIndex(array, key, value) {
                return array.findIndex(i => i[key] == value)
            },
        },
        computed:{
            ...mapGetters([
                'orderList'
            ])
        }
    }
</script>

<style scoped>

</style>
