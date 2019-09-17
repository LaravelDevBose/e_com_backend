<template>
    <form action="" id="co-shipping-form" @submit="shippingAddressStore">
        <fieldset class="group-select">
            <ul>
                <li>
                    <label for="shipping-address-select">Select a shipping address from your address book or enter a new address.</label>
                    <br>
                    <select name="shipping_address_id" v-model="shipping_id" id="shipping-address-select" class="address-select" title="">
                        <option :value="0">New Address</option>
                        <option v-if="addressList" v-for="(address, index) in addressList"  :value="address.id" :selected="{selected:(index===0 || billing_id === address.id)}">{{ address.text }}</option>
                    </select>
                </li>
                <li id="shipping-new-address-form" :class="new_address?'show':'hidden'">
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
            </ul>
            <p class="require"><em class="required">* </em>Required Fields</p>
            <div class="buttons-set1" id="shipping-buttons-container">
                <button type="submit" :disabled="btnDisabled" class="button"><span>Continue</span></button>
                <a href="#" @click.prevent="backTab()"  class="back-link">« Back</a>
            </div>
        </fieldset>
    </form>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "ShippingForm",
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
                    address_type:2,
                    is_shipping:0,
                },
                btnDisabled:false,
                shipping_id:'',
                save_address:false,
                new_address:false,
            }
        },
        methods:{
            ...mapActions([
                'storeAddressInfo',
                'addAddressInfo',
                'getAddressInfo',
                'closeTab',
            ]),
            shippingAddressStore(){
                this.btnDisabled = true;
                if(this.save_address === true && this.new_address === true){
                    // TODO from validation
                    this.storeAddressInfo(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 201){
                                //TODO  Use Notify
                                alert(response.message);
                                this.forwardTab();
                            }else if(response.status === 'validation'){
                                //TODO Validation Notify
                                alert(response.message);
                            }else {
                                alert(response.message);
                            }
                        })
                }else if(this.save_address === false && this.new_address === true){
                    // TODO From Validation
                    this.addAddressInfo(this.formData);
                    this.forwardTab();
                }else{
                    let reqData = {
                        address_id: this.shipping_id,
                        is_shipping:this.formData.is_shipping,
                        address_type: this.formData.address_type,
                    };

                    this.getAddressInfo(reqData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                //TODO  Use Notify
                                alert(response.message);
                                this.forwardTab();
                            }else if(response.status === 'validation'){
                                //TODO Validation Notify
                                alert(response.message);
                            }else {
                                alert(response.message);
                            }
                        })
                }
            },
            forwardTab(){
                let data={
                    billing:{
                        'tabAction':false,
                    },
                    shopping:{
                        'tabAction':true,
                    },

                };
                this.closeTab(data);

            },
            backTab(){
                let data={
                    billing:{
                        'tabAction':true,
                    },
                    shopping:{
                        'tabAction':false,
                    },

                };
                this.closeTab(data);

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
            shipping_id:{
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
