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

                        <div class="form-inline" style="margin:1em;">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="button" @click.prevent="updateProductStatus" class="btn btn-sm btn-success">
                                            <span>Publish</span>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                                    </div>
                                </div>
                                <div class="col-md-9 text-right">
                                    <div class="form-group">
                                        <button type="button" @click.prevent="selectDateRange('today')" class="btn btn-sm btn-flat border-teal">
                                            <span>Today</span>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" @click.prevent="selectDateRange('week')" class="btn btn-sm btn-flat border-teal">
                                            <span>This Week</span>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" @click.prevent="selectDateRange('month')" class="btn btn-sm btn-flat border-teal">
                                            <span>This Month</span>
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <datetime
                                            type="date"
                                            use12-hour
                                            v-model="dateRange.start_date"
                                            input-id="startDate"
                                            input-class="form-control"
                                            :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                        >
                                        </datetime>
                                    </div>
                                    <div class="form-group">
                                        <datetime
                                            type="date"
                                            use12-hour
                                            v-model="dateRange.end_date"
                                            input-id="endDate"
                                            input-class="form-control"
                                            :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                        >
                                        </datetime>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" @click.prevent="searchCustomDate" class="btn btn-sm btn-primary">
                                            <i class="icon-search4"></i>
                                            <span>Search</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="table" class="table-responsive">
                            <datatable class="table-bordered table-striped" :columns="columns" :data="unPublishProducts" :filter-by="filter"></datatable>
                        </div>
                        <div class="form-inline">
                            <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
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
    import ProductCheckbox from "../helper/table/ProductCheckbox";

    export default {
        name: "UnPublishProductList",
        components:{
            'vue-select2':VueSelect2,
            'product-thumb-img':ProductThumbImg,
            'product-action':ProductAction,
            'product-status':ProductStatus,
            'product-checkbox':ProductCheckbox,
        },
        data(){
            return {
                page: 1,
                per_page: 10,
                filter: '',
                columns: [
                    { label: '#', align: 'center', component: 'product-checkbox', headerClass:'table-checkbox', filterable: false, sortable:false },
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
                ],
                custom_date:false,
                formData:{
                    product_status:1,
                    productIds:[],
                },
                dateRange:{
                    date_range:'',
                    start_date:'',
                    end_date:'',
                }
            }
        },
        mounted(){
            this.getProductList();
        },
        methods:{
            ...mapActions([
                'getUnPublishProducts',
                'productsStatusUpdate',
            ]),
            selectDateRange(range){
                this.dateRange.date_range = range;
                if(range !== 'custom'){
                    this.dateRange.start_date = '';
                    this.dateRange.end_date = '';
                }
                this.getProductList();

            },
            searchCustomDate(){
                this.dateRange.date_range = 'custom';
                this.getProductList();
            },
            getProductList(){
                if(this.dateRange.date_range === 'custom'){
                    if(this.dateRange.start_date === ''){
                        Notify.error('Select Start Date');
                        return false;
                    }
                    if(this.dateRange.end_date === ''){
                        Notify.error('Select End Date');
                        return false;
                    }
                }
                this.getUnPublishProducts(this.dateRange);
            },
            updateProductStatus(){
                if(this.selectedProIds.length <= 0){
                    Notify.validation('Section Product Not Selected.')
                }else{
                    this.formData.productIds = this.selectedProIds;
                }
                this.productsStatusUpdate(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'unPublishProducts',
                'selectedProIds'
            ])
        },

    }
</script>

<style scoped>

</style>
