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
                            <form action="#" @submit.prevent="sentResetLink" autocomplete="off">
                                <ul class="form-list">
                                    <li>
                                        <label for="identity">
                                            {{ $t('form.email')}}
                                            <span class="required">*</span>
                                        </label>
                                        <br />
                                        <input type="text" title="Email Address" class="input-text required-entry" id="identity" v-model="formData.email" required :placeholder=" $t('form.email')" />
                                        <p class="text text-primary text-bold" v-if="msg"> Forget Password Mail Send.</p>
                                    </li>
                                </ul>
                                <div class="buttons-set">
                                    <button type="submit" :disabled="btnDisabled" class="button login" ><span>{{ $t('auth.forget_pass_btn') }}</span></button>
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
        name: "ForgetPasswordPage",
        data(){
            return{
                formData:{
                    email:''
                },
                btnDisabled: false,
                msg: false,
            }
        },
        methods:{
            ...mapActions([
                'sendPasswordResetLink'
            ]),
            sentResetLink(){
                this.btnDisabled = true;
                this.sendPasswordResetLink(this.formData)
                .then(response=>{
                    if(typeof response.code !== "undefined" && response.code === 200){
                        this.msg = true;
                        this.$noty.success(response.message);
                    }else{
                        this.btnDisabled = false;
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
