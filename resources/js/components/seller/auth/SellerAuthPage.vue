<template>
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>Seller Login or Create an Account</h2>
                </div>
                <fieldset class="col2-set">
                    <register-page></register-page>
                    <login-page></login-page>
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
    import LoginPage from "./LoginPage";
    import RegisterPage from "./RegisterPage";
    export default {
        name: "SellerAuthPage",
        components: {RegisterPage, LoginPage}
    }
</script>

<style scoped>

</style>
