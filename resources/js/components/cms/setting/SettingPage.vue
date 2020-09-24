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
            <!--<div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading bg-primary">
                        <h6 class="panel-title">
                            <a href="#">Payment Information </a>
                        </h6>
                    </div>
                    <div class="panel-body">
                        <form action="" @submit.prevent="deliverySettingStore">
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
                                            <span class="text-bold text-success" v-if="deliverySetting.paypal_payment">Accept Salaam Payment</span>
                                            <span class="text-bold text-warning" v-else>Not Accept Salaam Payment</span>
                                            <input type="checkbox" id="paypal_payment" v-model="deliverySetting.paypal_payment" :checked="deliverySetting.paypal_payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10 col-md-offset-2">
                                    <div class="form-group">
                                        <label class="checkbox-style" for="card_payment">
                                            <span class="text-bold text-success" v-if="deliverySetting.card_payment">Accept eDahab Payment</span>
                                            <span class="text-bold text-warning" v-else>Not Accept eDahab Payment</span>
                                            <input type="checkbox" id="card_payment" v-model="deliverySetting.card_payment" :checked="deliverySetting.card_payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-2">
                                    <div class="text-right form-group">
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-success">Update Payment Setting<i class="icon-arrow-right14 position-right"></i></button>
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
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Site Title:</label>
                                        <input type="text" maxlength="8" v-model="generalSetting.site_title" class="form-control" placeholder="Site Title" required>
                                        <span class="text-danger">Max 8 Characters</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Mall Title:</label>
                                        <input type="text" v-model="generalSetting.mall_title" class="form-control" placeholder="Mall Title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="form-group">
                                        <label>Search Min. Price:</label>
                                        <input type="number" v-model="generalSetting.search_min_price" class="form-control" placeholder="Min. Value" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-offset-1">
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
                                        <button type="submit" :disabled="btnDisabled" class="btn btn-success">Update General Setting<i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "SettingPage",
        data(){
            return{
                btnDisabled:false,

                contactSetting:{
                    contact_phone:'',
                    contact_mobile:'',
                    contact_email:'',
                    contact_address:'',
                    about_us:''
                }
            }
        },
        created() {
            this.getSettingInformation().then(response=>{
                if(response.code === 200){
                    this.contactSetting = response.data.contactSetting;
                }else{
                    Notify.error(response.message);
                }
            });
        },
        methods:{
            ...mapActions([
                'getSettingInformation',
                'storeContactSetting'
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
            }
        },
        watch:{
            contactSetting:{
                handler(newValue, oldValue){
                    if(oldValue === newValue){
                        this.btnDisabled = false;
                    }
                },
                deep:true,
            }
        }
    }
</script>

<style scoped>

</style>
