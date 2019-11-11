<template>
    <div class="box-authentication">
        <strong>Sign in With</strong>
        <div class="text-center social-btn">
            <div class="row">
                <div class="col-md-4">
                    <a href="#" @click.prevent="socialLogin('facebook')" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
                </div>
                <div class="col-md-4">
                    <a href="#" @click.prevent="socialLogin('twitter')" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Sign in with <b>Twitter</b></a>
                </div>
                <div class="col-md-4">
                    <a href="#" @click.prevent="socialLogin('google')" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SocialLoginBtn",
        methods:{
            socialLogin($provider){
                location.href = `/social/login/${$provider}`;
            }
        }
    }
</script>

<style scoped>
    .box-authentication {
        padding-top: 15px!important;
        margin-top: 15px!important;
        border-top: 1px solid #eee;
    }
    .social-btn a{
        font-size: 13px;
        margin-top: 10px;
    }
</style>
