<template>
    <main class="site-main">
        <div class="columns container" style="margin-top: 2rem">
            <!-- Block  Breadcrumb-->
            <h2 class="page-heading">
                <span class="page-heading-title2">Reset Your Password</span>
            </h2>

            <div class="page-content">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="box-authentication">
                            <form method="POST" @submit.prevent="resetPassword()" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="emmail_login">Email<span class="text text-danger text-bold">*</span></label>
                                        <input type="email" v-model="formData.email" name="email" autocomplete="off" placeholder="email"  required class="form-control" id="emmail_login">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="password_login">New Password<span class="text text-danger text-bold">*</span></label>
                                        <input type="password" v-model="formData.password" name="password" autocomplete="off" minlength="8" :placeholder="$t('form.password')" required class="form-control" id="password_login">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="password_con">Confirm Password <span class="text text-danger text-bold">*</span></label>
                                        <input type="password" v-model="formData.password_confirmation" name="password_confirmation" minlength="8" required :placeholder="$t('form.confirm_pass')" class="form-control" id="password_con">
                                    </div>
                                    <div class="col-md-10">
                                        <button type="submit" class="button text-right"><i class="fa fa-lock"></i> Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    import {mapActions} from 'vuex';
    export default {
        name: "ResetPasswordPage",
        props:['email', 'token'],
        data(){
            return{
                formData:{
                    token:'',
                    email:'',
                    password:'',
                    password_confirmation:''
                }
            }
        },
        created() {
            if(this.email !== ''){
                this.formData.email = this.email;
            }
            if(this.token !== ''){
                this.formData.token = this.token;
            }else{
                this.$noty.error('Invalid Request Token');
                setTimeout(()=>{
                    location.href='/';
                },2000);
            }

        },
        methods:{
            ...mapActions([
                'passwordReset'
            ]),
            resetPassword(){
                this.passwordReset(this.formData)
                .then(response=>{
                    if(typeof response.code !== "undefined" && response.code === 200){
                        this.$noty.success(response.message);
                        setTimeout(()=>{
                            location.href='/';
                        },2000);
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
