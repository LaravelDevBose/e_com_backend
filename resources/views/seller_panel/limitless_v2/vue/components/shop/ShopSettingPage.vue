<template>
    <div class="content">
        <div class="panel-group panel-group-control content-group-lg" >
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        Contact Information
                    </h6>
                </div>
                <div class="panel-body">
                    <form action="" @submit.prevent="shopSettingUpdate">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <div class="form-group">
                                    <label>Shop Name <span class="text-danger text-bold">*</span></label>
                                    <input type="text" v-model="formData.shop_name" class="form-control" placeholder="Shop Name" required>
                                </div>

                                <div class="form-group">
                                    <label>Contact No:</label>
                                    <input type="text" v-model="formData.phone_no" class="form-control" placeholder="Contact No">
                                </div>

                                <div class="form-group">
                                    <label>Shop Email:</label>
                                    <input type="email" v-model="formData.shop_email" class="form-control" placeholder="Shop Email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Min. Delivery. Days:</label>
                                        <input type="number" v-model="formData.min_deli_day" class="form-control" placeholder="Min Delivery Days">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Max. Delivery Days:</label>
                                        <input type="number" v-model="formData.max_deli_day" class="form-control" placeholder="Max. Delivery Days">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="form-group">
                                    <label>Shop Address:</label>
                                    <textarea v-model="formData.shop_address" class="form-control" id="contact_address" rows="2"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Logo:</label>
                                            <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <img v-if="formData.shop_logo" :src="formData.shop_logo.image_path" alt="Company Logo">
                                            <img v-else :src="no_logo" alt="No Logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-8">
                                <div class="text-right form-group">
                                    <button type="submit" :disabled="btnDisabled" class="btn btn-success">Store Setting<i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <shop-banner-panel :banner_image="banner_image"></shop-banner-panel>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import { VueEditor } from "vue2-editor";
    import VueSelect2 from '../../../../../../js/components/helper/Select2';
    import ImageCropper from "../../../../../../js/components/cropper/ImageCropper";
    import ShopBannerPanel from "./ShopBannerPanel";
    export default {
        name: "ShopSettingPage",
        components:{ShopBannerPanel, ImageCropper,VueSelect2,VueEditor},
        data(){
            return{
                no_logo:'',
                logo_image:'',
                banner_image:'',
                formData:{
                    shop_name:'',
                    logo_id:'',
                    shop_address:'',
                    phone_no:'',
                    shop_email:'',
                    shop_category:'',
                    min_deli_day:'',
                    max_deli_day:'',
                },
                cropperData:{
                    width:150,
                    height:150,
                    placeholder:'Choose a image in 118X29',
                    file_size:1,
                    init_image:'',
                    folder:'shop',
                    modal_view:1,

                },
                removeImage:false,
                btnDisabled:false,
            }
        },
        created() {

        },
        mounted() {
            this.getShopDetails();
        },
        methods:{
            ...mapActions([
                'getShopDetails',
                'updateShopSetting',
            ]),
            shopSettingUpdate(){
                //TODO From Validation
                if(this.cropImageIds !== null){
                    this.formData.logo_id = this.cropImageIds[0];
                }
                this.updateShopSetting(this.formData)
                    .then(response=>{
                        if(typeof response.code === "undefined"){
                            Notify.error(response.message);
                        }else if(response.code === 200 ){
                            Notify.success(response.message);
                        }else if(response.status === "validation" && response.code === 400){
                            Notify.validation(response.message);
                        }else {
                            Notify.info(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'cropImageIds',
                'shopDetails'
            ]),
            shopDetailsCheck(){
                return JSON.parse(JSON.stringify(this.shopDetails));
            }
        },
        watch:{
            cropImageIds:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
            shopDetailsCheck:{
                handler(newValue,oldValue){
                    if(oldValue !== newValue){
                        Object.assign(this.formData, this.shopDetails);
                        if(this.shopDetails.banner.image_path !== '' || true ){
                            this.banner_image = this.shopDetails.banner.image_path;
                        }
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
