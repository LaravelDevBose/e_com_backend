<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Shop List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="form-inline" style="margin:1em;">
                                <div class="form-group">
                                    <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                                </div>
                            </div>
                            <div id="table">
                                <datatable class="table-bordered table-striped" :columns="columns" :data="shopList" :filter-by="filter"></datatable>
                            </div>
                            <div class="form-inline">
                                <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import  Vue from 'vue';
    Vue.component('shop-logo', {
        template: `<img  v-if="row.shop && row.shop.shop_logo" :src="row.shop.shop_logo.image_path" :alt="row.shop.shop_name" class="img img-responsive" style="max-width:50px; max-height:50px">`,
        props: ['row'],
    });

    Vue.component('total-product', {
        template: `<span>{{ row.products.length }}</span>`,
        props: ['row'],
    });
    Vue.component('total-sell', {
        template: `<span>{{ row.order_items.length }}</span>`,
        props: ['row'],
    });

    Vue.component('shop-status', {
        template: `<div class="btn-group">
                        <span  class="label dropdown-toggle"
                            :class="{'bg-success':row.seller_status == 1, 'bg-primary':row.seller_status == 2, 'bg-warning':row.seller_status == 3, 'bg-danger':row.seller_status == 4 }"
                            data-toggle="dropdown" aria-expanded="false">
                            {{ row.status_label }}
                            <span v-if="row.seller_status != 2  && row.seller_status != 6" class="caret"></span>
                        </span>
                        <div>
                            <ul v-if="shopStatus" class="dropdown-menu dropdown-menu-right">
                              <li v-for="(status, index) in shopStatus" :key="index" v-if="row.seller_status != index">
                                  <a href="#" @click.prevent="changeShopStatus(row.seller_id, index)">
                                    <span
                                    class="status-mark position-left"
                                    :class="{'bg-success':index == 1, 'bg-primary':index == 2, 'bg-warning':index == 3, 'bg-danger':index == 4 }"
                                    ></span> {{ status }}
                                  </a>
                              </li>
                            </ul>
                        </div>
                    </div>`,
        props: ['row'],
        methods:{
            ...mapActions([
                'shopStatusChange',
            ]),
            changeShopStatus(sellerId, status){
                //TODO use nice Global Modal For Confirm Action

                let conf = confirm('Are You Sure Want To change Shop Status.?');
                if(!conf){
                    return false;
                }
                let reqData={
                    sellerId:sellerId,
                    status:status
                };
                this.shopStatusChange(reqData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message)
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'shopStatus'
            ])
        }
    });
    Vue.component('seller-action', {
        template: `<ul class="icons-list">
<!--                        <li><a href="#" class="text text-primary" @click.prevent="goToShopDetails(row.seller.seller_id)"><i class="icon-eye"></i></a></li>-->
                        <li><a href="#" class="text text-danger" @click.prevent="deleteShop(row.seller_id)"><i class="icon-trash"></i></a></li>
                    </ul>`,
        props: ['row'],
        methods: {
            ...mapActions([
                'shopDelete'
            ]),
            goToShopDetails: function(ID){
                window.location = `/admin/shop/${ID}`;
            },
            deleteShop(Id){
                let conf = confirm('Are You Sure Want To Delete.?');
                if(!conf){
                    return false;
                }
                this.shopDelete(Id)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }

        },
    });

    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "ShopListPage",
        data(){
            return{
                page: 1,
                per_page: 10,
                filter: '',
                rows:'',
                columns: [
                    { label: 'ID', field: 'shop.shop_id', align: 'center', filterable: true, sortable:true },
                    { label: 'Logo', component: 'shop-logo', align: 'center', filterable: false, sortable:false },
                    { label: 'Shop Name', field: 'shop.shop_name', sortable: true},
                    { label: 'Seller Name', field: 'seller_name',},
                    { label: 'Shop Email', field: 'shop_email'},
                    { label: 'Contact No', field: 'phone_no', sortable: false },
                    { label: 'Total Product', component: 'total-product', align: 'center', sortable: true },
                    { label: 'Total Sell', component: 'total-sell', align: 'center', sortable: true },
                    { label: 'Status', component: 'shop-status', align: 'center', sortable: true },
                    { label: 'Action', component: 'seller-action', align: 'center', sortable: false },

                ],
                reqData:{},
            }
        },
        created(){
            this.getShopStatus();
        },
        mounted(){
            this.getShopList(this.reqData);
        },
        methods:{
            ...mapActions([
                'getShopList',
                'getShopStatus',
            ])
        },
        computed:{
            ...mapGetters([
                'shopList',
                'paginate'
            ])
        }
    }
</script>

<style scoped>

</style>
