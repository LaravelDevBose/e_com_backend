<template>
    <form action="" @submit.prevent="manipulateAddressBook">
        <div class="box-border">
            <ul>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="first_name" class="required">{{ $t('form.first_name')}}<span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.first_name"  id="first_name" type="text">
                    </div>
                    <div class="col-sm-6">
                        <label for="last_name" class="required">{{ $t('form.last_name')}}</label>
                        <input  v-model="formData.last_name"  class="input form-control" id="last_name" type="text">
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="telephone" class="required">{{ $t('form.phone_no')}} <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.phone_no"  id="telephone" type="text">
                    </div>
                </li>
                <li class="row">
                    <div class="col-xs-12">
                        <label for="address" class="required">{{ $t('form.address')}} <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.address"  id="address" type="text">
                    </div>

                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label for="city" class="required">{{ $t('form.city')}} <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.city"  id="city" type="text">

                    </div>
                    <div class="col-sm-6">
                        <label for="district" class="required">{{ $t('form.district')}} <span class="text text-bold text-danger">*</span></label>
                        <input class="input form-control" v-model="formData.district"  id="district" type="text">
                    </div>
                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <label class="required">{{ $t('form.region')}} <span class="text text-bold text-danger">*</span></label>
                        <chosen-select v-model='formData.region' :classList="selectOption.classList" :placeholder="$t('form.select_region')" >
                            <option value="">{{ $t('form.select_region')}}</option>
                            <option v-for="(region,index) in regions" :key="index" :value="region.key">{{ $t("state."+region.name) }}</option>
                        </chosen-select>
                    </div>
                    <div class="col-sm-6">
                        <label for="postal_code" class="required">{{ $t('form.postal_code')}}</label>
                        <input class="input form-control" v-model="formData.postal_code"  id="postal_code" type="text">
                    </div>
                </li>
                <li style="text-align: right">
                    <button type="submit"  :disabled="btnDisabled" class="button">
                        <span v-if="isedit">{{ $t('buyer.address.update_address')}}</span>
                        <span v-else>{{ $t('buyer.address.save_address')}}</span>
                    </button>
                </li>
            </ul>

        </div>
    </form>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import ChosenSelect from '../../helper/ChosenSelect';

    export default {
        name: "AddressBookCreate",
        props:{
            addressid:{
                type:[Number],
                default: ''
            },
            isedit:{
                type:[Boolean,Number],
                default:false,
            }
        },
        components:{ChosenSelect},
        data(){
            return{
                formData:{
                    address_id:'',
                    first_name:'',
                    last_name:'',
                    phone_no:'',
                    address:'',
                    city:'',
                    state:'',
                    postal_code:'',
                    country:'Somalia',
                    address_type:1,
                    region:'',
                    district:'',
                },
                btnDisabled:false,
                selectOption:{
                    classList:'categori-search-option',
                    placeholder:'All Address'
                },
            }
        },
        mounted(){
            if(this.isedit){
                this.getAddressBookInfo(this.addressid);
            }
        },
        methods:{
            ...mapActions([
                'storeAddressBook',
                'getAddressBookInfo',
                'addressBookUpdate'
            ]),
            manipulateAddressBook(){
                this.btnDisabled = true;
                //TODO Form Validation
                if(this.isedit !== false && this.addressid !== ''){
                    this.addressBookUpdate(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                this.$noty.success(response.message);
                                setTimeout(()=>{
                                    location.href = response.url;
                                },1000);
                            }else if(response.status === 'validation'){
                                this.$noty.warning(response.message);
                            }else{
                                this.$noty.error(response.message);
                            }
                        })
                }else{
                    this.storeAddressBook(this.formData)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                this.$noty.success(response.message);
                                setTimeout(()=>{
                                    location.href = response.url;
                                },1000);
                            }else if(response.status === 'validation'){
                                this.$noty.warning(response.message);
                            }
                            else{
                                this.$noty.error(response.message);
                            }
                        })
                }

            }
        },
        computed:{
            ...mapGetters([
                'addressInfo',
                'regions',
            ]),
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
            addressInfoCheck(){
                return JSON.parse(JSON.stringify(this.addressInfo));
            },
        },
        watch: {
            formDataCheck: {
                handler(newVal, oldVal) {
                    if (newVal !== oldVal) {
                        this.btnDisabled = false;
                    }

                },deep:true
            },
            addressInfoCheck: {
                handler(newVal, oldVal) {
                    if (newVal !== oldVal) {
                        this.formData.address_id = this.addressid;
                        this.formData.first_name = this.addressInfo.first_name;
                        this.formData.last_name = this.addressInfo.last_name;
                        this.formData.phone_no = this.addressInfo.phone_no;
                        this.formData.address = this.addressInfo.address;
                        this.formData.city = this.addressInfo.city;
                        this.formData.state = this.addressInfo.state;
                        this.formData.postal_code = this.addressInfo.postal_code;
                        this.formData.country = this.addressInfo.country;
                        this.formData.address_type = this.addressInfo.address_type;
                        this.formData.region = this.addressInfo.region;
                        this.formData.district = this.addressInfo.district;
                    }

                },deep:true,
            },
        }
    }
</script>

<style scoped>

</style>
