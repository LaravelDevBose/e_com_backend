<template>
    <div class="block-minicart dropdown">
        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="cart-icon" style="margin-right: -8px;"></span>
            <span class="counter-number">{{ cartTotal }}</span>
        </a>
        <div class="dropdown-menu">
            <div v-if="cartTotal > 0" class="minicart-content-wrapper" >
                <div class="subtitle">
                    You have {{ cartTotal }} item(s) in your cart
                </div>
                <div class="minicart-items-wrapper">
                    <ol class="minicart-items">
                        <li v-for="(cart,index) in  cartList" :key="index" class="product-item">
                            <a class="product-item-photo" :title="cart.name" :href="cart.options.product_url">
                                <img class="product-image-photo" :alt="cart.name" :src="cart.options.image">
                            </a>
                            <div class="product-item-details">
                                <strong class="product-item-name">
                                    <a :title="cart.name" :href="cart.options.product_url" >{{ cart.name }}</a>
                                </strong>
                                <div class="product-item-price">
                                    <span class="price">$ {{ cart.price }}</span>
                                </div>
                                <div class="product-item-qty">
                                    <span class="label">Qty: </span ><span class="number">{{ cart.qty }}</span>
                                </div>
                                <div class="product-item-actions">
                                    <a class="action delete" href="#" @click.prevent="productRemoveFromCart(cart.rowId)" title="Remove item">
                                        <span>Remove</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="subtotal">
                    <span class="label">Total</span>
                    <span class="price">${{ cartTotalPrice }}</span>
                </div>
                <div class="actions">
                     <a class="btn btn-viewcart" href="/cart" style="margin-right:.2rem;">
                            <span>Shopping bag</span>
                     </a>
                    <button @click.prevent="goToCheckoutPage()" class="btn btn-checkout" type="button" title="Check Out">
                        <span>Checkout</span>
                    </button>
                </div>
            </div>
            <div v-else class="minicart-content-wrapper" >
                <div class="subtitle">
                    You have 0 item(s) in your cart
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';
    export default {
        name: "HeaderMiniCart",
        data(){
            return{

            }
        },
        created() {

        },
        mounted() {
            this.getCartDetails();
        },
        methods:{
            ...mapActions([
                'getCartDetails',
                'removeFromCart'
            ]),
            productRemoveFromCart(rowId){
                this.removeFromCart(rowId)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            },
            goToCheckoutPage(){
                if(AppStorage.getWhoIs() === 'buyer'){
                    location.href = '/buyer/checkout';
                }else{
                    location.href = '/login';
                }
            }
        },
        computed:{
            ...mapGetters([
                'cartList',
                'cartTotal',
                'cartTotalPrice'
            ]),
        }
    }
</script>

<style scoped>

</style>
