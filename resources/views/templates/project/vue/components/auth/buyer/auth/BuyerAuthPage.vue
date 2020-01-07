<template>
    <main class="site-main">

        <div class="columns container" style="margin-top: 2rem">
            <!-- Block  Breadcrumb-->
            <h2 class="page-heading">
                <span class="page-heading-title2">{{ $t('auth.buyer.page_header')}}</span>
            </h2>

            <div class="page-content">
                <div class="row">
                    <div class="col-sm-6">
                        <buyer-register-page></buyer-register-page>
                    </div>
                    <div class="col-sm-6">
                        <buyer-login-page></buyer-login-page>
                        <social-login-btn></social-login-btn>
                    </div>
                </div>
            </div>
        </div>


    </main>
</template>

<script>

    import BuyerRegisterPage from "./BuyerRegisterPage";
    import BuyerLoginPage from "./BuyerLoginPage";
    import SocialLoginBtn from "./SocialLoginBtn";
    export default {
        name: "BuyerAuthPage",
        components: {SocialLoginBtn, BuyerLoginPage, BuyerRegisterPage},
        created(){
            AppStorage.storageClear();
        }
    }
</script>

<style scoped>

</style>
