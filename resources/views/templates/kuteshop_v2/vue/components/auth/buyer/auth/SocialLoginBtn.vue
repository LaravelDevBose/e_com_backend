<template>
    <div class="box-authentication">
        <h3 class="text-center" style="margin-top: 5px;">Sign in With </h3>
        <div class="text-center social-btn">
            <a href="#" @click.prevent="socialLogin('facebook')" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
            <a href="#" @click.prevent="socialLogin('twitter')" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Sign in with <b>Twitter</b></a>
            <a href="#" @click.prevent="socialLogin('google')" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
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
