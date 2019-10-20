<template>
    <form id="co-billing-form" action="" @submit.prevent="billingAddressStore">
        <fieldset class="group-select">
            <ul>
                <li>
                    <label for="billing-address-select">Select a billing address from your address book or enter a new address.</label>
                    <br>
                    <select name="billing_address_id" v-model="billing_id" id="billing-address-select" class="address-select" title="" >
                        <option :value="0">New Address</option>
                        <option v-if="addressList" v-for="(address, index) in addressList"  :value="address.id" :selected="{selected:(index===0 || billing_id === address.id)}">{{ address.text }}</option>
                    </select>
                </li>
                <li id="billing-new-address-form" :class="new_address?'show':'hidden'">
                    <fieldset>
                        <legend>New Address</legend>
                        <ul>
                            <li>
                                <div class="customer-name">
                                    <div class="input-box name-firstname">
                                        <label for="billing_firstname"> First Name <span class="required">*</span> </label>
                                        <br>
                                        <input type="text" id="billing_firstname" v-model="formData.first_name" title="First Name" class="input-text required-entry">
                                    </div>
                                    <div class="input-box name-lastname">
                                        <label for="billing_lastname"> Last Name <span class="required">*</span> </label>
                                        <br>
                                        <input type="text" id="billing_lastname" v-model="formData.last_name" title="Last Name" class="input-text required-entry">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <label for="billing_street">Address <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.address" title="Street Address" id="billing_street" class="input-text required-entry">
                            </li>
                            <li>
                                <div class="input-box">
                                    <label for="billing_city">City <span class="required">*</span></label>
                                    <br>
                                    <input type="text" title="City" v-model="formData.city" class="input-text required-entry" id="billing_city">
                                </div>
                                <div id="" class="input-box">
                                    <label for="billing_region">State/Province <span class="required">*</span></label>
                                    <br>
                                    <select  id="billing_region" v-model="formData.state"  title="State/Province" class="validate-select" style="">
                                        <option value="">Please select region, state or province</option>
                                        <option value="1">Alabama</option>
                                        <option value="2">Alaska</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="input-box">
                                    <label for="billing_postcode">Zip/Postal Code <span class="required">*</span></label>
                                    <br>
                                    <input type="text" v-model="formData.postal_code" title="Zip/Postal Code" id="billing_postcode" class="input-text validate-zip-international required-entry">
                                </div>
                                <div class="input-box">
                                    <label for="billing_country_id">Country <span class="required">*</span></label>
                                    <br>
                                    <select id="billing_country_id" v-model="formData.country" class="validate-select" title="Country">
                                        <option value=""> </option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>

                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="input-box">
                                    <label for="billing_telephone">Telephone <span class="required">*</span></label>
                                    <br>
                                    <input type="text" v-model="formData.phone_no" title="Telephone" class="input-text required-entry" id="billing_telephone">
                                </div>
                            </li>
                            <li>
                                <input type="checkbox" value="1" v-model="save_address" title="Save in address book" id="billing_save_in_address_book" class="checkbox" checked>
                                <label for="billing_save_in_address_book">Save in address book</label>
                            </li>
                        </ul>
                    </fieldset>
                </li>
                <li>
                    <input type="radio" name="is_shipping" id="shipping_yes" v-model="formData.is_shipping" :value="1" class="radio">
                    <label for="shipping_yes">Ship to this address</label>
                    <input type="radio" name="is_shipping" id="shipping_no" v-model="formData.is_shipping" :value="0" :checked="{'checked':formData.is_shipping}" class="radio">
                    <label for="shipping_no">Ship to different address</label>
                </li>
            </ul>
            <p class="require"><em class="required">* </em>Required Fields</p>
            <button type="submit" :disabled="btnDisabled" class="button continue"><span>Continue</span></button>
        </fieldset>
    </form>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "BillingForm",
        data(){
            return{
                formData:{
                    first_name:'',
                    last_name:'',
                    phone_no:'',
                    address:'',
                    city:'',
                    state:'',
                    postal_code:'',
                    country:'',
                    address_type:1,
                    is_shipping:0,
                },
                btnDisabled:false,
                billing_id:'',
                save_address:false,
                new_address:false,
            }
        },
        methods:{
            ...mapActions([
                'storeAddressInfo',
                'addAddressInfo',
                'getAddressInfo',
                'tabChange',
            ]),
            billingAddressStore(){
                this.btnDisabled = true;
                if(this.save_address === true && this.new_address === true){
                    // TODO from validation
                    this.storeAddressInfo(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                this.$noty.success(response.message);
                                this.continueTab();
                            }else if(response.status === 'validation'){
                                this.$noty.warning(response.message);
                            }else {
                                this.$noty.error(response.message);
                            }
                        })
                }else if(this.save_address === false && this.new_address === true){
                    // TODO From Validation
                    this.addAddressInfo(this.formData);
                    this.continueTab();
                }else{
                    let reqData = {
                        address_id: this.billing_id,
                        is_shipping:this.formData.is_shipping,
                        address_type: this.formData.address_type,
                    };

                    this.getAddressInfo(reqData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                this.$noty.success(response.message);
                                this.continueTab();
                            }else if(response.status === 'validation'){
                                this.$noty.warning(response.message);
                            }else {
                                this.$noty.error(response.message);
                            }
                        })
                }
            },
            continueTab(){
                let data = {};
                if(this.formData.is_shipping === 1){
                    data={
                        billing:{
                            'tabAction':false,
                        },
                        method:{
                            'tabAction':true,
                        },

                    };
                }else{
                    data={
                        billing:{
                            'tabAction':false,
                        },
                        shopping:{
                            'tabAction':true,
                        },

                    };
                }

                this.tabChange(data);

            }
        },
        computed:{
            ...mapGetters([
                'addressList',
            ]),
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
        },
        watch:{
            formDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.btnDisabled = false;
                    }

                }
            },
            addressList:{
                handler(newVal, oldVal){
                    if(newVal.length === 0){
                        this.new_address = true;
                    }

                }
            },
            billing_id:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        if(newVal === 0){
                            this.new_address = true;
                        }else{
                            this.new_address = false;
                        }
                    }

                }
            },
        }
    }
</script>

<style scoped>
    .show{
        display: block;
    }
    .hidden{
        display: none;
    }

</style>
