<template>
    <div id="CreateProduct">
        <div class="content">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5 class="panel-title">What You're Selling</h5>
                </div>

                <div class="panel-body">

                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Product Name: <span class="text text-danger text-bold h4">*</span> </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" v-model="formData.product_name"  placeholder="product name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 control-label">Parent Category: <span class="text text-danger text-bold h4">*</span></label>
                        <div class="col-lg-10">
                            <treeselect v-model="formData.category_id"  :options="treeList" :multiple="false" :normalizer="normalizer" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-4 control-label">Brand:</label>
                                <div class="col-lg-8">
                                    <vue-select2 v-model="formData.brand_id" :options="brandList"> </vue-select2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Product Type: <span class="text text-danger text-bold h4">*</span></label>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="radio-inline" >
                                            <input type="radio" name="product_type" :value="1" v-model="formData.product_type"  class="styled" checked="checked">
                                            Simple Product
                                        </label>
                                        <label class="radio-inline" >
                                            <input type="radio" name="product_type" :value="2" v-model="formData.product_type"  class="styled">
                                            Variation Product
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="cat_Selected && loading === 0">
                <div class="panel" >
                    <div class="panel-heading bg-teal-700">
                        <h5 class="panel-title">Basic Information</h5>
                    </div>

                    <div class="panel-body">
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Highlights: <span class="text text-danger text-bold h4">*</span></label>
                            <div class="col-lg-10">
                                <vue-editor id="highlight" v-model="formData.highlight"></vue-editor>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Product Description: <span class="text text-danger text-bold h4">*</span></label>
                            <div class="col-lg-10">
                                <vue-editor id="description" v-model="formData.description"></vue-editor>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-4 control-label">Package Weight (kg): <span class="text text-danger text-bold h4">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="number" v-model="formData.package_weight" class="form-control"  step="0.01">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-3 control-label">Package Dimensions (cm): <span class="text text-danger text-bold h4">*</span></label>
                                    <div class="col-lg-3">
                                        <input type="number" v-model="formData.package_height" placeholder="height" class="form-control" step="0.01">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="number" v-model="formData.package_width" placeholder="width" class="form-control" step="0.01">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="number" v-model="formData.package_length" placeholder="length" class="form-control" step="0.01">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-4 control-label">Product Thumb Image: <span class="text text-danger text-bold h4">*</span></label>
                                    <div class="col-lg-8">
                                        <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-2 control-label">Video Url:</label>
                                    <div class="col-lg-10">
                                        <input type="text" v-model="formData.video_url" class="form-control" maxlength="255">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel panel-collapsed" >
                    <div class="panel-heading bg-purple-400">
                        <h5 class="panel-title">Product Info in English</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body" style="display: none;">

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Product Name EN:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.lang_product_name" class="form-control"  placeholder="product name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Highlights EN:</label>
                            <div class="col-lg-10">
                                <vue-editor id="lang_highlight" v-model="formData.lang_highlight"></vue-editor>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Description EN:</label>
                            <div class="col-lg-10">
                                <vue-editor id="lang_description" v-model="formData.lang_description"></vue-editor>
                            </div>
                        </div>

                    </div>
                </div >
                <div class="panel panel-collapsed" >
                    <div class="panel-heading bg-indigo-600">
                        <h5 class="panel-title">More Product Details</h5>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body" style="display: none;">
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Warranty Type:</label>
                            <div class="col-lg-10">
                                <label class="radio-inline" v-if="warrantyTypes" v-for="(warranty, index) in warrantyTypes" :key="index">
                                    <input type="radio" v-model="formData.warranty_type" name="warrantyType"  class="styled" :value="index" >
                                    {{ warranty }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Warranty Period:</label>
                            <div class="col-lg-10">
                                <input type="number" v-model="formData.warranty_period" class="form-control" maxlength="2" placeholder="Total Number of Days" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Warranty Policy:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.warranty_policy" class="form-control" maxlength="255" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Warranty Policy EN:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.warranty_policy_eng" class="form-control" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Dangers Goods:</label>
                            <div class="col-lg-10">
                                <label class="radio-inline"  v-if="dangersGoods" v-for="(dangersGood ,index) in dangersGoods" :key="index">
                                    <input type="checkbox" :id="'dng'+index" v-model="formData.dangers_goods"  class="styled" :value="index">
                                    {{ dangersGood }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">What's in box:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.what_in_box" class="form-control" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Main Material:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.main_materials" class="form-control"  placeholder="Main Material" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Product Model:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.product_model" class="form-control"  placeholder="Product Model" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Number of pieces:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.num_of_pieces" class="form-control"  placeholder="Number of Pieces" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Color Shade/Number:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.color_shade" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Skin Type:</label>
                            <div class="col-lg-10">
                                <vue-select2 v-model="formData.skin_type" :options="skinTypes"> </vue-select2>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Extra Details:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.extra_details" class="form-control" maxlength="255" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning" v-if="formData.product_type === 1">
                    <div class="panel-heading">
                        <h5 class="panel-title">Product SKU information</h5>
                    </div>

                    <div class="panel-body">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label class="col-lg-3 control-label">Seller SKU: <span class="text text-danger text-bold h4">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" v-model="formData.seller_sku" class="form-control"  placeholder="Seller Sku">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label class="col-lg-4 control-label">Product Qty: <span class="text text-danger text-bold h4">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="number" v-model="formData.product_qty" class="form-control" placeholder="Product qty">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label class="col-lg-4 control-label">Product Price: <span class="text text-danger text-bold h4">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="number" v-model="formData.product_price" class="form-control" placeholder="product price" >
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 control-label">Images: <span class="text text-danger text-bold h4">*</span></label>
                            <div class="col-lg-11" >
                                <div id="simProductImg">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="file" class="hidden" ref="files" accept="image/*" :multiple="multi_file"  id="simpleProductImg"  @change="uploadImage">
                                                <label for="simpleProductImg" class="btn btn-info btn-md btn-block"><i class="icon-file-media text-left" ></i> Select File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" v-if="product.product_type === 1 && proImages.length !== 0">
                                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2" v-for="(editImage,index) in proImages" :key="index" >
                                            <div class="thumbnail">
                                                <div class="thumb">
                                                    <img :src="editImage.image.image_path" alt="" class="img-thumbnail img-responsive">
                                                    <div class="caption-overflow">
                                                        <span>
                                                            <a
                                                                href="#"
                                                                @click.prevent="removeProductImage(editImage.id)"
                                                                class="btn btn-danger border-danger text-white  btn-icon btn-rounded"
                                                            >
                                                                <i class="icon-trash"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" v-if="productImages">
                                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2" v-for="image in productImages" :key="image.id" >
                                            <div class="thumbnail">
                                                <div class="thumb">
                                                    <img :src="image.img" alt="" class="img-thumbnail img-responsive">
                                                    <div class="caption-overflow">
                                                        <span>
                                                            <a
                                                                href="#"
                                                                @click.prevent="removeAttachment(image.id)"
                                                                class="btn btn-danger border-danger text-white  btn-icon btn-rounded"
                                                            >
                                                                <i class="icon-trash"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning" v-if="formData.product_type === 2">
                    <div class="panel-heading">
                        <h5 class="panel-title">Product SKU information</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6" style="border-right: 2px solid #eee;">
                                <div v-for="i in total" :key="i" :id="i">
                                    <div class="form-group row">
                                        <label class="col-lg-3 control-label">Color: <span class="text text-danger text-bold h4">*</span></label>
                                        <div class="col-lg-6" @click="priIdIndex(i)">
                                            <vue-select2 v-model="pri_id[i]" :value="pri_id[i]" :name="'primaryIds'" :options="productColors"> </vue-select2>
                                        </div>
                                        <div class="col-lg-1" >
                                            <span class="text-danger" @click="removePriIdData(i)"> <i class="icon-trash"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group row" v-show="pri_id[i]">
                                        <label class="col-lg-3 control-label">Images: <span class="text text-danger text-bold h4">*</span></label>
                                        <div class="col-lg-9" >
                                            <div id="productImage">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="file" class="hidden" ref="files" accept="image/*" :multiple="multi_file"  :id="vari_id+pri_id[i]"  @change="uploadImage">
                                                            <label :for="vari_id+pri_id[i]" @click="addPriId(pri_id[i])" class="btn btn-info btn-md btn-block"><i class="icon-file-media text-left" ></i> Select File</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" v-if="productImages">
                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3" v-for="(image, index) in productImages.filter(img=> img.pri_id === pri_id[i])" :key="image.id" >
                                                        <div class="thumbnail">
                                                            <div class="thumb">
                                                                <img :src="image.img" alt="">
                                                                <div class="caption-overflow">
                                                                    <span>
                                                                        <a
                                                                            href="#"
                                                                            @click.prevent="removeAttachment(image.id)"
                                                                            class="btn btn-danger border-danger text-white  btn-icon btn-rounded"
                                                                        >
                                                                            <i class="icon-trash"></i>
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label">Size: <span class="text text-danger text-bold h4">*</span></label>
                                    <div class="col-lg-9 selectMulti">
                                        <multi-select2 v-model="sec_id"  :options="sizes" >
                                            <option disabled value="0">Select one</option>
                                        </multi-select2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">Previous Product Images: </label>
                                <div class="row" v-if="proImages">
                                    <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2" v-for="(proImage, index) in proImages" :key="proImage.id" >
                                        <div class="thumbnail">
                                            <div class="thumb">
                                                <img :src="proImage.image.image_path" alt="">
                                                <div class="caption-overflow">
                                                    <span>
                                                        <a
                                                            href="#"
                                                            @click.prevent="removeProductImage(proImage.id)"
                                                            class="btn btn-danger border-danger text-white  btn-icon btn-rounded"
                                                        >
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row" >
                            <div class="col-md-12">
                                <div class="table-responsive" style="border:1px solid #ddd">
                                    <table class="table table-striped table-sm">
                                        <thead style="background-color: #f5f2f2;">
                                        <tr>
                                            <td class="col-md-1">Availability <span class="text text-danger text-semibold">*</span></td>
                                            <td class="col-md-2">Color Family <span class="text text-danger text-semibold">*</span></td>
                                            <td class="col-md-1">Size <span class="text text-danger text-semibold">*</span></td>
                                            <td class="col-md-3">Seller SKU <span class="text text-danger text-semibold">*</span></td>
                                            <td class="col-md-1">Quantity <span class="text text-danger text-semibold">*</span></td>
                                            <td class="col-md-2">Price <span class="text text-danger text-semibold">*</span></td>
                                            <td class="col-md-2 text-center">Remove</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-if="variations" v-for="(variation, index) in variations" :key="index">
                                            <td>
                                                <div class="checkbox checkbox-switchery">
                                                    <label>
                                                        <input type="checkbox" class="switchery" v-model="variations[index].status" :checked="variation.status">
                                                        <span class="text-success text-bold" v-if="variation.status">Active</span>
                                                        <span class="text-danger text-bold" v-else>Inactive</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <span v-html="variation.color_name"></span>
                                            </td>
                                            <td>
                                                <span v-html="variation.size_name"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" maxlength="255" v-model="variations[index].seller_sku">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" v-model="variations[index].qty" >
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" step="0.01" v-model="variations[index].price">
                                            </td>
                                            <td class="text-center">
                                                <ul class="icons-list">
                                                    <li v-if="variation.hasOwnProperty('id')">
                                                        <a href="#" @click.prevent="removeVariationFromTable(variation.id)" class="text-danger">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </li>
                                                    <li v-else>
                                                        <a href="#" @click.prevent="removeVariationData(index)" class="text-danger">
                                                            <i class="icon-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-submit-btn" >
                    <div class="panel panel-default">
                        <div class="panel-body" >
                            <div class="row">
                                <div class="col-md-2">

                                </div>

                                <div class="col-md-2 col-md-offset-6">
                                    <div class="form-group">
                                        <label class="checkbox-style" for="paypal_payment">
                                            <span class="text-bold text-success" v-if="formData.product_status">Active</span>
                                            <span class="text-bold text-warning" v-else>Inactive</span>
                                            <input type="checkbox" id="paypal_payment" v-model="formData.product_status"  :checked="formData.product_status">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-right form-group" style="margin-bottom:0px;">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-success btn-block" @submit.prevent="updateProduct"  @click.prevent="updateProduct">Update Product <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import the component
    import Treeselect from '@riophae/vue-treeselect';
    import { VueEditor } from "vue2-editor";
    // import the styles
    import '@riophae/vue-treeselect/dist/vue-treeselect.css';
    import {mapGetters, mapActions} from 'vuex';
    import VueSelect2 from '../helper/Select2';
    import MultiSelect2 from '../helper/MultipleSelect2';
    import ImageCropper from "../cropper/ImageCropper";

    export default {
        name: "EditProduct",
        props:{
            productid:[Number],
            editdata:{
                type:[Object],
                default:{},
            }
        },
        components:{
            ImageCropper,
            Treeselect,
            'vue-select2':VueSelect2,
            'multi-select2':MultiSelect2,
            VueEditor,
        },
        data(){
            return {
                formData:{
                    product_id:'',
                    category_id:'',
                    brand_id:'',
                    product_name:'',
                    highlight:'',
                    description:'',
                    lang_product_name:'',
                    lang_highlight:'',
                    lang_description:'',
                    dangers_goods:[],
                    what_in_box:'',
                    package_weight:'',
                    package_length:'',
                    package_width:'',
                    package_height:'',
                    delivery_cost1:'',
                    delivery_cost2:'',
                    product_status:false,
                    warranty_type:'',
                    video_url:'',
                    main_materials:'',
                    product_model:'',
                    num_of_pieces:'',
                    product_occasion:'',
                    color_shade:'',
                    skin_type:'',
                    extra_details:'',
                    gift_product_id:'',
                    warranty_policy:'',
                    warranty_policy_eng:'',
                    warranty_period:'',
                    pri_model:'Color',
                    variations:'',
                    imageIds:'',
                    thumb_id:'',
                    product_type:1,
                    product_qty:1,
                    product_price:1,
                    seller_sku:'',
                },
                variations:[],
                btnDisabled:false,
                multiple:true,
                folder:'product',
                multi_file:true,
                normalizer(node) {
                    return {
                        id: node.id,
                        label: node.label,
                        children: node.children,
                    }
                },
                total:1,
                pri_id_total:0,
                priId:'',
                pri_id:{},
                sec_id:{},
                pri_id_index:'',
                cat_Selected:false,
                cropperData:{
                    width:400,
                    height:400,
                    placeholder:'Choose a image in 400X400',
                    file_size:1,
                    init_image:'',
                    folder:'thumbnail',
                    serial:1,
                },
                removeImage:false,
                vari_id:'variaction_',
                editImages:[],
                loading:1,
            }
        },
        created() {
            if(this.productid !== ''){
                this.formData.product_id= this.productid;
                this.formData.category_id= this.editdata.category_id;
                this.formData.product_type= this.editdata.product_type;
            }

            this.allTreeListCategories();
            this.getBrandList();
        },
        mounted(){
            if(this.productid !== ''){
                this.singleProduct(this.productid);
            }
            this.getProductCreateNeedData();
        },
        methods:{
            ...mapActions([
                'singleProduct',
                'allTreeListCategories',
                'getBrandList',
                'getProductCreateDependency',
                'uploadProductImage',
                'updateProductData',
                'getProductCreateNeedData',
                'deleteProductImage',
                'attachmentImageRemove',
                'variationDataDelete'
            ]),
            addPriId(PriID){
                this.priId = PriID;
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
                formData.append('pri_id', this.priId);

                let vm = this;
                setTimeout(()=>{
                    vm.uploadProductImage(formData);
                },1000);

            },
            priIdIndex(index){
                this.pri_id_index = index;
            },
            changeImageData(newPriID,oldPriID){
                if(!jQuery.isEmptyObject(this.productImages)){
                    this.productImages.filter(img=>img.pri_id ===oldPriID).forEach(image=>{
                        if(image.pri_id === oldPriID){
                            let index = this.productImages.indexOf(image);
                            this.$delete(this.productImages,index);
                            let data ={
                                'pri_id':newPriID,
                                'img':image.img,
                                'id':image.id,
                                'no':image.no,
                                'delete_url':image.delete_url,
                            };

                            this.productImages.push(data);
                        }
                    });
                    this.imageIds.filter(img=> img.pri_id === oldPriID).forEach(imageID=>{
                        let index = this.imageIds.indexOf(imageID);
                        this.$delete(this.imageIds,index);
                        let data ={
                            'pri_id':newPriID,
                            'image_id':imageID.image_id,
                        };

                        this.imageIds.push(data);
                    });
                }
            },
            changeVariationPriIDWish(newPriID,oldPriID){
                let vm = this;
                let color = '';
                this.productColors.filter(pColor=>{
                    if(pColor.id == parseInt(newPriID)){
                        color = pColor.text;
                    }
                });

                if(!jQuery.isEmptyObject(vm.variations)){
                    vm.variations.filter(variation=> variation.color_id === oldPriID).forEach(variation=>{
                        let index = vm.variations.indexOf(variation);

                        vm.$delete(vm.variations,index);
                        let data ={
                            color_id:newPriID,
                            color_name:color,
                            size_id:variation.size_id,
                            size_name:variation.size_name,
                            seller_sku:variation.seller_sku,
                            qty:variation.qty,
                            price:variation.price,
                            gift_product:variation.gift_product,
                            status:variation.status,
                        };
                        vm.variations.push(data);
                    });
                }
            },
            addVariationPriIDWish(newPriID){
                let vm = this;
                let color = '';
                this.productColors.filter(pColor=>{
                    if(pColor.id == parseInt(newPriID)){
                        color = pColor.text;
                    }
                });

                if(!jQuery.isEmptyObject(this.sec_id)){
                    for (let key in this.sec_id) {
                        let size = vm.sizes.find(element=> element.id == parseInt(this.sec_id[key]));
                        let data ={
                            color_id:newPriID,
                            color_name:color,
                            size_id:size.id,
                            size_name:size.text,
                            seller_sku:'',
                            qty:'',
                            price:'',
                            gift_product:'',
                            status:1,
                        };

                        vm.variations.push(data);
                    }
                }
            },

            addNewVariationSizeWish(newVal, oldVal){

                if(typeof newVal === "undefined" &&  newVal.length === 0){
                    return;
                }
                let newSize = newVal.filter(value=>{
                    if(jQuery.isEmptyObject(oldVal)|| !oldVal.includes(value)){
                        return value;
                    }
                });

                let size = this.sizes.find(element=> element.id == newSize);

                if(!jQuery.isEmptyObject(this.pri_id)){
                    for (let key in this.pri_id) {
                        let color = this.productColors.find(element=> element.id == this.pri_id[key]);
                        let data ={
                            color_id:color.id,
                            color_name:color.text,
                            size_id:size.id,
                            size_name:size.text,
                            seller_sku:'',
                            qty:'',
                            price:'',
                            gift_product:'',
                            status:1,
                        };

                        this.variations.push(data);
                    }
                }
            },
            removeVariationSizeWish(newVal, oldVal){
                let vm = this;
                let oldSize = oldVal.filter(value=>{
                    if(jQuery.isEmptyObject(newVal)|| !newVal.includes(value)){
                        return value;
                    }
                });
                if(!jQuery.isEmptyObject(this.variations)){
                    vm.variations.filter(variation=> variation.size_id == oldSize[0]).forEach(variation=>{
                            let index = vm.variations.indexOf(variation);
                            vm.$delete(vm.variations,index);
                    });

                }
            },
            removeVariationData(index){
                this.$delete(this.variations,index);
            },
            removePriIdData(index){

                let PRIID = this.pri_id[index];
                if(PRIID){
                    //remove pri id from Pri_id
                    this.$delete(this.pri_id, index);
                    $('#'+index).empty();
                    this.pri_id_total--;

                    //remove images
                    if(!jQuery.isEmptyObject(this.productImages)){
                        this.productImages.filter(img=>img.pri_id ===PRIID).forEach(image=>{
                            if(image.pri_id === PRIID){
                                let index = this.productImages.indexOf(image);
                                this.$delete(this.productImages,index);
                            }
                        });
                        this.imageIds.filter(img=> img.pri_id === PRIID).forEach(imageID=>{
                            let index = this.imageIds.indexOf(imageID);
                            this.$delete(this.imageIds,index);
                        });
                    }

                    //remove variation Table data
                    if(!jQuery.isEmptyObject(this.variations)){
                        this.variations.filter(variation=> variation.color_id == PRIID).forEach(variation=>{
                            let index = this.variations.indexOf(variation);
                            this.$delete(this.variations,index);
                        });

                    }
                }

            },
            updateProduct(){
                // TODO Form Validation

                //Button Disable
                this.btnDisabled = true;

                // append variation data and images ids in form Data
                if(this.cropImageIds.lenght !== 0){
                    this.formData.thumb_id = this.cropImageIds[0];
                }

                if(this.variations.length !== 0 &&  this.formData.product_type === 2){
                    this.formData.variations = this.variations;
                }

                if(this.imageIds.lenght !== 0){
                    this.formData.imageIds = this.imageIds;
                }

                //send Vuex request
                this.updateProductData(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            Notify.success(response.message);
                            this.removeImage = true;

                            setTimeout(function () {
                                window.location = response.url;
                            },2000);
                        }else if(response.status === "validation"){
                            Notify.validation(response.message);
                        }else if(response.status === "error"){
                            Notify.error(response.message);
                        }else {
                            Notify.info(response.message);
                        }
                    }).catch(error=>{
                    Notify.error(error.message);
                })

            },
            emptyPrvData(){
                this.imageIds.length=0;
                this.productImages.length=0;
                this.priId = '';
                this.pri_id.length = 0;
                this.variations.length=0;
                this.total=1;
                this.pri_id_total=0;
                this.priId='';
                this.pri_id.length=0;
                this.pri_id={};
                this.sec_id.length=0;
                this.sec_id={};
                this.pri_id_index='';
                this.formData.product_qty='';
                this.formData.product_price='';
                this.formData.seller_sku='';
                if(this.formData.variations.length > 0){
                    this.formData.variations.length=0;
                }

                if(this.formData.imageIds.length > 0){
                    this.formData.imageIds.length=0;
                }
            },
            removeProductImage(imageId){
                let conf = confirm('Are You Sure.?');
                if(!conf){
                    return false;
                }

                this.deleteProductImage(imageId)
                .then(response=>{
                    if(response.code === 200){
                        Notify.success(response.message);
                    }else if(response.status === "validation"){
                        Notify.validation(response.message);
                    }else if(response.status === "error"){
                        Notify.error(response.message);
                    }else {
                        Notify.info(response.message);
                    }
                })
            },
            removeAttachment(attachmentId){
                let conf = confirm('Are You Sure.?');
                if(!conf){
                    return false;
                }

                this.attachmentImageRemove(attachmentId)
                    .then(response=>{
                        if(response.code === 200){
                            Notify.success(response.message);
                        }else if(response.status === "validation"){
                            Notify.validation(response.message);
                        }else if(response.status === "error"){
                            Notify.error(response.message);
                        }else {
                            Notify.info(response.message);
                        }
                    })
            },
            removeVariationFromTable(variationId){
                let conf = confirm('Are You Sure ?');
                if(!conf){
                    return false;
                }
                let reqData = {
                    product_id:this.productid,
                    variation_id:variationId,
                };

                this.variationDataDelete(reqData)
                    .then(response=>{
                        if(response.code === 200){
                            this.variations = this.variations.filter(variation=>{
                                if(variation.hasOwnProperty('id')){
                                    return variation.id !== variationId;
                                }
                            });

                            Notify.success(response.message);
                        }else if(response.status === "validation"){
                            Notify.validation(response.message);
                        }else if(response.status === "error"){
                            Notify.error(response.message);
                        }else {
                            Notify.info(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'treeList',
                'brandList',
                'warrantyTypes',
                'dangersGoods',
                'productColors',
                'sizes',
                'productImages',
                'imageIds',
                'skinTypes',
                'cropImageIds',
                'productType',
                'product',

                'proData',
                'proDetails',
                'proVariations',
                'proImages'
            ]),
            clonedPrimaryIds(){
                return JSON.parse(JSON.stringify(this.pri_id));
            },
            clonedSecondaryIds(){
                return JSON.parse(JSON.stringify(this.sec_id));
            },
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
            productDataCheck(){
                return JSON.parse(JSON.stringify(this.proData));
            },

        },
        watch:{
            clonedPrimaryIds:{
                handler(newVal, oldVal){
                    let pri_count=0;
                    for(var key in newVal){
                        pri_count++;
                    }
                    if(newVal[this.pri_id_index] !== oldVal[this.pri_id_index]){
                        if(typeof oldVal[this.pri_id_index] !== "undefined"){
                            this.changeImageData(newVal[this.pri_id_index], oldVal[this.pri_id_index]);
                            this.changeVariationPriIDWish(newVal[this.pri_id_index], oldVal[this.pri_id_index]);
                        }else{
                            this.addVariationPriIDWish(newVal[this.pri_id_index]);
                        }

                    }

                    if(pri_count > this.pri_id_total){
                        this.total ++;
                        this.pri_id_total++;
                    }
                },
                deep:true,
            },
            clonedSecondaryIds:{
                handler(newVal, oldVal){

                    if(!jQuery.isEmptyObject(newVal) && (jQuery.isEmptyObject(oldVal) || newVal.length > oldVal.length)){
                        this.addNewVariationSizeWish(newVal, oldVal);
                    }else if(jQuery.isEmptyObject(newVal) && !jQuery.isEmptyObject(newVal) || newVal.length < oldVal.length ){
                        this.removeVariationSizeWish(newVal, oldVal);
                    }

                }
            },
            'formData.category_id':{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.emptyPrvData();
                        if(this.formData.product_type === 2 && this.loading === 0){
                            this.getProductCreateDependency(this.formData.category_id);
                        }
                    }

                    if(newValue.length !== 0){
                        this.cat_Selected = true;
                    }
                },
                deep:true,
            },
            'formData.product_type':{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.emptyPrvData();
                        if(this.formData.product_type === 2){
                            this.getProductCreateDependency(this.formData.category_id);
                        }
                    }
                },
                deep:true,
            },
            formDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.btnDisabled = false;
                    }

                }
            },
            productDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal && newVal !== ''){
                        /*** Product main Field ***/
                        this.formData.brand_id=this.proData.brand_id;
                        this.formData.product_name=this.proData.product_name;
                        this.formData.highlight=this.proData.highlight;
                        this.formData.description=this.proData.description;
                        this.formData.lang_product_name=this.proData.lang_product_name;
                        this.formData.lang_highlight=this.proData.lang_highlight;
                        this.formData.lang_description=this.proData.lang_description;
                        this.formData.dangers_goods=[];
                        this.formData.what_in_box=this.proData.what_in_box;
                        this.formData.package_weight=this.proData.package_weight;
                        this.formData.package_length=this.proData.package_length;
                        this.formData.package_width=this.proData.package_width;
                        this.formData.package_height=this.proData.package_height;
                        this.formData.product_status=this.proData.product_status;
                        this.formData.warranty_type=this.proData.warranty_type;
                        this.formData.video_url=this.proData.video_url;

                        /*** Product Details Information Field ***/
                        if(this.proDetails !== '' && this.proDetails !== null){
                            this.formData.main_materials=this.proDetails.materials;
                            this.formData.product_model=this.proDetails.model;
                            this.formData.num_of_pieces=this.proDetails.pieces;
                            this.formData.product_occasion=this.proDetails.occasion;
                            this.formData.color_shade=this.proDetails.color_shade;
                            this.formData.skin_type=this.proDetails.skin_type;
                            this.formData.extra_details=this.proDetails.extra_details;
                            this.formData.warranty_policy=this.proDetails.warranty_policy;
                            this.formData.warranty_policy_eng=this.proDetails.warranty_policy_eng;
                            this.formData.warranty_period=this.proDetails.warranty_period;
                        }

                        /*** Type Wish Simple Product Field  ***/
                        if (this.product.product_type === 1){

                            this.formData.product_qty = this.proData.product_qty;
                            this.formData.product_price = this.proData.product_price;
                            this.formData.seller_sku = this.proData.seller_sku;

                        }

                        /*** Type Wish Variation Product Field  ***/
                        if (this.proData.product_type === 2 && this.proVariations.length !== 0 && this.proVariations !== ''){
                            this.proVariations.forEach((value,key)=>{
                                this.variations.push({
                                    id:value.variation_id,
                                    color_id:value.pri_id,
                                    color_name:value.primary_model.color_name,
                                    size_id:value.sec_id,
                                    size_name:value.secondary_model.size_name,
                                    seller_sku:value.seller_sku,
                                    qty:value.quantity,
                                    price:value.price,
                                    status:1,
                                });
                            });
                        }

                        /*** Product Thumb Image ***/
                        if(this.proData.thumbImage !== '' && !jQuery.isEmptyObject(this.proData.thumbImage) ){
                            this.cropperData.init_image = this.proData.thumbImage.image_path;
                        }
                        this.loading = 0;
                        this.getProductCreateDependency(this.formData.category_id);
                    }

                }
            },
        },

    }
</script>

<style scoped>

</style>




