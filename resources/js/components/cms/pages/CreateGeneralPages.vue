<template>
    <div class="content">
        <form action="" @submit.prevent="pagesStore">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5 class="panel-title">Page Information</h5>
                    <div class="heading-elements">

                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Page Title:</label>
                                <input type="text" v-model="formData.page_title" class="form-control" placeholder="Page Title" required>
                            </div>
                            <div class="form-group">
                                <label>Menu Title:</label>
                                <input type="text" v-model="formData.menu_title" class="form-control" placeholder="Menu Title" required>
                            </div>
                            <div class="form-group">
                                <label>Menu Position:</label>
                                <input type="number" v-model="formData.menu_position" class="form-control" placeholder="Menu Position" required>
                            </div>
                            <!-- <div class="form-group">
                                <label>Show In:</label>
                                <vue-select2 v-model="formData.show_in" :options="pageDependency.show_in"> </vue-select2>
                            </div> -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Page Category:</label>
                                <vue-select2 v-model="formData.page_cat" :options="pageCategories"> </vue-select2>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-style" for="paypal_payment">
                                    <span class="text-bold text-success" v-if="formData.page_status">Publish</span>
                                    <span class="text-bold text-warning" v-else>UnPublish</span>
                                    <input type="checkbox" id="paypal_payment" v-model="formData.page_status"  :checked="formData.page_status">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <!-- <div class="form-group">
                                <label>Cover Image:</label>
                                <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                            </div> -->
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="body_content">Body Content</label>
                                <vue-editor id="body_content" v-model="formData.body_content"></vue-editor>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-9">
                            <div class="text-right form-group">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-primary btn-block">Save Page <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
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
        name: "CreateGeneralPages",
        components:{
            ImageCropper,
            'vue-select2':Select2,
            VueEditor
        },
        data(){
            return{
                formData:{
                    page_title:'',
                    menu_title:'',
                    show_in:2,
                    menu_position:'',
                    body_content:'',
                    other_content:'',
                    attachment_id:'',
                    page_status:'',
                    page_cat:1,
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
                pageCategories:[
                    {id:1, text:'Terms & Conditions'},
                    {id:2, text:'Privacy & Policy'},
                    {id:3, text:'Customer Service'},
                    {id:4, text:'About Us'},
                ]
            }
        },
        created() {
            this.generalPagesFormDependency();
        },
        methods:{
            ...mapActions([
                'generalPagesFormDependency',
                'storeGeneralPages',
            ]),
            pagesStore(){
                let vm = this;
                vm.btnDisabled = true;
                vm.formData.attachmentIds = vm.cropImageIds;
                vm.storeGeneralPages(vm.formData).then(response=>{
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
