<template>
    <div class="col-1 new-users">
        <strong>New Customers</strong>
        <div class="content">
            <form action="#" @submit.prevent="sellerRegister">
                <ul class="form-list">
                    <li>
                        <label for="shop">
                            Shop Name
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" v-model="formData.shop_name" required title="Shop Name" class="input-text required-entry" id="shop"  placeholder="Shop Name" />
                    </li>
                    <li>
                        <label for="fullname">
                            Full Name
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" v-model="formData.full_name" required title="Full Name" class="input-text required-entry" id="fullname"  placeholder="Full Name" />
                    </li>
                    <li>
                        <label for="phone">
                            Mobile
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="number" v-model="formData.phone_no" required title="Mobile Number" class="input-text required-entry" id="phone"  placeholder="Mobile" />
                    </li>
                    <li>
                        <label for="email">
                            Email Address
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="email" v-model="formData.email" required title="Email Address" class="input-text required-entry" id="email" placeholder="Email Address" />
                    </li>
                    <li>
                        <label for="username">
                            User Name
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" title="User Name" v-model="formData.user_name" required class="input-text required-entry" id="username"  placeholder="User Name" />
                    </li>
                    <li>
                        <label for="reg_pass">
                            Password
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="password" v-model="formData.password" required title="Password" id="reg_pass" class="input-text required-entry validate-password"  placeholder="Password" />
                    </li>
                    <li>
                        <label for="conf_pass">
                            Confirm Password
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="password" v-model="formData.password_confirmation" title="Password" id="conf_pass" class="input-text required-entry validate-password" placeholder="Confirm Password" />
                    </li>
                </ul>
                <div class="buttons-set">
                    <button class="button create-account" type="submit">
                        <span>Create an Account</span>
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
                    user_name:'',
                    password:'',
                    password_confirmation:'',
                }
            }
        },
        methods:{
            ...mapActions([
                'registerSeller'
            ]),
            sellerRegister(){

                this.registerSeller(this.formData)
                    .then(response=>{
                        if(typeof  response.code === "undefined"){
                            this.$noty.error('Some Thing Wrong!');
                        }else if(response.status === 'validation'){
                            this.$noty.error(response.message);
                        }else if (response.code === 200){
                            this.$noty.success(response.message);
                        }else{
                            this.$noty.error('Some Thing Wrong!');
                        }
                    })

            }
        }
    }
</script>

<style scoped>

</style>
