<template>
    <div class="col-2 registered-users">
        <strong>Registered Seller</strong>
        <div class="content">
            <p>If you have an account with us, please log in.</p>
            <form action="#" @submit.prevent="sellerLogin">
                <ul class="form-list">
                    <li>
                        <label for="identity">
                            Email/Username
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" title="Email Address" class="input-text required-entry" id="identity" v-model="formData.identity" required placeholder="Email Or Username" />
                    </li>
                    <li>
                        <label for="pass">
                            Password
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" v-model="formData.password" placeholder="Password" />
                    </li>
                </ul>
                <p class="required">* Required Fields</p>
                <div class="buttons-set">
                    <button type="submit" class="button login" ><span>Login</span></button>
                    <a class="forgot-word" href="http://demo.themessoft.com/computerstore/customer/account/forgotpassword/">Forgot Your Password?</a>
                </div>
            </form>

        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';

    export default {
        name: "LoginPage",
        data(){
            return{
                formData:{
                    identity:'',
                    password:''
                }
            }
        },
        methods:{
            ...mapActions([
                'loginSeller'
            ]),
            sellerLogin(){
                if(this.formData.identity === null || this.formData.identity === ''){
                    this.$noty.warning('Email Or Username is Required');
                    return false;
                }
                if(this.formData.password === null || this.formData.password === ''){
                    this.$noty.warning('Password is Required');
                    return false;
                }

                if(this.formData.password.length < 8){
                    this.$noty.warning('Password is Min 8 Digit');
                    return false;
                }

                this.loginSeller(this.formData)
                    .then(response=>{
                        if(typeof  response.code === "undefined"){
                            this.$noty.error('Some Thing Wrong!');
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else if (response.code === 200){
                            this.$noty.success(response.message);
                            setTimeout(function () {
                                location.href = response.url;
                            },800)
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>
