<template>
    <div class="content">
        <form action="" @submit.prevent="pagesUpdate">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5 class="panel-title">Page Information</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Page Title:</label>
                                <input type="text" v-model="formData.title" class="form-control" placeholder="Page Title" required>
                            </div>
                            <div class="form-group">
                                <label>Menu Title:</label>
                                <input type="text" v-model="formData.menuTitle" class="form-control" placeholder="Menu Title" required>
                            </div>
                            <div class="form-group">
                                <label>Menu Position:</label>
                                <input type="text" v-model="formData.position" class="form-control" placeholder="Menu Position" required>
                            </div>

                            <div class="form-group">
                                <label>Show In:</label>
                                <vue-select2 v-model="formData.show_in" :options="pageDependency.show_in" :value="formData.show_in"> </vue-select2>
                            </div>
                            <div class="form-group">
                                <label>Cover Image:</label>
                                <img :src="this.image_path"  class="img img-responsive" style="max-height: 200px;">
                            </div>
                            <div class="content-group-lg">
                                <label>Page Status:</label>
                                <div class="checkbox checkbox-switchery">
                                    <label>
                                        <input type="checkbox" v-model="formData.status" class="switchery-primary" :checked="formData.status">
                                        <span class="text-success" v-if="formData.status"> Publish</span>
                                        <span class="text-danger" v-else> UnPublish</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cover Image:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-6">
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-primary">Save Brand <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5 class="panel-title">Page Body Content</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="form-group row">
                        <label class="col-lg-2 control-label" for="content">Body Content</label>
                        <div class="col-lg-10">
                            <vue-editor id="content" v-model="formData.body_content"></vue-editor>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Select2 from "../../helper/Select2";
    import ImageCropper from "../../cropper/ImageCropper";
    import  {mapActions, mapGetters} from  "vuex";
    import { VueEditor } from "vue2-editor";

    export default {
        name: "EditGeneralPages",
        props:['id'],
        components:{
            ImageCropper,
            'vue-select2':Select2,
            VueEditor
        },
        data(){
            return{
                formData:{
                    title:'',
                    menuTitle:'',
                    show_in:'',
                    position:'',
                    body_content:'',
                    extra_content:'',
                    attachment_id:'',
                    status:'',
                },
                cropperData:{
                    width:600,
                    height:460,
                    placeholder:'Choose a image in 600*460',
                    file_size:1.5,
                    init_image:'',
                    folder:'page',
                },
                removeImage:false,
                btnDisabled:false,
                image_path:'',
            }
        },
        created() {
            this.singleGeneralPageData(this.id)
                .then(response=>{
                    if(response.code == 200){
                        this.formData = response.data;
                        this.formData['body_content'] = response.data.content;
                        this.image_path = response.data.attachment.image_path;
                    }
                });
            this.generalPagesFormDependency();

        },
        methods:{
            ...mapActions([
                'generalPagesFormDependency',
                'updateGeneralPages',
                'singleGeneralPageData',
            ]),
            pagesUpdate(){
                let vm = this;
                vm.btnDisabled = true;
                vm.formData.attachmentIds = vm.cropImageIds;
                vm.updateGeneralPages(vm.formData)
                    .then(response=>{
                        if(response.code === 200){
                            Notify.success(response.message);
                            // this.emptyFormData();
                            this.removeImage= true;
                            if(response.url != '' && response.url != null){
                                setTimeout(function(){
                                    window.location = response.url;
                                }, 3000)
                            }

                        }else if(response.status === "validation"){
                            Notify.validation(response.message);
                        }else{
                            Notify.warning(response.message);
                        }
                });
            }
        },
        computed:{
            ...mapGetters([
                'pageDependency',
                'cropImageIds',
                // 'pageData',
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
            pageData:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.formData = newValue;
                    }
                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
