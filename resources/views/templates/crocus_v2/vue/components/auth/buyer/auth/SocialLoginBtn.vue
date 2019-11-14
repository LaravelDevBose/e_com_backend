<template>
    <div class="box-authentication">
        <strong>Sign in With</strong>
        <div class="text-center social-btn">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" @click.prevent="socialLogin('facebook')" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> <b>Facebook</b></a>
                </div>
                <div class="col-md-3">
                    <a href="#" @click.prevent="socialLogin('twitter')" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> <b>Twitter</b></a>
                </div>
                <div class="col-md-3">
                    <a href="#" @click.prevent="socialLogin('google')" class="btn btn-danger btn-block"><i class="fa fa-google"></i> <b>Google</b></a>
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
