<template>
    <div class="CreateCampaign">
        <div class="content">
            <form action="" @submit.prevent="campaignStore">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title">Campaign Details</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Campaign Name:</label>
                                    <input type="text" class="form-control" v-model="form.campaign_title"  placeholder="Campaign name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" >
                                    <label>Start Date:</label>
                                    <div class="input-group">

                                        <datetime
                                                type="datetime"
                                                use12-hour
                                                v-model="form.campaign_start"
                                                input-id="startDate"
                                                input-class="form-control"
                                                :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                                :week-start="6"
                                        >
                                        </datetime>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>End Date:</label>
                                    <div class="input-group">

                                        <datetime
                                                type="datetime"
                                                use12-hour
                                                v-model="form.campaign_end"
                                                input-id="startDate"
                                                input-class="form-control"
                                                :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                                :week-start="6"
                                                class="theme-orange"
                                        >
                                        </datetime>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Last Register Date:</label>
                                    <div class="input-group">

                                        <datetime
                                                type="datetime"
                                                use12-hour
                                                v-model="form.camp_reg_date"
                                                input-id="regDate"
                                                input-class="form-control"
                                                :phrases="{ok: 'Continue', cancel: 'Exit'}"
                                                :week-start="6"
                                                class="theme-orange"
                                        >
                                        </datetime>
                                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Seller Product Limit:</label>
                                    <input type="number" class="form-control" v-model="form.seller_pro_limit"  placeholder="Seller Product Limit" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Campaign Total Product:</label>
                                    <input type="number" class="form-control" v-model="form.total_product"  placeholder="Total Product." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Campaign Details:</label>
                                    <vue-editor id="campaign_details" v-model="form.campaign_details"></vue-editor>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Campaign Rules:</label>
                                    <vue-editor id="campaign_rules" v-model="form.campaign_rules"></vue-editor>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Campaign Banner Image:</label>
                                    <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Campaign Adds:</label>
                                    <attachment :multi_file="multiple" :folder="folder"></attachment>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Adds Position:</label>
                                    <vue-select2 v-model="form.adds_position" :options="positions"> </vue-select2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-submit-btn" >
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-8">
                                    <div class="content-group-lg"  style="margin-bottom:0!important;">
                                        <div class="checkbox checkbox-switchery">
                                            <label>
                                                <input type="checkbox" v-model="form.campaign_status" class="switchery-primary" :checked="form.campaign_status">
                                                <span class="text-success text-bold" v-if="form.campaign_status">Active</span>
                                                <span class="text-danger text-bold" v-else>Inactive</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="text-right form-group" style="margin-bottom:0px;">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-primary btn-block">Save Campaign <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Attachment from "../attachment/Attachment";
    import { VueEditor } from "vue2-editor";
    import ImageCropper from "../cropper/ImageCropper";
    import VueSelect2 from '../helper/Select2';

    export default {
        name: "CreateCampaign",
        components:{
            Attachment,
            VueEditor,
            ImageCropper,
            'vue-select2':VueSelect2,
        },
        data(){
            return {
                form:{
                    campaign_title:'',
                    campaign_start:new Date().toISOString().slice(0,10),
                    campaign_end:new Date().toISOString().slice(0,10),
                    campaign_details:'',
                    attachment_id:'',
                    campaign_status:0,
                    camp_reg_date:'',
                    seller_pro_limit:'',
                    campaign_rules:'',
                    total_product:'',
                    adds_attachment_id:'',
                    adds_position:'',

                },
                btnDisabled:false,
                folder:'campaign',
                multiple:false,
                cropperData:{
                    width:1200,
                    height:600,
                    placeholder:'Choose a image in 1200X600',
                    file_size:1.5,
                    init_image:'',
                    folder:'campaign',
                },
                removeImage:false,
            }
        },
        created() {

        },
        mounted(){
            this.getAddsPositions();
        },
        methods:{
            ...mapActions([
                'storeCampaign',
                'getAddsPositions',
            ]),
            campaignStore(){
                this.btnDisabled = true;

                this.form.adds_attachment_id = this.attachment_ids[0];
                this.form.attachment_id = this.cropImageIds[0];
                this.storeCampaign(this.form)
                    .then(response=>{
                        if(typeof response.code === "undefined"){
                            Notify.error(response.message);
                        }else if(response.code === 200){
                            Notify.success(response.message);
                            if(response.url !== null){
                                setTimeout(()=>{
                                    location.href = response.url;
                                },1500)
                            }
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },

        },
        computed:{
            ...mapGetters([
                'attachment_ids',
                'cropImageIds',
                'positions'
            ]),
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.form));
            },
        },
        watch:{
            formDataCheck:{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            }
        }
    }
</script>

<style scoped>
    .sticky-submit-btn{
        position: -webkit-sticky;
        position: sticky;
        bottom: 50px;
    }
    .input-group-addon{
        border-color: #dddddd;
        padding:10px;
    }
</style>
