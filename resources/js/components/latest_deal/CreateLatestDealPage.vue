<template>
    <div class="content">
        <form action="" @submit.prevent="storeLatestDealProducts">
            <div class="panel">
                <div class="panel-heading bg-indigo-800">
                    <h5 class="panel-title">Add Latest Deal Products</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Categories:</label>
                                <treeselect v-model="categoryIDs" :multiple="true" :options="treeList" :normalizer="normalizer" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Start Date:</label>
                                <datetime
                                    type="datetime"
                                    use12-hour
                                    v-model="formData.start_time"
                                    input-id="startDate"
                                    input-class="form-control"
                                    :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                    :week-start="6"
                                >
                                </datetime>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Expired Date:</label>
                                <datetime
                                    type="datetime"
                                    use12-hour
                                    v-model="formData.end_time"
                                    input-id="endDate"
                                    input-class="form-control"
                                    :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                    :week-start="6"
                                >
                                </datetime>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading bg-success">
                    <h5 class="panel-title">Added Products</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div id="table1">
                                    <datatable class="table-bordered table-striped" :columns="addedColumns" :data="dealProducts"></datatable>
                                </div>
                                <div class="form-inline">
                                    <datatable-pager v-model="addedPage" type="abbreviated" :per-page="per_page"></datatable-pager>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading bg-primary">
                    <h5 class="panel-title">Category Wish Products</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <div id="table">
                                    <datatable class="table-bordered table-striped" :columns="columns" :data="categoryProducts" :filter-by="filter"></datatable>
                                </div>
                                <div class="form-inline">
                                    <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3" style="float:right; margin-top: 1rem;">
                            <div class="form-group" style="margin-bottom:0px;">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success btn-block">
                                    <span v-if="!latestDeal"> Update Latest Deal </span>
                                    <span v-else> Save Latest Deal </span>
                                    <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import '@riophae/vue-treeselect/dist/vue-treeselect.css';
    import Treeselect from '@riophae/vue-treeselect';
    import {mapActions, mapGetters} from 'vuex';
    import ProductThumbImg from "../helper/table/ProductThumbImg";
    import DealProductThumb from "./DealProductThumb";
    import LatestDealAction from "./LatestDealAction"
    export default {
        name: "CreateLatestDealPage",
        components:{
            Treeselect,
            'deal-product-thumb': DealProductThumb,
            'product-thumb-img': ProductThumbImg,
            'latest-deal-action': LatestDealAction
        },
        data(){
            return{
                formData:{
                    start_time:'',
                    end_time:'',
                    status:1,
                    productIds:[],
                },
                categoryIDs:[],
                normalizer(node) {
                    return {
                        id: node.id,
                        label: node.label,
                        children: node.children,
                    }
                },
                btnDisabled:false,
                page: 1,
                addedPage: 1,
                per_page: 10,
                filter: '',
                rows:'',
                addedColumns: [
                    { label: 'Image', component: 'deal-product-thumb', align: 'left', headerClass:'pro-img', sortable: false },
                    { label: 'Product Name', field: 'product.product_name',  },
                    { label: 'Product SKU', field: 'product.product_sku' , },
                    { label: 'Category', field: 'product.category.name' },
                    { label: 'Brand', field: 'product.brand.name', sortable: true },
                    { label: 'Quantity', field: 'product.total_qty', align: 'center', sortable: true },
                    { label: 'Remove', component: 'latest-deal-action', align: 'center', sortable: false },
                ],
                columns: [
                    { label: '#', align: 'center', component: 'product-checkbox', headerClass:'table-checkbox', filterable: false, sortable:false },
                    { label: 'Image', component: 'product-thumb-img', align: 'left', headerClass:'pro-img', sortable: false },
                    { label: 'Product Name', field: 'product_title',  },
                    { label: 'Product SKU', field: 'sku' , },
                    { label: 'Category', field: 'category.name' },
                    { label: 'Brand', field: 'brand.name', sortable: true },
                    { label: 'Quantity', field: 'total_qty', align: 'center', sortable: true },
                ],
            }
        },
        created(){
            this.allTreeListCategories();
            this.getLatestDealData();
        },
        methods:{
            ...mapActions([
                'allTreeListCategories',
                'categoryWishProducts',
                'getLatestDealData',
                'storeUpdateLatestDeal'
            ]),
            storeLatestDealProducts(){

                if(this.selectedProIds.length > 0){
                    this.formData.productIds = this.selectedProIds;
                }

                this.storeUpdateLatestDeal(this.formData)
                    .then(response=>{
                        console.log(response);
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            setTimeout(()=>{
                                location.reload();
                            }, 700);

                        }else if(response.code === 400 || response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'treeList',
                'categoryProducts',
                'selectedProIds',
                'latestDeal',
                'dealProducts'
            ]),
            categoryDataCheck(){
                return JSON.parse(JSON.stringify(this.categoryIDs));
            },
            selectedProIdCheck(){
                return JSON.parse(JSON.stringify(this.selectedProIds));
            },
            latestDealCheck(){
                return JSON.parse(JSON.stringify(this.latestDeal));
            },
        },
        watch:{
            categoryDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.categoryWishProducts({'categoryIds':this.categoryIDs})
                    }
                },
                deep:true,
            },
            selectedProIdCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        // this.updateSelectedDateTime();
                    }
                },
                deep:true,
            },
            latestDealCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        let startTime = this.latestDeal.start_time.split(' ');
                        let endTime = this.latestDeal.end_time.split(' ');

                        this.formData.start_time = startTime[0]+'T'+startTime[1]+'.0000Z';
                        // this.formData.end_time = endTime[0]+'T'+endTime[1]+'.0000Z';
                        this.formData.status = this.latestDeal.status;
                        this.formData.end_time = this.latestDeal.end_time;
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
