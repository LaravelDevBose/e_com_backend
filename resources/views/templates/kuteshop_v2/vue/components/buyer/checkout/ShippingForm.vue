<template>
    <form action="" @submit.prevent="shippingAddressStore">
        <div class="box-border">
            <ul>
                <li class="row">
                    <div class="col-sm-6">
                        <div class="categori-search  ">
                            <chosen-select v-model='shipping_id' :classList="selectOption.classList" :placeholder="selectOption.placeholder" >
                                <option value="" selected>Select an Address</option>
                                <option :value="0">New Address</option>
                                <option v-if="addressList" v-for="(address, index) in addressList"  :value="address.id" >{{ address.text }}</option>
                            </chosen-select>
                        </div>
                    </div>
                </li>
            </ul>
            <ul v-if="new_address">
                <li class="row">
                    <div class="col-sm-12">
                        <h3 class="text text-semibold text-center">New Address</h3>
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="first_name" class="required">First Name <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.first_name" required name="first_name" id="first_name" type="text">
                    </div>
                    <div class="col-sm-6">
                        <label for="last_name" class="required">Last Name</label>
                        <input name="last_name" v-model="formData.last_name"  class="input form-control" id="last_name" type="text">
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="telephone" class="required">Telephone <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.phone_no" required name="telephone" id="telephone" type="text">
                    </div>
                </li>
                <li class="row">
                    <div class="col-xs-12">
                        <label for="address" class="required">Address <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.address" required name="address" id="address" type="text">
                    </div>

                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="city" class="required">City</label>
                        <input class="input form-control" v-model="formData.city" required name="city" id="city" type="text">
                    </div>

                    <div class="col-sm-6">
                        <label for="district" class="required">District <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.district"  id="district" type="text">
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label class="required">Region <span class="text text-bold text-danger">*</span></label>
                        <chosen-select v-model='formData.region' :classList="selectOption.classList" :placeholder="'Select Your State'" >
                            <option value="">Select A Region</option>
                            <option v-for="(region,index) in regions" :key="index" :value="region.key">{{ region.name }}</option>
                        </chosen-select>
                    </div>
                    <div class="col-sm-6">
                        <label for="postal_code" class="required">Zip/Postal Code</label>
                        <input class="input form-control" v-model="formData.postal_code" name="postal_code" id="postal_code" type="text">
                    </div>
                </li>
            </ul>
            <ul>
                <li style="text-align: right">
                    <button type="submit" class="button">Continue</button>
                </li>
            </ul>
        </div>
    </form>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import ChosenSelect from '../../helper/ChosenSelect';

    export default {
        name: "ShippingForm",
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
                    country:'Somalia',
                    address_type:2,
                    is_shipping:0,
                    region:'',
                    district:'',
                },
                btnDisabled:false,
                shipping_id:'',
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
            shippingAddressStore(){
                this.btnDisabled = true;
                if(this.save_address === true && this.new_address === true){
                    // TODO from validation
                    this.storeAddressInfo(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 201){
                                this.continueTab();
                                this.$noty.success(response.message);
                            }else if(response.status === 'validation'){
                                this.$noty.warning(response.message);
                            }else {
                                this.$noty.error(response.message);
                            }
                        })
                }else if(this.save_address === false && this.new_address === true){
                    // TODO From Validation
                    this.addAddressInfo(this.formData);
                    this.$noty.success('Billing and Shipping Address added');
                    this.continueTab();
                }else{
                    if(this.shipping_id == ''){
                        this.btnDisabled = false;
                        this.$noty.warning('Select A Shipping Address');
                        return false;
                    }
                    let reqData = {
                        address_id: this.shipping_id,
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
                let data={
                    billing:{
                        'tabAction':false,
                    },
                    shopping:{
                        'tabAction':false,
                    },
                    method:{
                        'tabAction':true,
                    },
                    payment:{
                        'tabAction':false,
                    },

                };
                this.tabChange(data);

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
                this.tabChange(data);

            }
        },
        computed:{
            ...mapGetters([
                'addressList',
                'regions',
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
                        if(newVal == 0){
                            this.new_address = true;
                        }else{
                            this.new_address = false;
                        }
                        this.btnDisabled = false;
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
