<template>
    <div class="dropdown-menu">
        <form>
            <div class="minicart-content-wrapper">
                <div class="subtitle">
                    You have 6 item(s) in your cart
                </div>
                <div class="minicart-items-wrapper">
                    <ol class="minicart-items">
                        <cart-dropdown-item></cart-dropdown-item>
                    </ol>
                </div>
                <div class="subtotal">
                    <span class="label">Total</span>
                    <span class="price">$630</span>
                </div>
                <div class="actions">
                    <!-- <a class="btn btn-viewcart" href="">
                        <span>Shopping bag</span>
                    </a> -->
                    <button class="btn btn-checkout" type="button" title="Check Out">
                        <span>Checkout</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import CartDropdownItem from "./CartDropdownItem";
export default {
name: "HeaderCartDropdown",
    components: {CartDropdownItem}
}
</script>

<style scoped>

</style>
