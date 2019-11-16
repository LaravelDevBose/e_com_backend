<template>
    <section class="col-sm-9 wow bounceInUp animated">
        <form  @submit.prevent="makeSellerAccount">
            <fieldset class="group-select">
                <fieldset>
                    <legend>Sell With Dukaanso. Register Your Seller Account</legend>
                    <ul>
                        <li>
                            <div class="customer-name">
                                <div class="input-box name-firstname">
                                    <label for="seller_name"> Seller Name <span class="required">*</span> </label>
                                    <br>
                                    <input type="text" id="seller_name" v-model="formData.seller_name" title="Seller Name" class="input-text required-entry">
                                </div>
                                <div class="input-box name-lastname">
                                    <label for="seller_email"> Seller Email <span class="required">*</span> </label>
                                    <br>
                                    <input type="text" id="seller_email" v-model="formData.seller_email" title="Seller Email" class="input-text required-entry">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="input-box">
                                <label for="seller_phone">Telephone <span class="required">*</span></label>
                                <br>
                                <input type="text" v-model="formData.seller_phone" title="Telephone" class="input-text required-entry" id="seller_phone">
                            </div>
                            <div class="input-box">
                                <label for="billing_street">Address <span class="required">*</span></label>
                                <br>
                                <textarea rows="2" v-model="formData.seller_address" title="Seller Address" placeholder="Seller Address" id="billing_street" class="input-text required-entry"></textarea>
                            </div>
                        </li>
                        <li>
                            <p class="require">
                                <em class="required">*</em>Required Fields
                            </p>
                            <button :disabled="btnDisabled" type="submit" class="button continue">
                                <span >Register</span>
                            </button>
                        </li>
                    </ul>
                </fieldset>
            </fieldset>
        </form>
    </section>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name: "MakeSellerPage",
        props:{
            user:{
                type:[Object],
                default:''
            }
        },
        data(){
            return{
                formData:{
                    seller_name:'',
                    seller_email:'',
                    seller_phone:'',
                    seller_address:'',
                    seller_type:'2',
                },
                btnDisabled:false,
                is_edit:false,
            }
        },
        mounted(){
            if (this.user !== ''){
                this.formData.seller_name = this.user.full_name;
                this.formData.seller_email = this.user.email;
                this.formData.seller_phone = this.user.phone_no;
            }
        },
        methods:{
            ...mapActions([
                'registerSellerAccount'
            ]),
            makeSellerAccount(){
                this.registerSellerAccount(this.formData)
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
            }
        },
        computed:{
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            }
        },
        watch:{
            formDataCheck: {
                handler(newVal, oldVal) {
                    if (newVal !== oldVal) {
                        this.btnDisabled = false;
                    }

                },deep:true
            }
        }
    }
</script>

<style scoped>

</style>
