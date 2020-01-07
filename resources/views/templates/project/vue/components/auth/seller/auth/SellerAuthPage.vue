<template>
    <main class="site-main">

        <div class="columns container" style="margin-top: 2rem">
            <!-- Block  Breadcrumb-->
            <h2 class="page-heading">
                <span class="page-heading-title2" >{{ $t('auth.seller.page_header')}}</span>
            </h2>

            <div class="page-content">
                <div class="row">
                    <div class="col-sm-6">
                        <register-page></register-page>
                    </div>
                    <div class="col-sm-6">
                        <login-page></login-page>
                    </div>
                </div>
            </div>
        </div>


    </main>
</template>

<script>
    import LoginPage from "./LoginPage";
    import RegisterPage from "./RegisterPage";
    export default {
        name: "SellerAuthPage",
        components: {RegisterPage, LoginPage},
        created(){
            AppStorage.storageClear();
        }
    }
</script>

<style scoped>

</style>
