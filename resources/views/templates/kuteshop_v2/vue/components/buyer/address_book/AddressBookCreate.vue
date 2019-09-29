<template>
    <form action="" @submit.prevent="storeAddress">
        <div class="box-border">
            <ul>
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
                <li style="text-align: right">
                    <button type="submit"  :disabled="btnDisabled" class="button">Save Address</button>
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
                selectOption:{
                    classList:'categori-search-option',
                    placeholder:'All Address'
                },
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
                            this.$noty.success(response.message);
                            setTimeout(()=>{
                                location.href = '/buyer/address-book/list';
                            },1000);
                        }else{
                            this.$noty.error(response.message);
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
