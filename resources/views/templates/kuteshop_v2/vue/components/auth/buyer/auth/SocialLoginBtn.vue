<template>
    <div class="box-authentication">
        <h3 class="text-center" style="margin-top: 5px;">{{ $t('auth.sign_in_with')}} </h3>
        <div class="text-center social-btn">
            <a href="#" @click.prevent="authProvider('facebook')" class="btn btn-primary btn-block"><i class="fab fa-facebook-f"></i> {{ $t('auth.sign_in_with')}} <b>Facebook</b></a>
<!--            <a href="#" @click.prevent="socialLogin('twitter')" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> {{ $t('auth.sign_in_with')}} <b>Twitter</b></a>-->
            <a href="#" @click.prevent="authProvider('google')" class="btn btn-danger btn-block"><i class="fab fa-google-plus-g"></i> {{ $t('auth.sign_in_with')}} <b>Google</b></a>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import VueAxios from 'vue-axios'
    import VueSocialauth from 'vue-social-auth'
    import axios from 'axios';
    import {mapGetters} from 'vuex';
    Vue.use(VueAxios, axios);
    Vue.use(VueSocialauth, {

        providers: {
            google: {
                clientId: '13140998938-okavjflpvpas3aait4f4iaa5macp8dup.apps.googleusercontent.com',
                redirectUri: 'http://saliim.com/social/login/google/callback',
            },
            facebook: {
                clientId: '650187252177794',
                redirectUri: 'http://saliim.com/social/login/facebook/callback',
            }
        }
    });

    export default {
        name: "SocialLoginBtn",
        methods:{
            authProvider(provider) {

                var self = this;

                this.$auth.authenticate(provider).then(response =>{
                    console.log(response);
                    self.socialLogin(provider,response)

                }).catch(err => {
                    console.log({err:err})
                })

            },

            socialLogin(provider,response){

                 axios.post(`/vue/social/login/${provider}`,response)
                    .then(response => {
                        if(typeof  response.code === "undefined"){
                            this.$noty.error('Some Thing Wrong!');
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else if (response.code === 200){
                            AppStorage.storageClear();
                            AppStorage.storeUserInfo(response.data.data);

                            this.$noty.success(response.message);
                            setTimeout(function () {
                                if(this.cartTotal > 0){
                                    location.href = '/buyer/checkout';
                                }else{
                                    location.href = response.url;
                                }
                            },800);
                        }else{
                            this.$noty.error(response.message);
                        }
                    }).catch(err => {
                        console.log({err:err})
                        this.$noty.error('Some Thing Wrong!');
                    })
            },
        },
        computed:{
            ...mapGetters(['cartTotal']),
        }
    }
</script>

<style scoped>
    .box-authentication {
        border: 1px solid #eaeaea!important;
        padding: 15px!important;
        min-height: 220px!important;
        margin-bottom: 40px!important;
    }
    .social-btn .btn {
        margin: 10px 0;
        font-size: 15px;
        text-align: left;
        padding: 0 15px;
        font-weight: 700;
    }
    .social-btn .btn i {
        float: left;
        margin: 11px 10px 0 0px;
        min-width: 15px;
    }
</style>
