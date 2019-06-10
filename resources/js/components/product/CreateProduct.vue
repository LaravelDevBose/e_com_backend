<template>
    <div id="CreateProduct">
        <div class="content">
            <form action="" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">What You're Selling</h5>
                    </div>

                    <div class="panel-body">

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Product Name:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" v-model="formData.product_name"  placeholder="product name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Parent Category:</label>
                            <div class="col-lg-10">
                                <treeselect v-model="formData.category_id"  :options="treeList" :multiple="false" :normalizer="normalizer" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Brand:</label>
                            <div class="col-lg-10">
                                <vue-select2 v-model="formData.brand_id" :options="brandList"> </vue-select2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel" >
                    <div class="panel-heading bg-teal-700">
                        <h5 class="panel-title">Basic Information</h5>
                    </div>

                    <div class="panel-body">
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Highlights:</label>
                            <div class="col-lg-10">
                                <wysi-html v-model="formData.highlight"></wysi-html>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Product Description:</label>
                            <div class="col-lg-10">
                                <summer-note v-model="formData.description"></summer-note>
                            </div>
                        </div>
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
                                <vue-select2 v-model="formData.warranty_period" :options="brandList"> </vue-select2>
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
                                    <input type="checkbox" v-model="formData.dangers_goods" class="styled" :value="index">
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
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-4 control-label">Package Weight (kg):</label>
                                    <div class="col-lg-8">
                                        <input type="number" v-model="formData.package_weight" class="form-control"  step="0.01">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-lg-3 control-label">Package Dimensions (cm):</label>
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
                            <label class="col-lg-2 control-label">Video Url:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.video_url" class="form-control" maxlength="255">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading bg-purple-400">
                        <h5 class="panel-title">Product Info in English</h5>
                    </div>

                    <div class="panel-body">

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Product Name EN:</label>
                            <div class="col-lg-10">
                                <input type="text" v-model="formData.lang_product_name" class="form-control"  placeholder="product name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Highlights EN:</label>
                            <div class="col-lg-10">
                                <wysi-html v-model="formData.lang_highlight"></wysi-html>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Description EN:</label>
                            <div class="col-lg-10">
                                <summer-note v-model="formData.lang_description"></summer-note>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading bg-indigo-600">
                        <h5 class="panel-title">More Product Details</h5>
                    </div>

                    <div class="panel-body">
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
                                <vue-select2 v-model="formData.skin_type" :options="brandList"> </vue-select2>
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

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h5 class="panel-title">Product SKU information</h5>
                    </div>

                    <div class="panel-body">
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Color:</label>
                            <div class="col-lg-4">
                                <vue-select2 v-model="variation.pri_id" :options="productColors"> </vue-select2>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Product Model:</label>
                            <div class="col-lg-10">
                                <attachment :multi_file="multi_file" :folder="folder"></attachment>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Size:</label>
                            <div class="col-lg-4">
                                <vue-select2 v-model="variation.sec_id" :options="sizes" > </vue-select2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive" style="border:1px solid #ddd">
                                    <table class="table table-striped table-sm">
                                        <thead style="background-color: #f5f2f2;">
                                            <tr>
                                                <td class="col-md-1">Availability</td>
                                                <td class="col-md-2">Color Family</td>
                                                <td class="col-md-1">Size</td>
                                                <td class="col-md-3">SellerSKU</td>
                                                <td class="col-md-1">Quantity</td>
                                                <td class="col-md-2">Price</td>
                                                <td class="col-md-2 text-center">Extra</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-switchery">
                                                        <label>
                                                            <input type="checkbox"  class="switchery" checked>
                                                            <span class="text-success text-bold" >Active</span>
                                                            <!--                                                <span class="text-danger text-bold" >Inactive</span>-->
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>Red</span>
                                                </td>
                                                <td>
                                                    <span>35</span>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" maxlength="255" >
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control"  >
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" step="0.01" >
                                                </td>
                                                <td class="text-center">
                                                    <ul class="icons-list">
                                                        <li><a href="#" class="text-info" data-toggle="modal" data-target="#modal_mini"><i class="icon-gift"></i></a></li>
                                                        <li><a href="#" class="text-danger"><i class="icon-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="checkbox checkbox-switchery">
                                                        <label>
                                                            <input type="checkbox"  class="switchery" checked>
                                                            <span class="text-success text-bold" >Active</span>
                                                            <!--                                                <span class="text-danger text-bold" >Inactive</span>-->
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span>Red</span>
                                                </td>
                                                <td>
                                                    <span>35</span>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" maxlength="255" >
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" >
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" step="0.01" >
                                                </td>
                                                <td></td>
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
                                    <div class="text-right form-group" style="margin-bottom:0px;">
                                        <button type="submit" class="btn btn-info btn-block">Draft<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>

                                <div class="col-md-2 col-md-offset-6">
                                    <div class="content-group-lg"  style="margin-bottom:0!important;">
                                        <div class="checkbox checkbox-switchery">
                                            <label>
                                                <input type="checkbox"  class="switchery-primary" checked>
                                                <span class="text-success text-bold" >Active</span>
<!--                                                <span class="text-danger text-bold" >Inactive</span>-->
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-right form-group" style="margin-bottom:0px;">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-success btn-block">Save Product <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="modal_mini" class="modal fade">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Gift Item</h5>
                    </div>

                    <div class="modal-body">
                        <input type="text" class="form-control" maxlength="255" >
                        <p class="text-size-mini">*Only if applicable* Free merchandise, free items, free products, free gifts, free accessories or advertising gifts that come along with the package.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import the component
    import Treeselect from '@riophae/vue-treeselect';
    // import the styles
    import '@riophae/vue-treeselect/dist/vue-treeselect.css';
    import {mapGetters, mapActions} from 'vuex';
    import Attachment from "../attachment/Attachment";
    import VueSelect2 from '../helper/Select2';
    import SummerNote from '../helper/SummerNote';
    import WysiHtml from '../helper/WysiHtml';

    export default {
        name: "CreateProduct",
        components:{
            Attachment,
            Treeselect,
            'vue-select2':VueSelect2,
            'summer-note':SummerNote,
            'wysi-html':WysiHtml,
        },
        data(){
            return {
                formData:{
                    category_id:'',
                    brand_id:'',
                    product_name:'',
                    highlight:'',
                    description:'',
                    lang_product_name:'',
                    lang_highlight:'',
                    lang_description:'',
                    dangers_goods:'',
                    what_in_box:'',
                    package_weight:'',
                    package_length:'',
                    package_width:'',
                    package_height:'',
                    delivery_cost1:'',
                    delivery_cost2:'',
                    product_status:'',
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
                },
                variation:{
                    'pri_id':'',
                    'pri_model':'',
                    'sec_id':'',
                    'sec_model':'',
                },
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
            }
        },
        created() {
            this.allTreeListCategories();
            this.getBrandList();

        },
        methods:{
            ...mapActions([
                'allTreeListCategories',
                'getBrandList',
                'getProductCreateDependency'
            ]),
        },
        computed:{
            ...mapGetters([
                'treeList',
                'brandList',
                'warrantyTypes',
                'dangersGoods',
                'productColors',
                'sizes',
            ])
        },
        watch:{
            'formData.category_id':{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.getProductCreateDependency(this.formData.category_id);
                    }
                },
                deep:true,
            },
            variation:{
                handler(newValue, oldValue){
                    if(newValue === oldValue){
                        alert('yesss');
                    }
                },
                deep:true,
            }
        },

    }
</script>

<style scoped>

</style>




