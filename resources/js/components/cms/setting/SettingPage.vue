<template>
    <div class="content">
        <div class="panel-group panel-group-control content-group-lg" id="accordion-control">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion-control" href="#contact-info-group1">Contact Information</a>
                    </h6>
                </div>
                <div id="contact-info-group1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form action="" @submit.prevent="contactSettingStore">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Contact No 1:</label>
                                        <input type="text" v-model="contactSetting.contact_phone" class="form-control" placeholder="Contact No" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact No 2:</label>
                                        <input type="text" v-model="contactSetting.contact_mobile" class="form-control" placeholder="Contact No 2" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Contact Email:</label>
                                        <input type="email" v-model="contactSetting.contact_email" class="form-control" placeholder="Contact Email" required>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label>Contact Address:</label>
                                        <vue-editor id="contact_address" v-model="contactSetting.contact_address"></vue-editor>
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

            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#logo-image">Logo Image</a>
                    </h6>
                </div>
                <div id="logo-image" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="" @submit.prevent="logoImageStore">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Logo:</label>
                                        <image-cropper :cropperData="cropperData" :removeImage="removeImage"></image-cropper>
                                    </div>
                                    <div class="text-right form-group">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-success ">Store Logo<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <img v-if="logo_image" :src="logo_image" alt="Company Logo">
                                        <img v-else :src="no_logo" alt="No Logo">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#campaign-setting">Campaign information Setting</a>
                    </h6>
                </div>
                <div id="campaign-setting" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form action="" @submit.prevent="campaignSettingStore">
                            <div class="row">
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Campaign Email:</label>
                                        <input type="email" v-model="campaignSetting.campaign_email" class="form-control" placeholder="Campaign Sending Email Address." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Sent Time:</label>
                                        <div class="input-group">

                                            <datetime
                                                type="time"
                                                use12-hour
                                                v-model="campaignSetting.sending_time"
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
                                    <div class="form-group">
                                        <label>Email Subject:</label>
                                        <input type="text" v-model="campaignSetting.email_subject" class="form-control" placeholder="Campaign Email Subject." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Campaign Email Heading:</label>
                                        <vue-editor id="email_heading" v-model="campaignSetting.email_heading"></vue-editor>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="form-group">
                                        <label>Campaign Email Body:</label>
                                        <vue-editor id="email_body" v-model="campaignSetting.email_body"></vue-editor>
                                    </div>
                                    <div class="form-group">
                                        <label>Campaign Email Footer:</label>
                                        <vue-editor id="email_footer" v-model="campaignSetting.email_footer"></vue-editor>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-8">
                                    <div class="text-right form-group">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-success ">Store Setting<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import { VueEditor } from "vue2-editor";
    import ImageCropper from "../../cropper/ImageCropper";

    export default {
        name: "SettingPage",
        components: {ImageCropper, VueEditor},
        data(){
            return{
                no_logo:'',
                cropperData:{
                    width:118,
                    height:29,
                    placeholder:'Choose a image in 118X29',
                    file_size:1,
                    init_image:'',
                    folder:'setting',
                },
                removeImage:false,
                btnDisabled:false,

                contactSetting:{
                    contact_phone:'',
                    contact_mobile:'',
                    contact_email:'',
                    contact_address:''
                },
                logo_image:'',
                campaignSetting:{
                    campaign_email:'',
                    sending_time:'',
                    email_subject:'',
                    email_heading:'',
                    email_body:'',
                    email_footer:''
                },
                logoData:{
                    attachment_id:'',
                }

            }
        },
        created() {
            this.getSettingInformation().then(response=>{
                if(response.code == 200){

                    this.contactSetting = response.data.contactSetting;
                    this.logo_image = response.data.logoImage;
                    this.campaignSetting = response.data.campaignSetting;
                }else{
                    Notify.error(response.message);
                }
            });
        },
        methods:{
            ...mapActions([
                'getSettingInformation',
                'storeContactSetting',
                'storeCampaignSetting',
                'storeLogoImage',
            ]),
            contactSettingStore(){
                this.btnDisabled = true;
                this.storeContactSetting(this.contactSetting)
                    .then(response=>{
                        this.btnDisabled = false;
                        if(response.code === 200){
                            Notify.success(response.message);
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },
            campaignSettingStore(){
                this.btnDisabled = true;
                this.storeCampaignSetting(this.campaignSetting)
                    .then(response=>{
                        this.btnDisabled = false;
                        if(response.code === 200){
                            Notify.success(response.message);
                        }else if(response.status === 'validation'){
                            Notify.validation(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },
            logoImageStore(){
                this.logoData.attachment_id = this.cropImageIds[0];
                if(this.logoData.attachment_id == '' || this.logoData.attachment_id == null){
                    alert('Select A Image First');
                    return false;
                }
                this.btnDisabled = true;
                this.storeLogoImage(this.logoData)
                    .then(response=>{
                        this.btnDisabled = false;
                        console.log(response);
                        if(response.code == 200){
                            this.removeImage= true;
                            this.logo_image = response.data.logoImage;
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            },
        },
        computed:{
            ...mapGetters([
                'cropImageIds'
            ])
        },
        watch:{
            contactSetting:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
            campaignSetting:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            },
            cropImageIds:{
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
