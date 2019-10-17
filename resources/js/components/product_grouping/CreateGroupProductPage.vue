<template>
    <div class="content">
        <form action="" @submit.prevent="storeGroupProducts">
            <div class="panel">
                <div class="panel-heading bg-indigo-800">
                    <h5 class="panel-title">Add Group Products</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Group Type:</label>
                                <vue-select2 :options="groupTypes" v-model.number="formData.group_type" ></vue-select2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Categories:</label>
                                <treeselect v-model="categoryIDs" :multiple="true" :options="treeList" :normalizer="normalizer" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading bg-info">
                    <h5 class="panel-title">Add Section Products</h5>
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
                                    <datatable class="table-bordered table-striped" :columns="columns" :data="categoryProducts" :filter-by="filter"></datatable>
                                </div>
                                <div class="form-inline">
                                    <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-6">
                            <div class="content-group-lg"  style="margin-bottom:0!important;">
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox"  class="switchery-primary" :checked="formData.status">
                                        <span class="text-success text-bold" v-if="formData.status" >Active</span>
                                        <span class="text-danger text-bold" v-else>Inactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-right form-group" style="margin-bottom:0px;">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success btn-block">Save Section Product <i class="icon-arrow-right14 position-right"></i></button>
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
    import VueSelect2 from '../helper/Select2';
    import {mapActions, mapGetters} from 'vuex';
    import ProductGroupExpired from '../helper/table/ProductGroupExpired';
    import ProductGroupPosition from '../helper/table/ProductGroupPosition';

    export default {
        name: "CreateGroupProductPage",
        components:{
            'vue-select2':VueSelect2,
            Treeselect,
            'product-group-expired':ProductGroupExpired,
            'product-group-position':ProductGroupPosition
        },
        data(){
            return{
                formData:{
                    group_type:'',
                    productIds:[],
                    expiredAts:[],
                    position:[],
                    status:1,
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
                per_page: 10,
                filter: '',
                rows:'',
                columns: [
                    { label: '#', align: 'center', component: 'product-checkbox', headerClass:'table-checkbox', filterable: false, sortable:false },
                    { label: 'Image', component: 'product-thumb-img', align: 'left', headerClass:'pro-img', sortable: false },
                    { label: 'Product Name', field: 'product_title',  },
                    { label: 'Product SKU', field: 'sku' , },
                    { label: 'Category', field: 'category.name' },
                    { label: 'Brand', field: 'brand.name', sortable: true },
                    { label: 'Quantity', field: 'total_qty', align: 'center', sortable: true },
                    { label: 'Expired', component: 'product-group-expired', align: 'center', sortable: true },
                    // { label: 'Position', component: 'product-group-position', align: 'center', sortable: true },
                ],
            }
        },
        created(){
            this.allTreeListCategories();
            this.getGroupProductsDependency();
        },
        methods:{
            ...mapActions([
                'allTreeListCategories',
                'getGroupProductsDependency',
                'categoryWishProducts',
                'groupProductsStore',
            ]),
            storeGroupProducts(){
                this.formData.productIds = this.selectedProIds;
                this.formData.expiredAts = this.selectedDateTimes;

                if(this.selectedProIds.length <= 0){
                    Notify.warning('Products Not Selected');
                    return false;
                }
                if(this.selectedProIds.length !== this.selectedDateTimes.length){
                    Notify.warning('In Some Selected Product have no Expired Time');
                    return false;
                }

                this.groupProductsStore(this.formData)
                    .then(response=>{
                        console.log(response);
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            if(response.hasOwnProperty('url')){
                                setTimeout(()=>{
                                    location.href = response.url;
                                }, 700);
                            }
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
                'groupTypes',
                'categoryProducts',
                'selectedProIds',
                'selectedDateTimes',
            ]),
            categoryDataCheck(){
                return JSON.parse(JSON.stringify(this.categoryIDs));
            },
            selectedProIdCheck(){
                return JSON.parse(JSON.stringify(this.selectedProIds));
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
        }
    }
</script>

<style scoped>

</style>
