<template>
    <div class="dropdown-menu" >

        <div class="minicart-content-wrapper" >
            <div class="subtitle">
                You have {{ cartTotal }} item(s) in your cart
            </div>
            <div class="minicart-items-wrapper">
                <ol class="minicart-items">
                    <cart-dropdown-item
                        v-for="cart in cartList"
                        :key="cart.rowId"
                        :cart="cart"
                    ></cart-dropdown-item>
                </ol>
            </div>
            <div class="subtotal">
                <span class="label">Total</span>
                <span class="price">{{ cartTotalPrice }}</span>
            </div>
            <div class="actions" v-if="cartList">
                <router-link :to="{name: 'shopping_bag'}" class="btn btn-viewcart" style="margin-right: 2px;">
                    <span>Shopping bag</span>
                </router-link>
                <router-link :to="{name: 'checkout'}" class="btn btn-checkout" title="Check Out">
                    <span>Checkout</span>
                </router-link>
            </div>
        </div>

    </div>
</template>

<script>
import CartDropdownItem from "./CartDropdownItem";
import {mapGetters, mapActions} from 'vuex';
export default {
name: "HeaderCartDropdown",
    components: {CartDropdownItem},
    computed:{
        ...mapGetters(['cartTotal', 'cartTotalPrice', 'cartList']),
    }
}
</script>

<style scoped>

</style>
