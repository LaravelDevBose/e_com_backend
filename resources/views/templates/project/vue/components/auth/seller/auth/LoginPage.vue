<template>
    <div class="box-authentication">
        <h3>{{ $t('auth.seller.login_title')}}</h3>
        <form action="" @submit.prevent="sellerLogin" autocomplete="off">
            <div class="row">
                <div class="col-md-10">
                    <label for="emmail_login">{{ $t('form.email')}}<span class="text text-danger text-bold">*</span></label>
                    <input type="email" v-model="formData.identity" autocomplete="off" placeholder="email" required class="form-control" id="emmail_login">
                </div>
                <div class="col-md-10">
                    <label for="password_login">{{ $t('form.password') }} <span class="text text-danger text-bold">*</span></label>
                    <input type="password" v-model="formData.password" autocomplete="off" minlength="8" :placeholder="$t('form.password')" required class="form-control" id="password_login">
                </div>
                <div class="col-md-10">
                    <p class="forgot-pass"><a href="#">{{ $t('auth.forgot_pass') }}</a></p>
                    <button type="submit" class="button text-right"><i class="fa fa-lock"></i> {{ $t('auth.sign_in') }}</button>
                </div>
            </div>
        </form>
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
