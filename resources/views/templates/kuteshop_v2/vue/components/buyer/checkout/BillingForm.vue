<template>
    <form action="" >
        <div class="box-border">
            <ul>
                <li class="row">
                    <div class="col-sm-6">
                        <div class="categori-search  ">
                            <chosen-select v-model='billing_id' :classList="selectOption.classList" :placeholder="selectOption.placeholder" >
                                <option :value="0">New Address</option>
                                <option v-if="addressList" v-for="(address, index) in addressList"  :value="address.id" :selected="{selected:(index===0 || billing_id === address.id)}">{{ address.text }}</option>
                            </chosen-select>
                        </div>
                    </div>
                </li>
            </ul>
            <ul :class="new_address?'show':'hidden'">
                <li class="row">
                    <div class="col-sm-12">
                        <h3 class="text text-semibold text-center">New Address</h3>
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="first_name" class="required">First Name <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.first_name"  id="first_name" type="text">
                    </div>
                    <div class="col-sm-6">
                        <label for="last_name" class="required">Last Name</label>
                        <input  v-model="formData.last_name"  class="input form-control" id="last_name" type="text">
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="telephone" class="required">Telephone <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.phone_no"  id="telephone" type="text">
                    </div>
                </li>
                <li class="row">
                    <div class="col-xs-12">
                        <label for="address" class="required">Address <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.address"  id="address" type="text">
                    </div>

                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="city" class="required">City <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.city"  id="city" type="text">

                    </div>

                    <div class="col-sm-6">
                        <label class="required">State/Province <span class="text text-bold text-danger">*</span></label>
                        <chosen-select v-model='formData.state' :classList="selectOption.classList" :placeholder="'Select Your State'" >
                            <option value="Alabama">Alabama</option>
                            <option value="Illinois">Illinois</option>
                            <option value="Kansas">Kansas</option>
                        </chosen-select>
                    </div>
                </li>
                <li class="row">

                    <div class="col-sm-6">
                        <label for="postal_code" class="required">Zip/Postal Code <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.postal_code"  id="postal_code" type="text">
                    </div>

                    <div class="col-sm-6">
                        <label class="required">Country <span class="text text-bold text-danger">*</span></label>
                        <chosen-select v-model='formData.country' :classList="selectOption.classList" :placeholder="'Select Your Country'" >
                            <option value="USA">USA</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Canada">Canada</option>
                        </chosen-select>
                    </div>
                </li>
            </ul>
            <ul>
                <li class="row">
                    <div class="col-sm-3">
                        <label for="save_address" style="padding:10px;">
                            <input  id="save_address" type="checkbox"> Save as Address Book</label>

                    </div>
                    <div class="col-sm-3">
                        <label for="is_shipping" style="padding:10px;">
                            <input  v-model="formData.is_shipping"   id="is_shipping" type="checkbox"> Also As Shipping Address</label>
                    </div>
                </li>
                <li style="text-align: right">
                    <button type="button" @click.prevent="billingAddressStore" :disabled="btnDisabled" class="button">Continue</button>
                </li>
            </ul>
        </div>
    </form>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import ChosenSelect from '../../helper/ChosenSelect';

    export default {
        name: "BillingForm",
        components:{ChosenSelect},
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
                selectOption:{
                    classList:'categori-search-option',
                    placeholder:'All Address'
                },
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
                            if(typeof response.code !== "undefined" && response.code === 201){
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
                        if(newVal == 0){
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
