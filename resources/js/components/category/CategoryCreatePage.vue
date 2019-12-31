<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Category</h5>
                <div class="heading-elements">
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="manipulateCategoryData">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Parent Category:</label>
                                <treeselect v-model="formValue.parent_id" :options="treeList" :normalizer="normalizer" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category Name:</label>
                                <input type="text" v-model="formValue.category_name" class="form-control" placeholder="Category Name " required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Trans. Category Name:</label>
                                <input type="text" v-model="formValue.trans_category_name" class="form-control" placeholder="Trans. Category Name " required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Category Banner:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-5" v-if="!formValue.parent_id">
                            <div class="form-group">
                                <label>Homepage Section:</label>
                                <image-cropper :cropperData="SectionCropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="checkbox-style checkbox-inline" for="is_show">
                                    <span class="text-bold text-success" v-if="formValue.is_show">Show In Header</span>
                                    <span class="text-bold text-warning" v-else>Not Show In Header</span>
                                    <input type="checkbox" id="is_show" v-model="formValue.is_show" :checked="formValue.is_show">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="checkbox-style" for="status">
                                    <span class="text-bold text-success" v-if="formValue.category_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="status" v-model="formValue.category_status" :checked="formValue.category_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-right form-group">
                                <button type="submit" class="btn btn-primary" :disabled="btnDisabled">
                                    <span v-if="isedit === 1">Update Category </span>
                                    <span v-else>Save Category </span>
                                    <i class="icon-arrow-right14 position-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import '@riophae/vue-treeselect/dist/vue-treeselect.css';

    import { mapGetters, mapActions} from 'vuex'
    import ImageCropper from "../cropper/ImageCropper";
    import Treeselect from '@riophae/vue-treeselect';

    export default {
        name: "CategoryCreatePage",
        components:{ImageCropper, Treeselect},
        props:{
            categoryid:{
                type:[Number,String],
                default:''
            },
            isedit:{
                type:[Number,Boolean],
                default: false,
            }
        },
        data(){
            return{
                formValue:{
                    id:'',
                    parent_id:null,
                    category_name:null,
                    category_status:false,
                    banner_id:'',
                    is_show:false,
                    trans_category_name:'',
                    sect_banner_id:'',
                },
                normalizer(node) {
                    return {
                        id: node.id,
                        label: node.label,
                        children: node.children,
                    }
                },
                cropperData:{
                    width:1200,
                    height:400,
                    placeholder:'Choose a Banner image (1200 X 400)',
                    file_size:1.5,
                    init_image:'',
                    folder:'category',
                    modal_type:4,
                    modal_id:'banner_image',
                    serial:1,
                },
                SectionCropperData:{
                    width:386,
                    height:572,
                    placeholder:'Choose a Homepage Section Image (386X572)',
                    file_size:1.5,
                    init_image:'',
                    folder:'category',
                    modal_type:2,
                    modal_id:'section_image',
                    serial:2,
                },
                removeImage:false,
                btnDisabled:false,
            }
        },
        created(){
            this.getTreeListCategories();
            if(this.isedit){
                this.getCategoryData(this.categoryid)
            }
        },
        methods:{
            ...mapActions([
                'getTreeListCategories',
                'storeCategory',
                'updateCategory',
                'getCategoryData',
            ]),
            manipulateCategoryData(){
                let banner_id = $(`.${this.cropperData.modal_id}`).val();
                let section_id = $(`.${this.SectionCropperData.modal_id}`).val();
                if(typeof banner_id !== "undefined" && banner_id !== ''){
                    console.log(banner_id);
                    this.formValue.banner_id = banner_id;
                }

                if(typeof section_id !== "undefined" && section_id !== ''){
                    console.log(section_id);
                    this.formValue.sect_banner_id = section_id;
                }

                if(this.isedit){
                    this.updateCategory(this.formValue).then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 201){
                            Notify.success(response.message);
                            if(response.hasOwnProperty('url')){
                                location.href = response.url;
                            }
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    });
                }else{
                    this.storeCategory(this.formValue).then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 201){
                            Notify.success(response.message);
                            if(response.hasOwnProperty('url')){
                                location.href = response.url;
                            }
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    });
                }


            },
            emptyFormData(){
                this.formValue.parent_id = null;
                this.formValue.category_name = '';
                this.formValue.trans_category_name = '';
                this.formValue.category_status = false;
                this.formValue.banner_id = '';
                this.formValue.sect_banner_id = '';
                this.removeImage = true;
            }
        },
        computed:{
            ...mapGetters([
                'treeList',
                'category'
            ]),
            categoryCheck(){
                return JSON.parse(JSON.stringify(this.category));
            },
        },
        watch:{
            categoryCheck:{
                handler(newValue, oldValue){
                    if(newValue !==  oldValue){
                        this.formValue.id = this.category.id;
                        this.formValue.parent_id = this.category.parent_id;
                        this.formValue.category_name = this.category.name;
                        this.formValue.trans_category_name = this.category.trans_name;
                        if(this.category.status === 1){
                            this.formValue.category_status = true;
                        }
                        if(this.category.is_show === 1){
                            this.formValue.is_show = true;
                        }
                        if(this.category.attachment){
                            this.formValue.banner_id = this.category.banner_id;
                            this.cropperData.init_image = this.category.attachment.image_path;
                        }

                        if(this.category.parent_id === null && this.category.sectionBanner){
                            this.formValue.sect_banner_id = this.category.sect_banner_id;
                            this.SectionCropperData.init_image = this.category.sectionBanner.image_path;
                        }
                    }
                },deep:true,
            }
        }
    }
</script>

<style scoped>

</style>
