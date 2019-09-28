<template>
    <main class="site-main">

        <div class="columns container" style="margin-top: 2rem">
            <!-- Block  Breadcrumb-->
            <h2 class="page-heading">
                <span class="page-heading-title2">Authentication</span>
            </h2>

            <div class="page-content">
                <div class="row">
                    <div class="col-sm-6">
                        <buyer-register-page></buyer-register-page>
                    </div>
                    <div class="col-sm-6">
                        <buyer-login-page></buyer-login-page>
                    </div>
                </div>
            </div>
        </div>


    </main>
</template>

<script>

    import BuyerRegisterPage from "./BuyerRegisterPage";
    import BuyerLoginPage from "./BuyerLoginPage";
    export default {
        name: "BuyerAuthPage",
        components: {BuyerLoginPage, BuyerRegisterPage},
        created(){
            AppStorage.storageClear();
        }
    }
</script>

<style scoped>

</style>
