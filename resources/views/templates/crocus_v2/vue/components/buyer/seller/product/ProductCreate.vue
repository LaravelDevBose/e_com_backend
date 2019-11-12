<template>
    <section class="col-sm-9 wow bounceInUp animated">
        <form  @submit.prevent="manipulateAddressBook">
            <fieldset class="group-select">
                <fieldset>
                    <legend>Address Book</legend>
                    <ul>
                        <li>
                            <div class="customer-name">
                                <div class="input-box name-firstname">
                                    <label for="billing_firstname"> Product Name <span class="required">*</span> </label>
                                    <br>
                                    <input type="text" id="billing_firstname" v-model="formData.product_name" title="First Name" class="input-text required-entry">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="customer-name">
                                <div class="input-box name-lastname">
                                    <label for="category"> Category <span class="required">*</span> </label>
                                    <br>
                                    <treeselect v-model="formData.category_id" id="category"  :options="treeList" :multiple="false" :normalizer="normalizer" />
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="brand">Brand <span class="required">*</span></label>
                                <br>
                                <vue-select2 v-model="formData.brand_id" id="brand" :options="brandList"> </vue-select2>
                            </div>
                            <div class="input-box">
                                <label for="condition">Product Condition <span class="required">*</span></label>
                                <br>
                                <vue-select2 v-model="formData.product_condition" id="condition" :options="conditionList"> </vue-select2>
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="highlight">Highlight <span class="required">*</span></label>
                                <br>
                                <vue-editor id="highlight" v-model="formData.highlight"></vue-editor>
                            </div>
                            <div class="input-box">
                                <label for="description">Description <span class="required">*</span></label>
                                <br>
                                <vue-editor id="description" v-model="formData.description"></vue-editor>
                            </div>
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
    // import the component
    import Treeselect from '@riophae/vue-treeselect';
    import { VueEditor } from "vue2-editor";
    // import the styles
    import '@riophae/vue-treeselect/dist/vue-treeselect.css';
    import {mapGetters, mapActions} from 'vuex';
    import VueSelect2 from '../../../../../../../../js/components/helper/Select2';
    import ImageCropper from "../../../../../../../../js/components/cropper/ImageCropper";
    export default {
        name: "ProductCreate",
        components:{
            ImageCropper,
            Treeselect,
            'vue-select2':VueSelect2,
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
            }
        },
        mounted(){
            this.getProductCreateDependency();
        },
        methods:{
            ...mapActions([
                'getProductCreateDependency',
            ])
        },
        computed:{
            ...mapGetters([
                'brandList',
                'treeList',
                'conditionList'
            ])
        }
    }
</script>

<style scoped>

</style>
