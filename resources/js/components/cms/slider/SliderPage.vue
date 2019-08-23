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
                                <label>Button Text:</label>
                                <input type="text" v-model="formData.btn_text" class="form-control" placeholder="Button Text" required>
                            </div>
                            <div class="form-group">
                                <label>Button Url:</label>
                                <input type="text" v-model="formData.btn_url" class="form-control" placeholder="Button Url" required>
                            </div>
                            <div class="form-group">
                                <label>Slider Position:</label>
                                <input type="text" v-model="formData.slider_position" class="form-control" placeholder="Button Url" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Slider Image:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-6">
                            <div class="content-group-lg">
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox" v-model="formData.slider_status" class="switchery-primary" :checked="formData.slider_status">
                                        <span class="text-success" v-if="formData.slider_status"> Publish</span>
                                        <span class="text-danger" v-else> UnPublish</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-right form-group">
                                <button type="submit" class="btn btn-primary">Save Brand <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Basic table -->
        <!--<div class="panel panel-flat">
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
                        <td class="text text-center">
                            <span class="badge badge-success" v-if="brand.status === 1">Active</span>
                            <span class="badge badge-warning" v-else>De-active</span>
                        </td>
                        <td class="text text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a href="#"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="#" @click.prevent="brandDelete(brand.id)"><i class="icon-trash"></i></a></li>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>-->
        <!-- /basic table -->
    </div>
</template>

<script>

    import {mapGetters, mapActions} from 'vuex';
    import ImageCropper from "../../cropper/ImageCropper";

    export default {
        name: "SliderPage",
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
                    width:500,
                    height:600,
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
            this.getSliders();
        },
        methods:{
            ...mapActions([
                'getSliders',
                'storeSlider',
                'deleteSlider',
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
                'slidersData',
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
