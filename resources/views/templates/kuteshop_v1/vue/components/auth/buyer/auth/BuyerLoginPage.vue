<template>
    <div class="box-authentication">
        <h3>Already registered?</h3>
        <form action="" @submit.prevent="buyerLogin" autocomplete="off">
            <div class="row">
                <div class="col-md-10">
                    <label for="emmail_login">Email/Username <span class="text text-danger text-bold">*</span></label>
                    <input type="text" v-model="formData.identity" autocomplete="off" placeholder="Email/Username" required class="form-control" id="emmail_login">
                </div>
                <div class="col-md-10">
                    <label for="password_login">Password <span class="text text-danger text-bold">*</span></label>
                    <input type="password" v-model="formData.password" autocomplete="off" minlength="8" placeholder="Password" required class="form-control" id="password_login">
                </div>
                <div class="col-md-10">
                    <p class="forgot-pass"><a href="#">Forgot your password?</a></p>
                    <button type="submit" class="button text-right"><i class="fa fa-lock"></i> Sign in</button>
                </div>
            </div>
        </form>

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
                    this.$noty.info('Email Or Username is Required');
                    // Notify.validation();
                    return false;
                }
                if(this.formData.password === null || this.formData.password === ''){
                    this.$noty.error('Password is Required');
                    return false;
                }

                if(this.formData.password.length < 6){
                    this.$noty.error('Password is Min 6 Digit');
                    return false;
                }

                this.loginBuyer(this.formData)
                    .then(response=>{
                        if(typeof  response.code === "undefined"){
                            this.$noty.error('Some Thing Wrong!');
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else if (response.code === 200){
                            this.$noty.success(response.message);
                            if(this.cartTotal > 0){
                                location.href = '/buyer/checkout';
                            }
                            setTimeout(function () {
                                location.href = response.url;
                            },800);
                        }else{
                            this.$noty.error(response.message);
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
    .box-authentication {
        margin-bottom: 15px!important;
    }
</style>
