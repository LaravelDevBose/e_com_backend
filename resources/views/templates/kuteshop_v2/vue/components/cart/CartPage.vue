<template>
    <div class="page-content page-order" >
        <div class="order-detail-content">
            <cart-list-table></cart-list-table>
            <div class="cart_navigation" style="margin-bottom: 1em;">
                <a href="#" @click.prevent="goToShopping" class="prev-btn">Continue shopping</a>
                <a href="#" @click.prevent="proceedToCheckout" class="next-btn">Proceed to checkout</a>
            </div>
        </div>
    </div>
</template>

<script>
    import CartListTable from "./CartListTable";
    import {mapGetters} from 'vuex';
    export default {
        name: "CartPage",
        components: {CartListTable},
        computed:{
            ...mapGetters([

            ]),
            proceedToCheckout(){
                location.href = '/buyer/checkout';
            },
            goToShopping(){
                location.href = '/';
            },
        }
    }
</script>

<style scoped>

</style>
