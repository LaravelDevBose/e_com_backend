<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Add Slider Details</h5>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="sliderStore">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="form-group">
                                <label>Slider Title:</label>
                                <input type="text" v-model="formData.slider_title" class="form-control" placeholder="Slider Title" required>
                            </div>
                            <div class="form-group">
                                <label>Slider Image:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Slider Position:</label>
                                <input type="number" v-model="formData.slider_position" class="form-control" placeholder="Slider Position" required>
                            </div>
                            <div class="content-group-lg">
                                <label>Slider Status:</label>
                                <div class="form-group">
                                    <label class="checkbox-style" for="paypal_payment">
                                        <span class="text-bold text-success" v-if="formData.slider_status">Active</span>
                                        <span class="text-bold text-warning" v-else>Inactive</span>
                                        <input type="checkbox" id="paypal_payment" v-model="formData.slider_status"  :checked="formData.slider_status">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-primary btn-block">Save Slider <i class="icon-arrow-right14 position-right"></i></button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import ImageCropper from "../../cropper/ImageCropper";
    export default {
        name: "SliderCreatePage",
        components: {ImageCropper},
        data(){
            return {
                formData:{
                    slider_title:'',
                    sub_title:'',
                    btn_text:'',
                    btn_url:'',
                    slider_position:'',
                    attachmentIds:'',
                    slider_status:0,
                },

                cropperData:{
                    width:600,
                    height:460,
                    placeholder:'Choose a image in 600*500',
                    file_size:1.5,
                    init_image:'',
                    folder:'slider',
                    modal_type:3,
                },
                removeImage:false,
                btnDisabled:false,
            }
        },
        created() {

        },
        methods:{
            ...mapActions([
                'storeSlider'
            ]),
            sliderStore(){
                this.btnDisabled = true;
                let vm = this;
                vm.formData.attachmentIds = vm.cropImageIds;
                vm.storeSlider(vm.formData).then(response=>{
                    if(response.status === 'success'){
                        Notify.success(response.message);
                        // this.emptyFormData();
                        this.removeImage= true;
                        if(response.hasOwnProperty('url')){
                            setTimeout(()=>{
                                location.href = response.url;
                            })
                        }else{
                            location.reload();
                        }
                    }else{
                        Notify.warning(response.message);
                    }
                });
            }

        },
        computed:{
            ...mapGetters([
                'cropImageIds',
            ]),
        },
        watch:{
            formData:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
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
