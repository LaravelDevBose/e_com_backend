<template>
    <div class="col-2 registered-users">
        <strong>Registered Customer</strong>
        <div class="content">
            <p>If you have an account with us, please log in.</p>
            <form action="#" @submit.prevent="buyerLogin">
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
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "BuyerLoginPage",
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
                'loginBuyer'
            ]),
            buyerLogin(){
                if(this.formData.identity === null || this.formData.identity === ''){
                    Notify.validation('Email Or Username is Required');
                    return false;
                }
                if(this.formData.password === null || this.formData.password === ''){
                    Notify.validation('Password is Required');
                    return false;
                }

                if(this.formData.password.length < 6){
                    Notify.validation('Password is Min 6 Digit');
                    return false;
                }

                this.loginBuyer(this.formData)
                    .then(response=>{
                        if(typeof  response.code === "undefined"){

                            // TODO Notify Message
                            alert('Some Thing Wrong!');
                            Notify.error('Some Thing Wrong!');
                        }else if(response.status === 'validation'){

                            // TODO Notify Message
                            alert(response.message);
                            Notify.validation(response.message);
                        }else if (response.code === 200){

                            alert(response.message);
                            // TODO Notify Message
                            Notify.success(response.message);
                            if(this.cartTotal > 0){
                                location.href = '/buyer/checkout';
                            }
                            setTimeout(function () {
                                location.href = response.url;
                            },800);
                        }else{
                            alert('Some Thing Wrong!');

                            // TODO Notify Message
                            Notify.error('Some Thing Wrong!');
                            setTimeout(function () {
                                location.reload();
                            },800);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'cartTotal'
            ])
        }
    }
</script>

<style scoped>

</style>
