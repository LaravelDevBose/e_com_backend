<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-info">
                <h5 class="panel-title">Sorted Product List</h5>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Categories:</label>
                            <treeselect v-model="categoryIDs" :multiple="true" :options="treeList" :normalizer="normalizer" />
                        </div>
                    </div>
                </div>
            </div>
            <form action="" @submit.prevent="storeDiscountProducts">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th style="width: 25%">Product Name</th>
                            <th class="text-center d-sm-none">Category</th>
                            <th class="text-center d-sm-none">Quantity</th>
                            <th class="text-center d-sm-none">Prices</th>
                            <th class="text-center">Discount</th>
                            <th class="text-center">Start At</th>
                            <th class="text-center">Expire At</th>
                        </tr>
                        </thead>
                        <tbody v-if="categoryProducts.length > 0">
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
                            <td class="text-center d-sm-none">
                                <span>{{ product.category.name}}</span>
                            </td>
                            <td class="text-center d-sm-none">
                                <span>{{ product.total_qty}}</span>
                            </td>
                            <td>
                                <span v-for="(variation, ind) in product.variations" :key="ind">
                                    {{ variation.price }} <b v-if="product.variations.length !== (ind+1)">/</b>
                                </span>
                            </td>
                            <td class="text-center" style="width: 100px;">
                                <discount-percent :productId="product.id"></discount-percent>
                            </td>
                            <td class="text-center" >
                                <discount-product-start-date :productId="product.id"></discount-product-start-date>
                            </td>
                            <td class="text-center">
                                <discount-product-expired :productId="product.id"></discount-product-expired>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-9">
                            <div class="text-right form-group" style="margin-bottom:0px;">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success btn-block">Save Discount Products <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import '@riophae/vue-treeselect/dist/vue-treeselect.css';
import Treeselect from '@riophae/vue-treeselect';
import {mapActions, mapGetters} from 'vuex';
import DiscountProductExpired from './DiscountProductExpired';
import DiscountProductStartDate from './DiscountProductStartDate';
import ProductCheckbox from "./ProductCheckbox";
import DiscountPercent from "./DiscountPercent";
export default {
    name: "AddDiscountProduct",
    components:{
        Treeselect,
        'discount-product-expired':DiscountProductExpired,
        'discount-product-start-date':DiscountProductStartDate,
        'product-checkbox': ProductCheckbox,
        'discount-percent': DiscountPercent,
    },
    data(){
        return{
            formData:{
                productIds:[],
                expiredAts:[],
                discounts:[],
                start_dates:[],
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
    },
    methods:{
        ...mapActions([
            'allTreeListCategories',
            'categoryWishProducts',
            'discountProductsStore',
        ]),
        storeDiscountProducts(){
            if(this.selectedProIds.length <= 0){
                Notify.warning('Products Not Selected');
                return false;
            }
            if(this.selectedProIds.length !== this.selectedExpireAts.length){
                Notify.warning('In Some Selected Product have no Expired Time');
                return false;
            }
            if(this.selectedProIds.length !== this.selectedStartDates.length){
                Notify.warning('In Some Selected Product have no Start Date');
                return false;
            }
            if(this.selectedProIds.length !== this.selectedPercents.length){
                Notify.warning('In Some Selected Product have no Discount Value');
                return false;
            }

            this.formData.productIds = this.selectedProIds;
            this.formData.expiredAts = this.selectedExpireAts;
            this.formData.start_dates = this.selectedStartDates;
            this.formData.discounts = this.selectedPercents;
            this.discountProductsStore(this.formData)
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
            'categoryProducts',
            'selectedProIds',
            'selectedExpireAts',
            'selectedStartDates',
            'selectedPercents',
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
