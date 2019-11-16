<template>
    <div class="mini-cart">
        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="#"> <span class="cart_count">{{ cartTotal }}</span><span class="price">Shopping Cart</span> </a> </div>
        <div>
            <div class="top-cart-content">
                <!--block-subtitle-->
                <ul v-if="cartTotal > 0" class="mini-products-list" id="cart-sidebar">
                    <li  v-for="(cart,index) in  cartList" class="item" :class="{'first':index === 0, 'last':(index+1) === cartList.length }">
                        <div class="item-inner"> <a class="product-image" :title="cart.name" :href="cart.options.product_url">
                            <img :alt="cart.name" :src="cart.options.image">
                        </a>
                            <div class="product-details">
                                <div class="access">
                                    <a class="btn-remove1" title="Remove Item" href="#" @click.prevent="productRemoveFromCart(cart.rowId)">Remove</a>
                                </div>
                                <!--access--><strong>{{ cart.qty }}</strong> x <span class="price">{{ cart.price }}</span>
                                <p class="product-name">
                                    <a :href="cart.options.product_url">{{ cart.name }}</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul v-else class="mini-products-list" id="cart-sidebar">
                    <li  class="item first">
                        <div class="item-inner">
                            <div class="product-details">
                                <div class="access">
                                    <p>Cart is Empty</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <!--actions-->
                <div v-if="cartTotal > 0" class="actions">
                    <a href="#" @click.prevent="goToCheckoutPage()" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span> </a>
                    <a href="/cart" class="view-cart"><span>View Cart</span></a>
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
            console.log(this.cartList.length);
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
                'cartTotal'
            ]),
        }
    }
</script>

<style scoped>

</style>
