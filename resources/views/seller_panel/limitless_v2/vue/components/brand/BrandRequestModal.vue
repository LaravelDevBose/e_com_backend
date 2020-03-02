<template>
    <div id="brand_req" class="modal fade">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Request For New Brand</h5>
                </div>

                <div class="panel-body">
                    <form action="" @submit.prevent="storeReqBandData()">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Brand Name:</label>
                                    <input type="text" v-model="formData.brand_name" class="form-control" placeholder="Brand Name " required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Trans. Brand Name:</label>
                                    <input type="text" v-model="formData.trans_brand_name" class="form-control" placeholder="Somalia Brand Name " required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-right form-group">
                                    <button type="submit" :disabled="btnDisabled" class="btn btn-success">
                                        <span>Request A Brand</span>
                                        <i class="icon-arrow-right14 position-right"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ImageCropper from "../../../../../../js/components/cropper/ImageCropper";
    import {mapActions, mapGetters} from "vuex";

    export default {
        name: "BrandRequestModal",
        components: {ImageCropper},
        data(){
            return{
                formData:{
                    trans_brand_name:'',
                    brand_name:'',
                    brand_status:3,
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
            }
        },
        methods:{
            ...mapActions([
                'setBrandRequest',
            ]),
            storeReqBandData(){
                if(this.cropImageIds.length !== 0 && this.cropImageIds[0] !== ''){
                    this.formData.attachment_id = this.cropImageIds[0];
                }
                this.setBrandRequest(this.formData)
                    .then(response=>{
                        if(response.status === "success"){
                            Notify.success(response.message);
                            this.formReset();
                            $('#brand_req').modal('hide');
                        }else if(response.status === "validation"){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
                    .catch(error=>{
                        Notify.info(error.message);
                    })


            },
            formReset(){
                this.formData.brand_name='';
                this.formData.trans_brand_name='';
                this.formData.brand_status = false;
                this.formData.attachment_id = '';
                this.removeImage=true;
            },
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
