<template>
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>Customer Login or Create an Account</h2>
                </div>
                <fieldset class="col2-set">
                    <buyer-register-page></buyer-register-page>
                    <buyer-login-page></buyer-login-page>
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
