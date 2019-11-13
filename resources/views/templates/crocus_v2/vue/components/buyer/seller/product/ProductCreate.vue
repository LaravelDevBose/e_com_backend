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
                            <input type="text" id="billing_firstname" v-model="formData.product_name" title="First Name" class="input-text required-entry" style="width:100%;">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="brand">Brand <span class="required">*</span></label>
                                    <br>
                                    <select class="address-select" v-model="formData.brand_id" id="brand" style="width:100%;">
                                        <option value="">Select A Brand</option>
                                        <option v-if="brandList" v-for="(brand, index) in brandList" :key="index" :value="brand.id">{{ brand.text}}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="condition">Product Condition <span class="required">*</span></label>
                                    <br>
                                    <select class="address-select" v-model="formData.product_condition" id="condition" style="width:100%;">
                                        <option value="">Select A Product Condition</option>
                                        <option v-if="conditionList" v-for="(condition, index) in conditionList" :key="index" :value="condition.id">{{ condition.text }}</option>
                                    </select>
                                </div>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="qty">Product Qty<span class="required">*</span></label>
                                    <br>
                                    <input type="number" v-model="formData.product_qty" title="qty" id="qty" class="input-text required-entry">
                                </div>
                                <div class="col-md-6">
                                    <label for="price">Product Price<span class="required">*</span></label>
                                    <br>
                                    <input type="number" v-model="formData.product_price" title="Price" id="price" class="input-text required-entry">
                                </div>
                            </div>
                        </li>
                        <li v-if="isedit ===1 || isedit === true">
                            <div class="row">
                                <div class="col-md-6">
                                    <img
                                        v-if="editProduct.thumbImage"
                                        :src="editProduct.thumbImage.image_path" alt="Product Thumb Image Not Found"
                                        class="img img-thumbnail img-responsive"
                                        style="max-height: 200px; max-width: 200px;"
                                    />
                                </div>
                                <div class="col-md-6">
                                    <div class="row" v-if="editProduct.productImages.length !== 0">
                                        <div class="col-xs-4 col-sm-4 col-lg-3" v-for="image in editProduct.productImages" :key="image.id" >
                                            <div class="thumb" style="margin-buttom:5px;">
                                                <img :src="image.image_path" alt="" class="img-responsive">
                                                <a href="#" @click.prevent="deleteProductImage()" class="text font-weight-bold close-btn">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="qty">Product Thumb Image<span class="required">*</span></label>
                                    <br>
                                    <image-cropper :cropperData="cropperData" :removeImage="removeImage" ></image-cropper>
                                </div>
                                <div class="col-md-6">
                                    <label for="qty">Product Thumb Image<span class="required">*</span></label>
                                    <br>
                                    <div id="simProductImg">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="file" class="hidden" ref="files" accept="image/*" :multiple="multi_file"  id="simpleProductImg"  @change="uploadImage">
                                                    <label for="simpleProductImg" class="btn btn-info btn-md btn-block"><i class="icon-file-media text-left" ></i> Select File</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" v-if="productImages.length !== 0">
                                            <div class="col-xs-4 col-sm-4 col-lg-3" v-for="image in productImages" :key="image.id" >
                                                <div class="thumb" style="margin-buttom:5px;">
                                                    <img :src="image.img" alt="" class="img-responsive">
                                                    <a href="#" @click.prevent="removeAttachment(image.id)" class="text font-weight-bold close-btn">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <li>
                            <p class="require">
                                <em class="required">*</em>Required Fields
                            </p>
                            <button :disabled="btnDisabled" type="submit" class="button continue">
                                <span v-if="isedit">Update Product</span>
                                <span v-else>Save Product</span>
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
        props:{
            productid:{
                type:[Number,String],
                default:'',
            },
            isedit:{
                type:[Boolean],
                default: false,
            }
        },
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
                    imageIds:[],
                    thumb_id:'',
                    product_type:1,
                    product_qty:'',
                    product_price:'',
                    main_cat_id:'',
                    sec_cat_id:'',
                    trd_cat_id:'',
                },
                btnDisabled:false,
                cropperData:{
                    width:400,
                    height:400,
                    placeholder:'Choose a image in 400X400',
                    file_size:1,
                    init_image:'',
                    folder:'thumbnail',
                },
                removeImage:false,
                mainCategories:[],
                secCategories:[],
                trdCategories:[],
                multi_file:true,
                folder:'product',
            }
        },
        created(){
            if(this.is_edit === 1 || this.is_edit === true){
                this.getEditProductInfo(this.productid);
            }
        },
        mounted(){
            this.getProductCreateDependency();
        },
        methods:{
            ...mapActions([
                'getProductCreateDependency',
                'uploadProductImage',
                'imageRemove',
                'storeIndividualSellerProduct',
                'getEditProductInfo'
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
                if(!this.formValidation()){
                    return false;
                }
                this.formData.thumb_id = this.cropImageIds[0];
                this.formData.imageIds = this.imageIds;
                this.storeIndividualSellerProduct(this.formData)
                     .then(response=>{
                         if(typeof response.code !== "undefined" && response.code === 201){
                             this.$noty.success(response.message);
                             if (response.hasOwnProperty('url')){
                                 setTimeout(()=>{
                                     location.href = response.url;
                                 }, 1500);
                             }
                         }else if(response.status === 'validation'){
                             this.$noty.warning(response.message);
                         }else{
                             this.$noty.error(response.message);
                         }
                     })
            },

            formValidation(){

                if(this.formData.main_cat_id === ''){
                    this.$noty.warning('Select Main Category');
                    return false;
                }
                if(this.formData.sec_cat_id === '' && this.secCategories.length !== 0){
                    this.$noty.warning('Select Second Category');
                    return false;
                }
                if(this.formData.trd_cat_id === '' && this.trdCategories.length !== 0){
                    this.$noty.warning('Select Third Category');
                    return false;
                }

                return true;
            },

            uploadImage(e) {
                let files = e.target.files || e.dataTransfer.files;
                let formData = '';
                formData = new FormData();
                for( var i = 0; i < files.length; i++ ){
                    let file = files[i];
                    formData.append(i, file);
                }
                formData.append('folder', this.folder);
                let vm = this;
                setTimeout(()=>{
                    vm.uploadProductImage(formData);
                },1000);

            },
            removeAttachment(imageId){
                console.log(imageId);
                this.imageRemove(imageId)
                    .then(response=>{
                        this.$noty.success('Image Removed');
                    })
            },
            deleteProductImage(){

            }
        },
        computed:{
            ...mapGetters([
                'brandList',
                'treeList',
                'conditionList',
                'productImages',
                'imageIds',
                'cropImageIds',
                'editProduct',
                'categoryInfo',
            ]),
            checkTreeListIds(){
                return JSON.parse(JSON.stringify(this.treeList));
            },
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
            editDataCheck(){
                return JSON.parse(JSON.stringify(this.editProduct));
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
            formDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.btnDisabled = false;
                    }

                }
            },
            editDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.formData.product_name = this.editProduct.product_name;
                        this.formData.brand_id = this.editProduct.brand_id;
                        this.formData.highlight = this.editProduct.highlight;
                        this.formData.description = this.editProduct.description;
                        this.formData.product_condition = this.editProduct.product_condition;
                        this.formData.product_type = this.editProduct.product_type;
                        this.formData.product_qty = this.editProduct.product_qty;
                        this.formData.product_price = this.editProduct.product_price;
                        this.formData.thumb_id = this.editProduct.thumb_id;
                        this.formData.main_cat_id = this.categoryInfo.main_cat_id;

                        if(this.categoryInfo.sec_cat_id !== ''){
                            this.formData.sec_cat_id = this.categoryInfo.sec_cat_id;
                        }
                        if(this.categoryInfo.trd_cat_id !== ''){
                            this.formData.trd_cat_id = this.categoryInfo.trd_cat_id;
                        }
                    }

                }
            },
        }
    }
</script>

<style scoped>
.close-btn{
    background-color: red;
    padding: 0 3px;
    color: #fff;
    position: absolute;
    top: 0px;
    right: 14px;
}
</style>
