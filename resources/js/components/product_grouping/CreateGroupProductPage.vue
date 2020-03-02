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
                                <vue-select2 :options="groupTypes" v-model.number="formData.group_type" >
                                    <option value="">Select A Option</option>
                                </vue-select2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Categories:</label>
                                <treeselect v-model="categoryIDs" :multiple="true" :options="treeList" :normalizer="normalizer" />
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <div class="form-group">
                                <label>Status:</label>
                                <label class="checkbox-style" for="paypal_payment">
                                    <span class="text-bold text-success" v-if="formData.status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="paypal_payment" v-model="formData.status"  :checked="formData.status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel" v-if="categoryProducts.length > 0">
                <div class="panel-heading bg-info">
                    <h5 class="panel-title">Sorted Product List</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th style="width: 25%">Product Name</th>
                            <th class="d-sm-none">Product Sku</th>
                            <th class="text-center d-sm-none">Category</th>
                            <th class="text-center d-sm-none">Brand</th>
                            <th class="text-center d-sm-none">Quantity</th>
                            <th class="text-center">Expired</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product, index) in categoryProducts" :key="index">
                            <td>
                                <product-checkbox :row="product"></product-checkbox>
                            </td>
                            <td>
                                <img :src="product.thumbnail.image_path" :alt="product.product_title" style="max-height: 50px;">
                            </td>
                            <td>
                                <span>{{ product.product_title}}</span>
                            </td>
                            <td class="d-sm-none">
                                <span>{{ product.sku}}</span>
                            </td>
                            <td class="text-center d-sm-none">
                                <span>{{ product.category.name}}</span>
                            </td>
                            <td class="text-center d-sm-none">
                                <span v-if="product.brand">{{ product.brand.name}}</span>
                            </td>
                            <td class="text-center d-sm-none">
                                <span>{{ product.total_qty}}</span>
                            </td>
                            <td class="text-center">
                                <product-group-expired :row="product"></product-group-expired>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-9">
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
