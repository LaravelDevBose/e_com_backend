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
                    <datatable class="table table-bordered table-striped" :columns="columns" :data="order_items" :filter-by="filter"></datatable>
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

    Vue.component('thumb-image', {
        template: `<img :src="row.product.thumb_image.image_path" :alt="row.product_name"  style="width:100%; height:auto;">`,
        props: ['row'],
    });

    Vue.component('status-badge', {
        template: `<div class="btn-group">
                        <span  class="label  dropdown-toggle"
                            :class="{'bg-info':row.item_status == 1, 'bg-danger':row.item_status == 2, 'bg-warning':row.item_status == 3, 'bg-primary':row.item_status == 4, 'bg-indigo-400':row.item_status == 5, 'bg-teal':row.item_status == 6 }"
                            data-toggle="dropdown" aria-expanded="false">
                            {{ row.item_status_label }}
                            <span v-if="row.item_status != 2  && row.item_status != 6" class="caret"></span>
                        </span>
                        <div v-if="row.item_status != 2 && row.item_status != 6" >
                            <ul v-if="itemStatusList" class="dropdown-menu dropdown-menu-right">
                              <li v-for="(status, index) in itemStatusList" v-if="row.item_status != index">
                                  <a href="#" @click.prevent="changeOrderItemStatus(row.item_id, index)">
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
                'orderItemStatusChange'
            ]),
            changeOrderItemStatus(itemId, itemStatus){
                //TODO use nice Global Modal For Confirm Action

                let conf = confirm('Are You Sure Want To change Order Status.?');
                if(!conf){
                    return false;
                }
                this.orderItemStatusChange({item_id:itemId, item_status:itemStatus})
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            alert(response.message);
                        }else{
                            alert(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'itemStatusList'
            ])
        }

    });
    Vue.component('order-product-info', {
        template: `<div><a href="#" @click.prevent="showProduct(row.product.product_slug)" class="text-semibold">{{ row.product_name }}</a>
            <div class="text-muted text-size-small">
                <span class="icon-qrcode bg-grey position-left"></span>
                    {{ row.product.product_sku }}
            </div></div>`,
        props: ['row'],
        methods:{
            showProduct(product_slug){

            }
        }
    });


    export default {
        name: "OrderListTable",
        props:['reqData'],
        data(){
            return {
                page: 1,
                per_page:10,
                order_items:'',
                filter: '',
                rows:'',
                columns: [
                    { label: 'Image', component: 'thumb-image', align: 'center', sortable: false },
                    { label: 'Product Name', component: 'order-product-info' },
                    { label: 'Order No', field: 'order.order_no'},
                    { label: 'Order Date', field: 'order.order_date', filterable: true, sortable:true },
                    { label: 'Buyer', field: 'buyer.user.full_name' , filterable: true, sortable:true },
                    { label: 'Brand', field: 'brand.brand_name', filterable: true, sortable:true },
                    { label: 'Price', field: 'price', align: 'right',},
                    { label: 'Quantity', field: 'qty', align: 'right',  },
                    { label: 'Total', field: 'total_price', align: 'right', sortable: true },
                    { label: 'Status', field: 'item_status', component: 'status-badge', align: 'center', sortable: true }
                ],

            }
        },
        created(){
            this.getOrderItemStatus();
        },
        mounted(){
            this.getOrderItemList(this.reqData).then(response=>{
                if(typeof response.code !== "undefined" && response.code === 200){
                    this.order_items = this.orderItemList;
                    this.per_page= this.reqData.paginate;
                }else{
                    alert(response.message);
                }
            })
        },
        methods:{
            ...mapActions([
                'getOrderItemList',
                'getOrderItemStatus'
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
                'orderItemList'
            ])
        }
    }
</script>

<style scoped>

</style>
