<template>
    <div class="col-1 new-users">
        <strong>{{ $t('auth.buyer.reg_title') }}</strong>
        <div class="content">
            <form action="#" @submit.prevent="sellerRegister">
                <ul class="form-list">
                    <li>
                        <label for="shop">
                            {{ $t('form.shop_name') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" v-model="formData.shop_name" required title="Shop Name" class="input-text required-entry" id="shop"  placeholder="Shop Name" />
                    </li>
                    <li>
                        <label for="fullname">
                            {{ $t('form.full_name') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" v-model="formData.full_name" required title="Full Name" class="input-text required-entry" id="fullname"  placeholder="Full Name" />
                    </li>
                    <li>
                        <label for="phone">
                            {{ $t('form.phone_no') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="number" v-model="formData.phone_no" required title="Mobile Number" class="input-text required-entry" id="phone"  placeholder="Mobile" />
                    </li>
                    <li>
                        <label for="email">
                            {{ $t('form.email') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="email" v-model="formData.email" required title="Email Address" class="input-text required-entry" id="email" placeholder="Email Address" />
                    </li>
                    <!--<li>
                        <label for="username">
                            User Name
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" title="User Name" v-model="formData.user_name" required class="input-text required-entry" id="username"  placeholder="User Name" />
                    </li>-->
                    <li>
                        <label for="reg_pass">
                            {{ $t('form.password') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="password" v-model="formData.password" required title="Password" id="reg_pass" class="input-text required-entry validate-password"  placeholder="Password" />
                    </li>
                    <li>
                        <label for="conf_pass">
                            {{ $t('form.confirm_pass') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="password" v-model="formData.password_confirmation" title="Password" id="conf_pass" class="input-text required-entry validate-password" placeholder="Confirm Password" />
                    </li>
                </ul>
                <div class="buttons-set">
                    <button :disabled="disable" class="button create-account" type="submit">
                        <span>{{ $t('auth.seller.create_shop') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "RegisterPage",
        data(){
            return{
                formData:{
                    shop_name:'',
                    full_name:'',
                    phone_no:'',
                    email:'',
                    // user_name:'',
                    password:'',
                    password_confirmation:'',
                },
                disable: false,
            }
        },
        methods:{
            ...mapActions([
                'registerSeller'
            ]),
            sellerRegister(){
                this.disable = true;
                this.registerSeller(this.formData)
                    .then(response=>{
                        if(typeof  response.code === "undefined"){
                            this.$noty.error('Something Wrong! Try Again.');
                        }else if(response.status === 'validation'){
                            this.$noty.error(response.message);
                        }else if (response.code === 200){
                            this.formData.shop_name='';
                            this.formData.full_name='';
                            this.formData.phone_no='';
                            this.formData.email='';
                            this.formData.user_name='';
                            this.formData.password='';
                            this.formData.password_confirmation='';
                            this.$noty.success(response.message);
                        }else{
                            this.$noty.error('Some Thing Wrong!');
                        }
                    })
                .catch(error => {
                    this.$noty.error('Something Wrong! Try Again');
                    console.log(error);
                })

            }
        },
        computed: {
            checkFormData(){
                return JSON.parse(JSON.stringify(this.formData))
            }
        },
        watch: {
            checkFormData:{
                handler(newValue, oldValue){
                    if(oldValue !== newValue){
                        this.disable = false;
                    }
                },
                deep:true,
            },
        }

    }
</script>

<style scoped>

</style>
