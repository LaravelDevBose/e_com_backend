<template>
    <section class="col-sm-9 wow bounceInUp animated">
        <form  @submit.prevent="manipulateProduct">
            <fieldset class="group-select">
                <fieldset>
                    <legend>Address Book</legend>
                    <ul>
                        <li>
                            <label for="billing_firstname"> Product Name <span class="required">*</span> </label>
                            <br>
                            <input type="text" id="billing_firstname" v-model="formData.product_name" title="First Name" class="input-text required-entry">
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="mainCategory"> Category <span class="required">*</span> </label>
                                    <br>
                                    <select class="address-select" v-model="formData.main_cat_id" @click.prevent="checkMainCat()" id="mainCategory" style="width:100%;">
                                        <option value="">Select A Category</option>
                                        <option v-if="mainCategories" v-for="(mainCat, index) in mainCategories" :key="index" :value="mainCat.id">{{ mainCat.label }}</option>
                                    </select>
                                </div>
                                <div v-if="secCategories.length !== 0" class="col-md-4">
                                    <label for="subCategory">2nd Category <span class="required">*</span> </label>
                                    <br>
                                    <select class="address-select" v-model="formData.sec_cat_id" @click.prevent="checkSecCat()" id="subCategory" style="width:100%;">
                                        <option value="">Select A Second Category</option>
                                        <option v-for="(secCat, index) in secCategories" :key="index" :value="secCat.id">{{ secCat.label }}</option>
                                    </select>
                                </div>
                                <div v-if="trdCategories.length !== 0" class="col-md-4">
                                    <label for="thrdCategory">3rd Category <span class="required">*</span> </label>
                                    <br>
                                    <select class="address-select" v-model="formData.trd_cat_id" id="thrdCategory" style="width:100%;">
                                        <option value="">Select A Third Category</option>
                                        <option v-for="(trdCat, index) in trdCategories" :key="index" :value="trdCat.id">{{ trdCat.label }}</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="brand">Brand <span class="required">*</span></label>
                                <br>
                                <select class="address-select" v-model="formData.brand_id" id="brand" style="width:90%;">
                                    <option value="">Select A Brand</option>
                                    <option v-if="brandList" v-for="(brand, index) in brandList" :key="index" :value="brand.id">{{ brand.text}}</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <label for="condition">Product Condition <span class="required">*</span></label>
                                <br>
                                <select class="address-select" v-model="formData.product_condition" id="condition" style="width:90%;">
                                    <option value="">Select A Product Condition</option>
                                    <option v-if="conditionList" v-for="(condition, index) in conditionList" :key="index" :value="condition.id">{{ condition.text }}</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label for="highlight">Highlight <span class="required">*</span></label>
                            <br>
                            <vue-editor id="highlight" v-model="formData.highlight"></vue-editor>
                        </li>
                        <li>
                            <label for="description">Description <span class="required">*</span></label>
                            <br>
                            <vue-editor id="description" v-model="formData.description"></vue-editor>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="qty">Product Qty<span class="required">*</span></label>
                                <br>
                                <input type="number" v-model="formData.postal_code" title="Zip/Postal Code" id="qty" class="input-text required-entry">
                            </div>
                            <div class="input-box">
                                <label for="price">Product Price<span class="required">*</span></label>
                                <br>
                                <input type="number" v-model="formData.postal_code" title="Zip/Postal Code" id="price" class="input-text required-entry">
                            </div>
                        </li>
                        <li>
                            <p class="require">
                                <em class="required">*</em>Required Fields
                            </p>
                            <button :disabled="btnDisabled" type="submit" class="button continue">
                                <span v-if="is_edit">Update Address</span>
                                <span v-else>Save Address</span>
                            </button>
                        </li>
                    </ul>
                </fieldset>
            </fieldset>
        </form>
    </section>
</template>

<script>

    import { VueEditor } from "vue2-editor";
    import {mapGetters, mapActions} from 'vuex';
    import ImageCropper from "../../../../../../../../js/components/cropper/ImageCropper";

    export default {
        name: "ProductCreate",
        components:{
            ImageCropper,
            VueEditor,
        },
        data(){
            return{
                formData:{
                    product_name:'',
                    category_id:'',
                    brand_id:'',
                    highlight:'',
                    description:'',
                    product_condition:'',
                    product_images:[],
                    thumb_id:'',
                    product_type:1,
                    product_qty:'',
                    product_price:'',
                    main_cat_id:'',
                    sec_cat_id:'',
                    trd_cat_id:'',
                },
                btnDisabled:false,
                is_edit:false,
                normalizer(node) {
                    return {
                        id: node.id,
                        label: node.label,
                        children: node.children,
                    }
                },
                mainCategories:[],
                secCategories:[],
                trdCategories:[],
            }
        },
        mounted(){
            this.getProductCreateDependency();
        },
        methods:{
            ...mapActions([
                'getProductCreateDependency',
            ]),
            checkMainCat(){
                this.mainCategories.filter(cat=>{
                    if(cat.id === this.formData.main_cat_id){
                        this.secCategories = cat.children;
                    }
                })

            },
            checkSecCat(){
                this.secCategories.filter(cat=>{
                    if(cat.id === this.formData.sec_cat_id){
                        this.trdCategories = cat.children;
                    }
                })
            },
            manipulateProduct(){

            }
        },
        computed:{
            ...mapGetters([
                'brandList',
                'treeList',
                'conditionList'
            ]),
            checkTreeListIds(){
                return JSON.parse(JSON.stringify(this.treeList));
            },
        },
        watch:{
            checkTreeListIds:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.mainCategories = this.treeList;
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>
