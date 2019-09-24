<template>
    <div class="block-minicart dropdown">
        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="cart-icon"></span>
            <span class="cart-text">cart</span>
            <span class="counter qty">
                <span class="counter-number">6</span>
                <span class="counter-label">6 <span>Item(s)</span></span>
                <span class="counter-price">$75.00</span>
            </span>
        </a>
        <div class="dropdown-menu">
            <form>
                <div  class="minicart-content-wrapper" >
                    <div class="subtitle">
                        You have 6 item(s) in your cart
                    </div>
                    <div class="minicart-items-wrapper">
                        <ol class="minicart-items">
                            <li class="product-item">
                                <a class="product-item-photo" href="#" title="The Name Product">
                                    <img class="product-image-photo" src="/kuteshop_v2/images/media/index1/minicart.jpg" alt="The Name Product">
                                </a>
                                <div class="product-item-details">
                                    <strong class="product-item-name">
                                        <a href="#">Donec Ac Tempus</a>
                                    </strong>
                                    <div class="product-item-price">
                                        <span class="price">61,19 €</span>
                                    </div>
                                    <div class="product-item-qty">
                                        <span class="label">Qty: </span ><span class="number">1</span>
                                    </div>
                                    <div class="product-item-actions">
                                        <a class="action delete" href="#" title="Remove item">
                                            <span>Remove</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="product-item">
                                <a class="product-item-photo" href="#" title="The Name Product">
                                    <img class="product-image-photo" src="/kuteshop_v2/images/media/index1/minicart2.jpg" alt="The Name Product">
                                </a>
                                <div class="product-item-details">
                                    <strong class="product-item-name">
                                        <a href="#">Donec Ac Tempus</a>
                                    </strong>
                                    <div class="product-item-price">
                                        <span class="price">61,19 €</span>
                                    </div>
                                    <div class="product-item-qty">
                                        <span class="label">Qty: </span ><span class="number">1</span>
                                    </div>
                                    <div class="product-item-actions">
                                        <a class="action delete" href="#" title="Remove item">
                                            <span>Remove</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
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
