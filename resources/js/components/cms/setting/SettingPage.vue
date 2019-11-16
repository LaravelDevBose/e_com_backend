<template>
    <div class="content">
        <div class="panel-group panel-group-control content-group-lg" >
            <div class="panel">
                <div class="panel-heading bg-info">
                    <h6 class="panel-title">
                        <a href="#">Contact Information</a>
                    </h6>
                </div>
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

            <div class="panel">
                <div class="panel-heading bg-primary">
                    <h6 class="panel-title">
                        <a href="#">Logo Image</a>
                    </h6>
                </div>
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
            <div class="panel">
                <div class="panel-heading bg-primary">
                    <h6 class="panel-title">
                        <a href="#">Delivery Information </a>
                    </h6>
                </div>
                <div class="panel-body">
                    <form action="" @submit.prevent="deliverySettingStore">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                                <div class="form-group">
                                    <label>Delivery Flat Rate:</label>
                                    <input type="text" v-model="deliverySetting.delivery_rate" class="form-control" placeholder="Flat Rate" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group">
                                    <label class="checkbox-style" for="cash_on_delivery">
                                        <span class="text-bold text-success" v-if="deliverySetting.cash_on_delivery">Accept Cash on Delivery</span>
                                        <span class="text-bold text-warning" v-else>Not Accept Cash on Delivery</span>
                                        <input type="checkbox" id="cash_on_delivery" v-model="deliverySetting.cash_on_delivery" :checked="deliverySetting.cash_on_delivery">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group">
                                    <label class="checkbox-style" for="paypal_payment">
                                        <span class="text-bold text-success" v-if="deliverySetting.paypal_payment">Accept Paypal Payment</span>
                                        <span class="text-bold text-warning" v-else>Not Accept Paypal Payment</span>
                                        <input type="checkbox" id="paypal_payment" v-model="deliverySetting.paypal_payment" :checked="deliverySetting.paypal_payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group">
                                    <label class="checkbox-style" for="card_payment">
                                        <span class="text-bold text-success" v-if="deliverySetting.card_payment">Accept Card</span>
                                        <span class="text-bold text-warning" v-else>Not Accept Card</span>
                                        <input type="checkbox" id="card_payment" v-model="deliverySetting.card_payment" :checked="deliverySetting.card_payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-md-offset-2">
                                <div class="text-right form-group">
                                    <button type="submit" :disabled="btnDisabled" class="btn btn-success">Update Setting<i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading bg-teal">
                    <h6 class="panel-title">
                        <a  href="#">Campaign information Setting</a>
                    </h6>
                </div>
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
                },
                deliverySetting:{
                    delivery_rate:0,
                    cash_on_delivery:false,
                    paypal_payment:false,
                    card_payment:false,
                },

            }
        },
        created() {
            this.getSettingInformation().then(response=>{
                if(response.code == 200){

                    this.contactSetting = response.data.contactSetting;
                    this.logo_image = response.data.logoImage;
                    this.campaignSetting = response.data.campaignSetting;
                    this.deliverySetting = response.data.deliverySetting;
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
                'storeDeliverySetting',
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
            deliverySettingStore(){
                this.btnDisabled = true;
                this.storeDeliverySetting(this.deliverySetting)
                    .then(response=>{
                        this.btnDisabled = false;
                        if(response.code == 200){
                            Notify.success(response.message);
                        }else{
                            Notify.error(response.message);
                        }
                    })
            }
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
