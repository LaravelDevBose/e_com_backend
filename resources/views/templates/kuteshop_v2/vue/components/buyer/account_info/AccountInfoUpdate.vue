<template>
    <div class="row">
        <div class="col-md-8">
            <form action="" @submit.prevent="updateBuyerInfo">
                <div class="box-border">
                    <ul>
                        <li class="row">
                            <div class="col-xs-12">
                                <label for="full_name" class="required">Full Name <span class="text text-bold text-danger">*</span></label>
                                <input class="input form-control" v-model="formData.full_name"  id="full_name" type="text">
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
                                <input class="input form-control" v-model="formData.buyer_address"  id="address" type="text">
                            </div>
                        </li>

                        <li style="text-align: right; margin-top: 10px;">
                            <button type="submit"  :disabled="btnDisabled" class="button">
                                <span>Update</span>
                            </button>
                        </li>
                    </ul>

                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-xs-12">
                            <h5 class="page-heading" style="margin-bottom:5px;">
                                <span class="page-heading-title1">Identity</span>
                            </h5>
                        </div>
                    </li>
                    <li class="row">
                        <div class="col-xs-12">
                            <label class="required">Username: {{ buyerInfo.user_name }}</label>
                        </div>
                    </li>
                    <li class="row">
                        <div class="col-xs-12">
                            <label class="required">Email: {{ buyerInfo.email }}</label>
                        </div>
                    </li>
                    <li class="row">
                        <div class="col-xs-12">
                            <label class="required"> Account Type:
                                <span v-if="buyerInfo.is_seller === 1">Buyer & Seller</span>
                                <span v-else>Buyer</span>
                            </label>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions,mapGetters} from 'vuex';
    export default {
        name: "AccountInfoUpdate",
        data(){
            return{
                formData:{
                    full_name:'',
                    phone_no:'',
                    buyer_address:'',
                },
                btnDisabled:false,
            }
        },
        created(){
            this.getBuyerDetails();
        },
        methods:{
            ...mapActions([
                'getBuyerDetails',
                'buyerInfoUpdate',
            ]),
            updateBuyerInfo(){
                this.btnDisabled = true;
                this.buyerInfoUpdate(this.formData)
                    .then(response=>{
                       if(typeof response.code !== 'undefined' && response.code === 200){
                           this.$noty.success(response.message);
                           this.btnDisabled = false;
                       }else if(response.status === 'validation'){
                           this.$noty.warning(response.message);
                       }else{
                           this.$noty.error(response.message);
                       }
                    });
            }
        },
        computed:{
            ...mapGetters([
                'buyerInfo',
            ]),
            checkBuyerInfo(){
                return JSON.parse(JSON.stringify(this.buyerInfo))
            },
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
        },
        watch:{
            checkBuyerInfo:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.formData.full_name = this.buyerInfo.full_name;
                        this.formData.phone_no = this.buyerInfo.phone_no;
                        this.formData.buyer_address = this.buyerInfo.buyer.buyer_address;
                    }
                },
                deep:true,
            },
            formDataCheck: {
                handler(newVal, oldVal) {
                    if (newVal !== oldVal) {
                        this.btnDisabled = false;
                    }

                },
                deep:true
            },
        }

    }
</script>

<style scoped>

</style>
