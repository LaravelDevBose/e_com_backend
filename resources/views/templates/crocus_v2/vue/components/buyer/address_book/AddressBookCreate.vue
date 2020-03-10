<template>
    <section class="col-sm-9 wow bounceInUp animated">
        <form  @submit.prevent="manipulateAddressBook">
            <fieldset class="group-select">
                <fieldset>
                    <legend> {{ $t('buyer.address.menu')}}</legend>
                    <ul>
                        <li>
                            <div class="customer-name">
                                <div class="input-box name-firstname">
                                    <label for="firstname"> {{ $t('form.first_name')}} <span class="required">*</span> </label>
                                    <br>
                                    <input type="text" id="firstname" v-model="formData.first_name" title="First Name" class="input-text required-entry">
                                </div>
                                <div class="input-box name-lastname">
                                    <label for="lastname"> {{ $t('form.last_name')}} <span class="required">*</span> </label>
                                    <br>
                                    <input type="text" id="lastname" v-model="formData.last_name" title="Last Name" class="input-text required-entry">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="telephone">{{ $t('form.phone_no')}} <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.phone_no" title="Telephone" class="input-text required-entry" id="telephone">
                            </div>
                            <div class="input-box">
                                <label for="address">{{ $t('form.address')}} <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.address" title="Street Address" id="address" class="input-text required-entry">
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="city">{{ $t('form.city')}} <span class="required">*</span></label>
                                <br>
                                <input type="text" title="City" v-model="formData.city" class="input-text required-entry" id="city">
                            </div>
                            <div class="input-box">
                                <label for="district">{{ $t('form.district')}}  <span class="required">*</span></label>
                                <br>
                                <input type="text" title="District" v-model="formData.district" class="input-text required-entry" id="district">
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label>{{ $t('form.region')}} <span class="required">*</span></label>
                                <br>
                                <select v-model='formData.region'  >
                                    <option value="">{{ $t('form.select_region')}}</option>
                                    <option v-for="(region,index) in regions" :key="index" :value="region.key">{{ $t("state."+region.name) }}</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <label for="postcode">{{ $t('form.postal_code')}}</label>
                                <br>
                                <input type="text" v-model="formData.postal_code" title="Zip/Postal Code" id="postcode" class="input-text validate-zip-international">
                            </div>
                        </li>
                        <li>
                            <p class="require">
                                <em class="required">*</em>{{ $t('form.required')}}
                            </p>
                            <button :disabled="btnDisabled" type="submit" class="button continue">
                                <span v-if="isedit">{{ $t('buyer.address.update_address')}}</span>
                                <span v-else>{{ $t('buyer.address.save_address')}}</span>
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
