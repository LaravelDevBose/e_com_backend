<template>
    <div class="content">
        <form action="" @submit.prevent="sectionDetailsManipulate">
            <div class="panel">
                <div class="panel-heading bg-indigo-800">
                    <h5 class="panel-title" v-if="is_edit">Update HomePage Section</h5>
                    <h5 class="panel-title" v-else>Add HomePage Section</h5>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Section Title: <span class="text text-danger">*</span></label>
                                <input type="text" class="form-control" v-model="formData.section_title"  placeholder="Section Title" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Section Type:</label>
                                <vue-select2 :options="sectionTypes" v-model.number="formData.section_type" >
                                </vue-select2>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Section Position:</label>
                                <input type="number" maxlength="1" v-model="formData.section_position" class="form-control" placeholder="Section position" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Categories:</label>
                                        <treeselect v-model="formData.categoryIDs" :multiple="true" :options="treeList" :normalizer="normalizer" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Section Banner:</label>
                                    <img v-if="sectionData.attachment" :src="sectionData.attachment.image_path" alt="Section Banner" class="img-responcive img-thumbnail" style="width:100%;">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-9">
                            <label>Section Banner:</label>
                            <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-2 col-md-offset-8">
                            <div class="text-right form-group" style="margin-bottom:0px;">
                                <button type="submit" :disabled="btnDisabled" class="btn btn-primary btn-block">
                                    <span v-if="is_edit">Update Section </span>
                                    <span v-else>Save Section </span>
                                    <i class="icon-arrow-right14 position-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import '@riophae/vue-treeselect/dist/vue-treeselect.css';

    import {mapGetters, mapActions} from 'vuex';
    import ImageCropper from "../cropper/ImageCropper";
    import Treeselect from '@riophae/vue-treeselect';
    import VueSelect2 from '../helper/Select2';
    import ProductList from '../helper/ProductList';

    export default {
        name: "SectionCreatePage",
        props:{
            sectionid:{
                type:[Number],
                default:'',
            },
            is_edit:{
                type: [Number],
                default: false,
            }
        },
        components:{
            'vue-select2':VueSelect2,
            'product-list':ProductList,
            ImageCropper, Treeselect,
        },
        data(){
            return{
                formData:{
                    section_id:'',
                    section_title:'',
                    attachment_id:'',
                    section_type:'',
                    section_position:'',
                    section_status:'',
                    categoryIDs:[],
                },
                normalizer(node) {
                    return {
                        id: node.id,
                        label: node.label,
                        children: node.children,
                    }
                },
                cropperData:{
                    width:500,
                    height:600,
                    placeholder:'Choose a image in 600*500',
                    file_size:1.5,
                    init_image:'',
                    folder:'category',
                },
                removeImage:false,
                btnDisabled:false,
            }
        },
        created() {
            if(this.is_edit ===1|| this.is_edit=== true){
                this.getSectionData(this.sectionid);
            }
            this.allTreeListCategories();
            this.getSectionCreateDependency();
        },
        methods:{
            ...mapActions([
                'allTreeListCategories',
                'getSectionCreateDependency',
                'storeSectionDetails',
                'getSectionData',
                'updateSectionDetails',
            ]),
            sectionDetailsManipulate(){
                this.btnDisabled = true;
                if(this.cropImageIds !== ''){
                    this.formData.attachment_id = this.cropImageIds[0];
                }

                if(this.is_edit === 1 || this.is_edit === true){
                    this.updateSectionDetails(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                Notify.success(response.message);

                                setTimeout(()=>{
                                    location.href = response.url;
                                },1500);
                            }else if(response.code === 400 && response.status === 'validation'){
                                Notify.warning(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        });
                }else{
                    this.storeSectionDetails(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                Notify.success(response.message);

                                setTimeout(()=>{
                                    location.href = response.url;
                                },1500);

                            }else if(response.code === 400 && response.status === 'validation'){
                                Notify.warning(response.message);
                            }else{
                                Notify.error(response.message);
                            }
                        });
                }

            },

        },
        computed:{
            ...mapGetters([
                'treeList',
                'sectionTypes',
                'cropImageIds',
                'sectionData'
            ]),
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
            sectionDataCheck(){
                return JSON.parse(JSON.stringify(this.sectionData));
            },
        },
        watch:{
            formDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
            sectionDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        let vm = this;
                        this.formData.section_id = this.sectionData.section_id;
                        this.formData.section_title = this.sectionData.section_title;
                        this.formData.attachment_id = this.sectionData.attachment_id;
                        this.formData.section_type = this.sectionData.section_type;
                        this.formData.section_position = this.sectionData.section_position;
                        this.formData.section_status = this.sectionData.section_status;
                        this.sectionData.section_categories.forEach(function (value,key) {
                            // console.log(value.category_id);
                            vm.formData.categoryIDs.push(value.category_id);
                        });

                    }

                },
                deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
