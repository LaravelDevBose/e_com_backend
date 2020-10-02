<template>
    <span>
        <!-- block mini cart -->
        <div class="block-minicart dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="cart-icon"></span>
                <span class="counter qty">
                        <span class="cart-text">cart</span>
                        <span class="counter-number">6</span>
                        <span class="counter-label">6 <span>Item(s)</span></span>
                        <span class="counter-price">$75.00</span>
                    </span>
            </a>
            <header-cart-dropdown></header-cart-dropdown>
        </div>
        <!-- block mini cart -->


        <!-- link  Login-->
            <a class="link-login" href=""><span>Login</span></a>
        <!-- link  Login-->

        <!-- link  wishlish-->
            <a href="" class="link-wishlist"><span>wishlish</span></a>
        <!-- link  wishlish-->
    </span>
</template>

<script>
import HeaderCartDropdown from "./cart/HeaderCartDropdown";
export default {
    name: "HeaderRightSection",
    components: {HeaderCartDropdown}
}
</script>

<style scoped>

</style>
