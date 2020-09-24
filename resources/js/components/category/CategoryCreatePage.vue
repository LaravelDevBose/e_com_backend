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
                        <div class="col-md-2" >
                            <div class="form-group">
                                <label>Category Show In:</label>
                                <label class="checkbox-style checkbox-inline" for="in_header">
                                    <span class="text-bold text-success" v-if="formValue.in_header">Show In Header</span>
                                    <span class="text-bold text-warning" v-else>Not Show In Header</span>
                                    <input type="checkbox" id="in_header" v-model="formValue.in_header" :checked="formValue.in_header">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Category Status:</label>
                                <label class="checkbox-style" for="status">
                                    <span class="text-bold text-success" v-if="formValue.category_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="status" v-model="formValue.category_status" :checked="formValue.category_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Category Banner:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-4" v-if="!formValue.parent_id">
                            <div class="form-group">
                                <label>Category Icon:</label>
                                <image-cropper :cropperData="iconCropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" :disabled="btnDisabled" style="margin-top: 2em;">
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
                    in_header:1,
                    icon_id:'',
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
                iconCropperData:{
                    width:100,
                    height:100,
                    placeholder:'Image (100X100)',
                    file_size:.5,
                    init_image:'',
                    folder:'category',
                    modal_type:2,
                    modal_id:'icon_image',
                    serial:3,
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
                let icon_id = $(`.${this.iconCropperData.modal_id}`).val();
                if(typeof banner_id !== "undefined" && banner_id !== ''){
                    this.formValue.banner_id = banner_id;
                }
                if(typeof icon_id !== "undefined" && icon_id !== ''){
                    console.log(icon_id);
                    this.formValue.icon_id = icon_id;
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
                this.formValue.category_status = false;
                this.formValue.banner_id = '';
                this.formValue.icon_id = '';
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
                        if(this.category.status === 1){
                            this.formValue.category_status = true;
                        }
                        if(this.category.in_header === 1){
                            this.formValue.in_header = true;
                        }
                        if(this.category.attachment){
                            this.formValue.banner_id = this.category.banner_id;
                            this.cropperData.init_image = this.category.attachment.image_path;
                        }

                        if(this.category.parent_id === null){
                            if(this.category.iconImage){
                                this.formValue.icon_id = this.category.iconImage.attachment_id;
                                this.iconCropperData.init_image = this.category.iconImage.image_path;
                            }
                        }
                    }
                },deep:true,
            }
        }
    }
</script>

<style scoped>

</style>
