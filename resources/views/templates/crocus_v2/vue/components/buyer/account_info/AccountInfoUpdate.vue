<template>
    <section class="wow bounceInUp animated">
        <div class="row">
            <div class="col-md-8">
                <form id="co-billing-form" @submit.prevent="updateBuyerInfo">
                    <div class="group-select">
                        <ul>
                            <li>
                                <div class="customer-name">
                                    <label for="full_name"> Full Name <span class="required">*</span> </label>
                                    <br>
                                    <input type="text" id="full_name" v-model="formData.full_name" title="Full Name" class="input-text required-entry">
                                </div>
                            </li>
                            <li>
                                <label for="phone_no">Telephone <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.phone_no" title="Telephone" class="input-text required-entry" id="phone_no">
                            </li>
                            <li>
                                <label for="address">Address <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.buyer_address" title="Street Address" id="address" class="input-text required-entry">
                            </li>
                            <li>
                                <p class="require">
                                    <em class="required">*</em>Required Fields
                                </p>
                                <button :disabled="btnDisabled" type="submit" class="button continue">
                                    <span>Update</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="block block-account">
                    <div class="block-title">My Account</div>
                    <div class="block-content">
                        <ul style="list-style: none; padding:0;">
                            <li>
                                <a href="#" >Username: {{ buyerInfo.user_name }}</a>
                            </li>
                            <li>
                                <a href="#" >Email: {{ buyerInfo.email }}</a>
                            </li>
                            <li>
                                <a href="#" >Account Type:
                                    <span v-if="buyerInfo.is_seller === 1">Buyer & Seller</span>
                                    <span v-else>Buyer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
