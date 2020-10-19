<template>
    <table class="table table-bordered  cart_summary">
        <thead>
        <tr>
            <th class="cart_product">Product</th>
            <th>Description</th>
            <th>Unit price</th>
            <th>Qty</th>
            <th>Total</th>
            <th class="action">Clear</th>
        </tr>
        </thead>
        <tbody>
        <cart-table-item
            v-for="cartItem in cartList"
            :key="cartItem.rowId"
            :cart="cartItem"
        ></cart-table-item>
        </tbody>
        <tfoot>
        <slot></slot>
        </tfoot>
    </table>
</template>

<script>
import {mapGetters} from "vuex";
import CartTableItem from "./CartTableItem";

export default {
    name: "CartTableComponent",
    components: {CartTableItem},
    computed: {
        ...mapGetters([
            'cartList',
            'cartTotal',
            'cartTotalPrice',
        ]),
        checkCartData() {
            return JSON.parse(JSON.stringify(this.cartList));
        }
    },
    watch: {
        checkCartData: {
            handler(newVal, oldVal) {
                if (newVal !== oldVal) {
                    if (this.cartTotal === 0 && this.cartList.length <= 0) {
                        this.$router.push({
                            name: 'Home'
                        });
                    }
                }

            }
        }
    }
}
</script>

<style scoped>

</style>
