<template>
    <section class="col-sm-9 wow bounceInUp animated">
        <form id="co-billing-form" @submit.prevent="storeAddress">
            <fieldset class="group-select">
                <fieldset>
                    <legend>Address Book</legend>
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
                            <div class="input-box">
                                <label for="billing_telephone">Telephone <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.phone_no" title="Telephone" class="input-text required-entry" id="billing_telephone">
                            </div>
                            <div class="input-box">
                                <label for="billing_street">Address <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.address" title="Street Address" id="billing_street" class="input-text required-entry">
                            </div>
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
                            <p class="require">
                                <em class="required">*</em>Required Fields
                            </p>
                            <button :disabled="btnDisabled" type="submit" class="button continue">
                                <span>Save Address</span>
                            </button>
                        </li>
                    </ul>
                </fieldset>
            </fieldset>
        </form>
    </section>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "AddressBookCreate",
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
            }
        },
        methods:{
            ...mapActions([
                'storeAddressBook'
            ]),
            storeAddress(){
                this.btnDisabled = true;
                //TODO Form Validation
                this.storeAddressBook(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            //TODO  User Alert Function
                            alert(response.message);
                            location.href = '/buyer/address-book/list';
                        }else{
                            alert(response.message);
                        }
                    })
            }
        },
        computed:{
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
        },
        watch: {
            formDataCheck: {
                handler(newVal, oldVal) {
                    if (newVal !== oldVal) {
                        this.btnDisabled = false;
                    }

                }
            },
        }
    }
</script>

<style scoped>

</style>
