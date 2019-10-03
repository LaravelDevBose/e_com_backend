<template>
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Product Size Group List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
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
                                <datatable class="table-bordered table-striped" :columns="columns" :data="products" :filter-by="filter"></datatable>
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
    import  Vue from 'vue'
    Vue.component('product-status', {
        template: `<div>
                        <span v-if="row.status == 1" class="badge badge-success">{{ row.status_label }}</span>
                        <span v-else-if="row.status == 2" class="badge badge-warning">{{ row.status_label }}</span>
                        <span v-else class="badge badge-default">{{ row.status_label }}</span>
                    </div>`,
        props: ['row'],
    });
    Vue.component('product-thumb', {
        template: `<img :src="row.thumbnail.image_path" :alt="row.product_title"  style="width:90px; height:90px">`,
        props: ['row'],
    });

    Vue.component('product-action', {
        template: `<ul class="icons-list">
                        <li><a href="#" class="text text-primary-700" @click.prevent="goToDetailsPage(row.product_slug)"><i class="icon-eye"></i></a :href=""></li>
                        <li><a href="#" class="text text-info" @click.prevent="goToEditPage(row.product_slug)"><i class="icon-pencil7"></i></a></li>
                        <li><a href="#" class="text text-danger" @click.prevent="showDeletePopUp(row.product_slug)"><i class="icon-trash"></i></a></li>
                    </ul>`,
        props: ['row'],
        methods: {
            goToDetailsPage: function(slug){
                window.location = '/admin/product/'+slug;
            },
            goToEditPage:function (ID) {
                window.location = '/admin/product/'+slug+'/edit';
            },
            showDeletePopUp:function (ID) {

            }
        },
    });

    import VueSelect2 from '../helper/Select2';
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "ProductList",
        components:{
          'vue-select2':VueSelect2,
        },
        data(){
            return {
                page: 1,
                per_page: 10,
                products:'',
                filter: '',
                rows:'',
                columns: [
                    { label: '#', field: 'index', align: 'center', filterable: false, sortable:false },
                    { label: 'Image', component: 'product-thumb', align: 'center', sortable: false },
                    { label: 'Product Name', field: 'product_title',  },
                    { label: 'Product SKU', field: 'sku' , },
                    { label: 'Category', field: 'category.name' },
                    { label: 'Brand', field: 'brand.name', sortable: true },
                    { label: 'Quantity', field: 'total_qty', align: 'center', sortable: true },
                    { label: 'Status', component: 'product-status', align: 'center', sortable: false },
                    { label: 'Action', component: 'product-action', align: 'center', sortable: false },

                ],
                perPages: [
                    {id:5, text:5},
                    {id:10, text:10},
                    {id:25, text:25},
                    {id:50, text:50},
                    {id:100, text:100},
                ]
            }
        },
        created() {
            this.getProductsData();
        },
        methods:{
            ...mapActions([
                'getProducts'
            ]),

            getProductsData(){
                let vm = this;
                vm.getProducts().then(response=>{
                    vm.products = response.data.data;
                    vm.rows = vm.products;

                })
            },
            configPagination(data) {
                this.pagination.lastPage = data.last_page;
                this.pagination.currentPage = data.current_page;
                this.pagination.total = data.total;
                this.pagination.lastPageUrl = data.last_page_url;
                this.pagination.nextPageUrl = data.next_page_url;
                this.pagination.prevPageUrl = data.prev_page_url;
                this.pagination.from = data.from;
                this.pagination.to = data.to;
            },
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

            ])
        }

    }
</script>

<style scoped>
    .table > thead > tr > th>.sort{
        float: right!important;
    }
</style>
