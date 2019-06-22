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
                <div class="panel" style="display: none;">
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
                <div class="panel" style="display: none;">
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
                </div >
                <div class="panel" style="display: none;">
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
                        <div v-for="i in total" :key="i">
                            <div class="form-group row">
                                <label class="col-lg-2 control-label">Color:</label>
                                <div class="col-lg-4" @click="priIdIndex(i)">
                                    <vue-select2 v-model="pri_id[i]" :options="productColors"> </vue-select2>
                                </div>
                                <div class="col-lg-1">
                                    <span class="text-danger"> <i class="icon-trash"></i></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label">Images:</label>
                                <div class="col-lg-10" >
                                    <div id="productImage">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="file" class="hidden" ref="files" accept="image/*" :multiple="multi_file" :id="pri_id[i]"   @change="uploadImage">
                                                    <label :for="pri_id[i]" @click="addPriId(pri_id[i])" class="btn btn-info btn-md btn-block"><i class="icon-file-media text-left"></i> Select File</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" v-if="productImages">
                                            <div class="col-xs-4 col-sm-4 col-lg-1" v-for="(image, index) in productImages.filter(img=> img.pri_id === pri_id[i])" :key="image.id" >
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <img :src="image.img" alt="">
                                                        <div class="caption-overflow">
                                                            <span>
                                                                <a :href="image.img" data-fancybox="images"  class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-eye"></i></a>
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
                            <label class="col-lg-2 control-label">Size:</label>
                            <div class="col-lg-4 selectMulti">
                                <multi-select2 v-model="sec_id"  :options="sizes" >
                                    <option disabled value="0">Select one</option>
                                </multi-select2>
                            </div>
                        </div>

                        <div class="row" >
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
                                            <tr v-if="variations" v-for="(variation, index) in variationsData" :key="index">
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
                                                        <li><a href="#" class="text-info" data-toggle="modal" data-target="#modal_mini"><i class="icon-gift"></i></a></li>
                                                        <li><a href="#" class="text-danger"><i class="icon-trash"></i></a></li>
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
    import VueSelect2 from '../helper/Select2';
    import MultiSelect2 from '../helper/MultipleSelect2';
    import SummerNote from '../helper/SummerNote';
    import WysiHtml from '../helper/WysiHtml';

    export default {
        name: "CreateProduct",
        components:{
            Treeselect,
            'vue-select2':VueSelect2,
            'summer-note':SummerNote,
            'wysi-html':WysiHtml,
            'multi-select2':MultiSelect2,
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
                    pri_model:'Color',
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
                'getProductCreateDependency',
                'uploadProductImage',
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
            changeVariationTableData(newPriID,oldPriID){
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
            generateVariationTableData(newPriID){
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

            addNewVariationData(newVal, oldVal){

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
            removeVariationData(newVal, oldVal){
                let vm = this;
                let oldSize = oldVal.filter(value=>{
                    if(jQuery.isEmptyObject(newVal)|| !newVal.includes(value)){
                        return value;
                    }
                });
                if(!jQuery.isEmptyObject(this.variationsData)){
                    vm.variationsData.filter(variation=> variation.size_id == oldSize[0]).forEach(variation=>{
                            let index = vm.variations.indexOf(variation);
                            vm.$delete(vm.variations,index);
                            console.log(this.variationsData);

                    });

                }
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
            ]),
            clonedPrimaryIds(){
                return JSON.parse(JSON.stringify(this.pri_id));
            },
            clonedSecondaryIds(){
                return JSON.parse(JSON.stringify(this.sec_id));
            },
            variationsData(){
                // return this.variations;
                return _.orderBy(this.variations, 'color_name')
            }
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
                            this.changeVariationTableData(newVal[this.pri_id_index], oldVal[this.pri_id_index]);
                        }else{
                            this.generateVariationTableData(newVal[this.pri_id_index]);
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
                    if(jQuery.isEmptyObject(oldVal) || newVal.length > oldVal.length){
                        this.addNewVariationData(newVal, oldVal);
                    }else if(jQuery.isEmptyObject(newVal) || newVal.length < oldVal.length ){
                        this.removeVariationData(newVal, oldVal);
                    }
                }
            },
            'formData.category_id':{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.getProductCreateDependency(this.formData.category_id);
                    }
                },
                deep:true,
            },

        },

    }
</script>

<style scoped>

</style>




