<template>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
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
                                        <textarea class="form-control" rows="2" v-model="contactSetting.contact_address"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer About Us:</label>
                                        <textarea class="form-control" rows="4" v-model="contactSetting.about_us"></textarea>
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
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading bg-primary">
                        <h6 class="panel-title">
                            <a href="#">Delivery Information </a>
                        </h6>
                    </div>
                    <div class="panel-body">
                        <form action="" @submit.prevent="deliverySettingStore">
                            <!--<div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <div class="form-group">
                                        <label>Delivery Flat Rate:</label>
                                        <input type="text" v-model="deliverySetting.delivery_rate" class="form-control" placeholder="Flat Rate" required>
                                    </div>
                                </div>
                            </div>-->
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
            </div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading bg-teal">
                        <h6 class="panel-title">
                            <a href="#">General Information </a>
                        </h6>
                    </div>
                    <div class="panel-body">
                        <form action="" @submit.prevent="generalSettingStore">
                            <div class="row">
                                <div class="col-md-3 col-md-offset-2">
                                    <div class="form-group">
                                        <label>Search Min. Price:</label>
                                        <input type="number" v-model="generalSetting.search_min_price" class="form-control" placeholder="Min. Value" required>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label>Search Max Price:</label>
                                        <input type="number" v-model="generalSetting.search_max_price" class="form-control" placeholder="Max. Value" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-2">
                                    <div class="form-group">
                                        <label class="checkbox-style" for="show_seller_info">
                                            <span class="text-bold text-success" v-if="generalSetting.show_seller_info ">Show Seller Information</span>
                                            <span class="text-bold text-warning" v-else>Not Show Seller Information</span>
                                            <input type="checkbox" id="show_seller_info" v-model="generalSetting.show_seller_info" :checked="generalSetting.show_seller_info">
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
                    contact_address:'',
                    about_us:''
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
                generalSetting:{
                    show_seller_info:false,
                    search_min_price:'',
                    search_max_price:''
                }

            }
        },
        created() {
            this.getSettingInformation().then(response=>{
                if(response.code == 200){

                    this.contactSetting = response.data.contactSetting;
                    this.logo_image = response.data.logoImage;
                    this.campaignSetting = response.data.campaignSetting;
                    this.deliverySetting = response.data.deliverySetting;
                    this.generalSetting = response.data.generalSetting;
                    this.deliverySetting.card_payment = (this.deliverySetting.card_payment === '1');
                    this.deliverySetting.cash_on_delivery = (this.deliverySetting.cash_on_delivery === '1');
                    this.deliverySetting.paypal_payment = (this.deliverySetting.paypal_payment === '1');
                    this.generalSetting.show_seller_info = (this.generalSetting.show_seller_info === '1');
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
                'storeGeneralSetting',
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
            },
            generalSettingStore(){
                this.btnDisabled = true;
                this.storeGeneralSetting(this.generalSetting)
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
            generalSetting:{
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
