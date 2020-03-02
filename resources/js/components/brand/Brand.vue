<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Brand</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="manipulateBrandData">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <div class="form-group">
                                <label>Brand Name:</label>
                                <input type="text" v-model="formData.brand_name" class="form-control" placeholder="Brand Name " required>
                            </div>
                            <div class="form-group">
                                <label>Trans. Brand Name:</label>
                                <input type="text" v-model="formData.trans_brand_name" class="form-control" placeholder="Somalia Brand Name " required>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-style" for="paypal_payment">
                                    <span class="text-bold text-success" v-if="formData.brand_status">Active</span>
                                    <span class="text-bold text-warning" v-else>Inactive</span>
                                    <input type="checkbox" id="paypal_payment" v-model="formData.brand_status"  :checked="formData.brand_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success">
                                    <span v-if="isedit">Update Brand</span>
                                    <span v-else>Save Brand</span>
                                    <i class="icon-arrow-right14 position-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brand Banner:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Brand List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="padding:5px;">Banner Image</th>
                        <th>Brand Name</th>
                        <th>Somalia Brand Name</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="brands" v-for="(brand , index) in brands" :key="brand.id">
                        <td>{{ index }}</td>
                        <td style="padding:5px; width:120px;">
                            <img v-if="brand.attachment" :src="brand.attachment.image_path" :alt="brand.name" class="img-preview img-responsive" style="width:100px; height:35px;" >
                        </td>
                        <td>
                            <span class="text text-bold"> {{ brand.name }}</span>
                        </td>
                        <td>
                            <span class="text text-bold" v-if="brand.trans_name"> {{ brand.trans_name }}</span>
                        </td>
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="brand.status === 1">Active</span>
                            <span class="badge badge-primary" v-else-if="brand.status === 3">Requested</span>
                            <span class="badge badge-warning" v-else>Inactive</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#" @click.prevent="editBrand(brand.id)"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="brandDelete(brand.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic table -->
    </div>
</template>

<script>
    import Attachment from "../attachment/Attachment";
    import {mapGetters, mapActions} from  'vuex';
    import ImageCropper from "../cropper/ImageCropper";

    export default {
        name: "Brand",
        components: {Attachment,ImageCropper},
        data(){
            return{
                formData:{
                    id:'',
                    trans_brand_name:'',
                    brand_name:'',
                    brand_status:'',
                    attachment_id:'',
                },
                cropperData:{
                    width:200,
                    height:200,
                    placeholder:'Choose a image in 200X200',
                    file_size:1,
                    init_image:'',
                    folder:'brand',
                    modal_type:1,
                },
                removeImage:false,
                btnDisabled:false,
                isedit:false,
            }
        },
        created() {
            this.getBrands();
        },
        methods:{
            ...mapActions([
                'getBrands',
                'storeBrand',
                'deleteBrand',
                'updateBrandInfo',
            ]),
            manipulateBrandData(){
                if(this.cropImageIds.length !== 0 && this.cropImageIds[0] !== ''){
                    this.formData.attachment_id = this.cropImageIds[0];
                }
                if(this.isedit){
                    this.updateBrandInfo(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                Notify.success(response.message);
                                this.isedit = false;
                                this.formReset();
                            }else if(response.status === "validation"){
                                Notify.validation(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                        .catch(error=>{
                            Notify.info(error.message);
                        })
                }else{
                    this.storeBrand(this.formData)
                        .then(response=>{
                            console.log(response);
                            if(response.status === "success"){
                                Notify.success(response.message);
                                this.formReset();
                            }else if(response.status === "validation"){
                                Notify.validation(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                        .catch(error=>{
                            Notify.info(error.message);
                        })
                }

            },
            formReset(){
                this.formData.brand_name='';
                this.formData.trans_brand_name='';
                this.formData.brand_status = false;
                this.formData.attachment_id = '';
                this.removeImage=true;
            },
            brandDelete(brandId){
                if(confirm('Are You Sure..?')){
                    this.deleteBrand(brandId)
                        .then(response=>{
                            if(response.status === "success"){
                                Notify.success(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        })
                }else{
                    return false;
                }
            },
            editBrand(brandId){

                this.brands.filter(brand=>{
                    if(brand.id === brandId){
                        this.isedit = true;
                        this.formData.id=brand.id;
                        this.formData.brand_name=brand.name;
                        this.formData.trans_brand_name=brand.trans_name;
                        this.formData.brand_status = brand.status;
                        if(brand.attachment){
                            this.formData.attachment_id = brand.attachment.attachment_id;
                            this.cropperData.init_image = brand.attachment.image_path;
                        }
                    }
                    return brand;
                })
            }

        },
        computed:{
            ...mapGetters([
                'brands',
                'cropImageIds',
            ]),
            checkFormData(){
                return JSON.parse(JSON.stringify(this.formData))
            }
        },
        watch:{
            checkFormData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
