<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal">
                <h5 class="panel-title">Product List</h5>
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
    import VueSelect2 from '../helper/Select2';
    import {mapGetters, mapActions} from 'vuex';
    import ProductThumbImg from "../helper/table/ProductThumbImg";
    import ProductAction from "../helper/table/ProductAction";
    import ProductStatus from "../helper/table/ProductStatus";
    export default {
        name: "ProductList",
        components:{
            'vue-select2':VueSelect2,
            'product-thumb-img':ProductThumbImg,
            'product-action':ProductAction,
            'product-status':ProductStatus,
        },
        data(){
            return {
                page: 1,
                per_page: 10,
                filter: '',
                rows:'',
                columns: [
                    { label: 'Image', component: 'product-thumb-img', align: 'center', sortable: false },
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
            this.getProducts();
            this.getProductStatusList();
        },
        methods:{
            ...mapActions([
                'getProducts',
                'getProductStatusList'
            ]),
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
                'products',
            ])
        }

    }
</script>

<style scoped>
    .table > thead > tr > th>.sort{
        float: right!important;
    }
</style>
