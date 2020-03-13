<template>
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>{{ $t('auth.forget_pass_header')}}</h2>
                </div>
                <fieldset class="col2-set row">
                    <div class="col-md-6 col-md-offset-3 registered-users">
                        <div class="content">
                            <form action="#" @submit.prevent="resetPassword()" autocomplete="off">
                                <ul class="form-list">
                                    <li>
                                        <label for="email">
                                            {{ $t('form.email') }}
                                            <span class="required">*</span>
                                        </label>
                                        <br />
                                        <input type="email" v-model="formData.email" required :title="$t('form.email')" class="input-text required-entry" id="email" :placeholder="$t('form.email')" />
                                    </li>
                                    <li>
                                        <label for="reg_pass">
                                            {{ $t('form.password') }}
                                            <span class="required">*</span>
                                        </label>
                                        <br />
                                        <input type="password" minlength="8" v-model="formData.password" required :title="$t('form.password')" id="reg_pass" class="input-text required-entry validate-password"  :placeholder="$t('form.password')" />
                                    </li>
                                    <li>
                                        <label for="conf_pass">
                                            {{ $t('form.confirm_pass') }}
                                            <span class="required">*</span>
                                        </label>
                                        <br />
                                        <input type="password" minlength="8" v-model="formData.password_confirmation" :title="$t('form.confirm_pass')" id="conf_pass" class="input-text required-entry validate-password" :placeholder="$t('form.confirm_pass')" />
                                    </li>
                                </ul>
                                <div class="buttons-set">
                                    <button type="submit" :disabled="btnDisabled" class="button login" ><span>{{ $t('auth.reset_btn') }}</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </fieldset>
            </div>
            <br />
            <br />
            <br />
            <br />
            <br />
        </div>
    </section>
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
                },
                btnDisabled: false,
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
                this.btnDisabled = true;
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
    .content{
        background: #f5f5f5;
        padding: 30px;
    }
    .account-login .form-list input.input-text {
        width: 100%!important;
    }
    button[disabled], html input[disabled] {
        cursor: default;
        background: #1d8be2ba!important;
        border: 1px #167bcb40 solid!important;
    }
</style>
