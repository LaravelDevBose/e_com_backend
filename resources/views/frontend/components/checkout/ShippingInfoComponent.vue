<template>
    <div class="box-border">
        <ul>
            <li class="row">
                <div class="col-sm-4">
                    <label for="first_name_1" class="required">First Name <span class="text text-bold text-danger">*</span></label>
                    <input class="input form-control" v-model="shipping_data.first_name" name="first_name_1" id="first_name_1" type="text" required>
                </div>
                <div class="col-sm-4">
                    <label for="last_name_1" class="required">Last Name</label>
                    <input class="input form-control" v-model="shipping_data.last_name" name="last_name_1" id="last_name_1" type="text">
                </div>
                <div class="col-sm-4">
                    <label for="telephone_1" class="required">Telephone <span class="text text-bold text-danger">*</span></label>
                    <input class="input form-control" v-model="shipping_data.phone_no"  name="telephone_1" id="telephone_1" type="text" required>
                </div>
            </li>
            <li class="row">
                <div class="col-xs-12">
                    <label for="address_1" class="required">Address <span class="text text-bold text-danger">*</span></label>
                    <input class="input form-control" v-model="shipping_data.address" name="address_1" id="address_1" type="text" required>
                </div>
            </li>

            <li class="row">
                <div class="col-sm-4">
                    <label for="city_1" class="required">District</label>
                    <input class="input form-control" v-model="shipping_data.district" name="city_1" id="city_1" type="text">
                </div>
                <div class="col-sm-4">
                    <label for="division" class="required">Division</label>
                    <input class="input form-control" v-model="shipping_data.division"  name="city_1" id="division" type="text">
                </div>
                <div class="col-sm-4">
                    <label for="postal_code_1" class="required">Zip/Postal Code <span class="text text-bold text-danger">*</span></label>
                    <input class="input form-control" v-model="shipping_data.postal_code"  name="postal_code_1" id="postal_code_1" type="text" required>
                </div>
            </li>

        </ul>
        <button class="button" @click.prevent="storeShippingInfo()">Continue</button>
    </div>
</template>

<script>
import {mapGetters,mapActions} from 'vuex';
export default {
    name: "ShippingInfoComponent",
    data(){
        return{
            shipping_data:{
                first_name:'',
                last_name: '',
                phone_no:'',
                address:'',
                district: '',
                division: '',
                postal_code:''
            }
        }
    },
    methods:{
        ...mapActions(['updateShippingInfo']),
        storeShippingInfo(){
            let validate = false;
            if (!this.shipping_data.first_name){
                this.$noty.warning('Please Enter First Name');
                validate = true;
            }
            if (!this.shipping_data.phone_no){
                this.$noty.warning('Please Enter Phone No');
                validate = true;
            }
            if (!this.shipping_data.address){
                this.$noty.warning('Please Enter Address');
                validate = true;
            }
            if (!this.shipping_data.postal_code){
                this.$noty.warning('Please Enter Postal Code');
                validate = true;
            }

            if (validate){
                return false;
            }
            this.updateShippingInfo(this.shipping_data);
        }
    },
    computed:{
        ...mapGetters(['checkoutData']),
        checkCheckoutData(){
            return JSON.parse(JSON.stringify(this.checkoutData));
        }
    },
    watch:{
        checkCheckoutData:{
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    if (this.checkoutData.shipping_info){
                        let shippingInfo = this.checkoutData.shipping_info;
                        if (shippingInfo.first_name){
                            this.shipping_data.first_name = shippingInfo.first_name;
                        }
                        if (shippingInfo.last_name){
                            this.shipping_data.last_name = shippingInfo.last_name;
                        }
                        if (shippingInfo.phone_no){
                            this.shipping_data.phone_no = shippingInfo.phone_no;
                        }
                        if (shippingInfo.address){
                            this.shipping_data.address = shippingInfo.address;
                        }
                        if (shippingInfo.district){
                            this.shipping_data.district = shippingInfo.district;
                        }
                        if (shippingInfo.division){
                            this.shipping_data.division = shippingInfo.division;
                        }
                        if (shippingInfo.postal_code){
                            this.shipping_data.postal_code = shippingInfo.postal_code;
                        }
                    }
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
