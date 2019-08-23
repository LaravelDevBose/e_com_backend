<template>
    <div class="content">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h5 class="panel-title">Slider</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form action="" @submit.prevent="sliderStore">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slider Title:</label>
                                <input type="text" v-model="formData.slider_title" class="form-control" placeholder="Slider Title" required>
                            </div>
                            <div class="form-group">
                                <label>Sub Title:</label>
                                <input type="text" v-model="formData.sub_title" class="form-control" placeholder="Sub Title" required>
                            </div>
                            <div class="form-group">
                                <label>Slider Position:</label>
                                <input type="text" v-model="formData.slider_position" class="form-control" placeholder="Button Url" required>
                            </div>

                            <div class="form-group">
                                <label>Button Text:</label>
                                <input type="text" v-model="formData.btn_text" class="form-control" placeholder="Button Text" required>
                            </div>
                            <div class="form-group">
                                <label>Button Url:</label>
                                <input type="text" v-model="formData.btn_url" class="form-control" placeholder="Button Url" required>
                            </div>
                            <div class="content-group-lg">
                                <label>Slider Status:</label>
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox" v-model="formData.slider_status" class="switchery-primary" :checked="formData.slider_status">
                                        <span class="text-success" v-if="formData.slider_status"> Publish</span>
                                        <span class="text-danger" v-else> UnPublish</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slider Image:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-6">
                            <div class="text-right form-group">
                                <button type="submit" class="btn btn-primary">Save Brand <i class="icon-arrow-right14 position-right"></i></button>
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
                let vm = this;
                vm.formData.attachmentIds = vm.cropImageIds;
                vm.storeSlider(vm.formData).then(response=>{
                    if(response.status === 'success'){
                        Notify.success(response.message);
                        // this.emptyFormData();
                        this.removeImage= true;

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
