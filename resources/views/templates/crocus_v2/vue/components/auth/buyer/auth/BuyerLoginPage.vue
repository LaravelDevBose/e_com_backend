<template>
    <div class="col-2 registered-users">
        <strong>{{ $t('auth.buyer.login_title')}}</strong>
        <div class="content">
            <p>{{ $t('auth.buyer.login_sub_title')}}</p>
            <form action="#" @submit.prevent="buyerLogin">
                <ul class="form-list">
                    <li>
                        <label for="identity">
                            {{ $t('form.email')}}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="text" title="Email Address" class="input-text required-entry" id="identity" v-model="formData.identity" required :placeholder=" $t('form.email')" />
                    </li>
                    <li>
                        <label for="pass">
                            {{ $t('form.password') }}
                            <span class="required">*</span>
                        </label>
                        <br />
                        <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" v-model="formData.password" :placeholder="$t('form.password')" />
                    </li>
                </ul>
                <p class="required">* {{ $t('auth.required') }}</p>
                <div class="buttons-set">
                    <button type="submit" class="button login" ><span>{{ $t('auth.login') }}</span></button>
                    <a class="forgot-word" href="/password/reset">{{ $t('auth.forgot_pass') }}</a>
                </div>
            </form>
        </div>
        <social-login-btn></social-login-btn>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import SocialLoginBtn from "./SocialLoginBtn";

    export default {
        name: "BuyerLoginPage",
        components: {SocialLoginBtn},
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

</style>
