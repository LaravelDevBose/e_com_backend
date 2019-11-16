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
        <invoice-modal-view></invoice-modal-view>
    </div>
</template>

<script>

    import {mapGetters, mapActions} from 'vuex';
    import InvoiceModalView from "../invoice/InvoiceModalView";

    Vue.component('order-status-badge', {
        template: `<div class="btn-group">
                        <span  class="label  dropdown-toggle"
                            :class="{'bg-info':row.order_status == 1, 'bg-danger':row.order_status == 2, 'bg-warning':row.order_status == 3, 'bg-primary':row.order_status == 4, 'bg-indigo-400':row.order_status == 5, 'bg-teal':row.order_status == 6 }"
                            data-toggle="dropdown" aria-expanded="false">
                            {{ row.status_label }}
                            <span v-if="row.order_status != 2  && row.order_status != 6" class="caret"></span>
                        </span>
                        <div v-if="row.order_status != 2 && row.order_status != 6" >
                            <ul v-if="statusList" class="dropdown-menu dropdown-menu-right">
                              <li v-for="(status, index) in statusList" v-if="row.order_status != index">
                                  <a href="#" @click.prevent="changeOrderStatus(row.order_no, index)">
                                    <span
                                    class="status-mark position-left"
                                    :class="{'bg-info':index == 1, 'bg-danger':index == 2, 'bg-warning':index == 3, 'bg-primary':index == 4, 'bg-indigo-400':index == 5, 'bg-teal':index == 6 }"
                                    ></span> {{ status }}
                                  </a>
                              </li>
                            </ul>
                        </div>
                    </div>`,
        props: ['row'],
        methods:{
            ...mapActions([
                'orderStatusChange'
            ]),
            changeOrderStatus(orderNo, status){
                //TODO use nice Global Modal For Confirm Action

                let conf = confirm('Are You Sure Want To change Order Status.?');
                if(!conf){
                    return false;
                }
                this.orderStatusChange({order_no:orderNo, status:status})
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'statusList'
            ])
        }

    });

    Vue.component('action-btn', {
        template: `<ul class="icons-list">
                        <li><a href="#" class="text text-primary-700" @click.prevent="showInvoiceModalView(row.order_no)"><i class="icon-file-eye"></i></a :href=""></li>
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
            showInvoiceModalView(order_no){
                this.getOrderInfo(order_no)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            $('#invoice').modal('show');
                        }else{
                            alert(response.message);
                        }

                    })
            },
            goToShowPage: function(orderNo){
                window.location = `/admin/order/${orderNo}/show`;
            }
        },
    });


    export default {
        name: "OrderListTable",
        components: {InvoiceModalView},
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
                    { label: 'Buyer', field: 'buyer.user.full_name' , filterable: true, sortable:true },
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
