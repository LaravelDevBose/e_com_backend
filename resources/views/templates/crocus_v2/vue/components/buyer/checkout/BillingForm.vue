<template>
    <form id="co-billing-form" action="" @submit.prevent="billingAddressStore">
        <fieldset class="group-select">
            <ul>
                <li>
                    <label for="billing-address-select">Select a billing address from your address book or enter a new address.</label>
                    <br>
                    <select name="billing_address_id" id="billing-address-select" class="address-select" title="">
                        <option value="">New Address</option>
                        <option value="1" selected="selected">Jon D, Hunts Ville, MG, Alabama 46532, United States</option>
                    </select>
                </li>
                <li id="billing-new-address-form" >
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
                    <input type="radio" id="shipping_yes" v-model="formData.is_shipping" value="1" class="radio">
                    <label for="shipping_yes">Ship to this address</label>
                    <input type="radio" id="shipping_no" v-model="formData.is_shipping" value="0" :checked="{'checked':formData.is_shipping}" class="radio">
                    <label for="shipping_no">Ship to different address</label>
                </li>
            </ul>
            <p class="require"><em class="required">* </em>Required Fields</p>
            <button type="submit" class="button continue"><span>Continue</span></button>
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
                    address1:'',
                    address2:'',
                    city:'',
                    state:'',
                    postal_code:'',
                    country:'',
                    address_type:1,
                    is_shipping:0,
                },
                btnDisabled:false,
                billing_address_id:'',
                save_address:true,
            }
        },
        mounted(){

        },
        methods:{
            ...mapActions([
                'storeAddressInfo',
            ]),
            billingAddressStore(){
                this.btnDisabled = true;
                console.log(this.formData);

                if(this.save_address){
                    // TODO from validation
                    this.storeAddressInfo(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 201){
                                //TODO  Use Notify
                                alert(response.message);
                            }else if(response.status === 'validation'){
                                //TODO Validation Notify
                                alert(response.message);
                            }else {
                                alert(response.message);
                            }
                        })
                }else{
                    console.log('not Saved');
                }

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
        }
    }
</script>

<style scoped>

</style>
