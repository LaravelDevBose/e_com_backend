<template>
    <div class="panel-group panel-group-control content-group-lg">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title">
                    Shop Banner Information
                </h6>
            </div>
            <div class="panel-body">
                <form action="" @submit.prevent="shopBannerUpdate">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label>Shop Banner:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label>Shop Banner:</label>
                                <img class="img img-responsive" :src="banner_image" alt="Banner Image">
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-8">
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-success">Banner Update<i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import ImageCropper from "../../../../../../js/components/cropper/ImageCropper";
    export default {
        name: "ShopBannerPanel",
        components:{ImageCropper},
        props:{
            banner_image:{
                type:[String, Object],
                default:'',
            }
        },
        data(){
            return{
                no_logo:'',
                formData:{
                    banner_id:'',
                },
                cropperData:{
                    width:915,
                    height:215,
                    placeholder:'Choose a image in 915 X 215',
                    file_size:1,
                    init_image:'',
                    folder:'shop',
                },
                removeImage:false,
                btnDisabled:false,
            }
        },
        methods:{
            ...mapActions([
                'updateShopBanner',
            ]),
            shopBannerUpdate(){
                //TODO From Validation
                if(this.cropImageIds !== null){
                    this.formData.banner_id = this.cropImageIds[0];
                }
                this.updateShopBanner(this.formData)
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
            ])
        },
        watch:{
            cropImageIds:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            }
        }
    }
</script>

<style scoped>

</style>
