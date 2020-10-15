<template>
    <!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home    </a></li>
                <li class="active">Your shopping cart</li>-->
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2">Shopping Cart Summary</span>
            </h2>

            <div class="page-content page-order">
                <!--<ul class="step">
                    <li class="current-step"><span>01. Summary</span></li>
                    <li><span>02. Sign in</span></li>
                    <li><span>03. Address</span></li>
                    <li><span>04. Shipping</span></li>
                    <li><span>05. Payment</span></li>
                </ul>
                <div class="heading-counter warning">Your shopping cart contains:
                    <span>1 Product</span>
                </div>-->
                <div class="row">
                    <div class="col-md-3" v-if="sugProducts && sugProducts">
                        <owl-carousel-product-list
                            :products="sugProducts"
                            title="You may also like"
                        ></owl-carousel-product-list>
                    </div>
                    <div class="col-md-9">
                        <div class="order-detail-content">
                            <div class="table-responsive">
                                <cart-table-component>
                                    <tr>
                                        <td colspan="4"><strong>Total</strong></td>
                                        <td colspan="2"><strong>{{ cartTotalPrice }}</strong></td>
                                    </tr>
                                </cart-table-component>
                            </div>
                            <div class="cart_navigation">
                                <router-link to="/home" class="prev-btn">Continue shopping</router-link>
                                <router-link to="/checkout" class="next-btn">Proceed to checkout</router-link>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>
        </div>


    </main><!-- end MAIN -->
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import OwlCarouselProductList from "../components/section/OwlCarouselProductList";
import CartTableComponent from "../components/cart/CartTableComponent";
export default {
    name: "CartPage",
    components: {
        CartTableComponent,
        OwlCarouselProductList
    },
    mounted() {
        $('body').removeClass('catalog-category-view');
        $('body').addClass('page-order catalog-product-view');
        this.getCartSuggestedProducts();
    },
    beforeDestroy() {
        $('body').addClass('catalog-category-view');
        $('body').removeClass('page-order catalog-product-view');
    },
    methods:{
        ...mapActions(['getCartSuggestedProducts', 'destroyCart']),
        emptyCart(){
            this.destroyCart()
                .then(response=>{
                    console.log(response);
                    if(typeof response.status !== "undefined" && response.status === 200){
                        this.$noty.success(response.message);
                        this.$router.push({
                            name: 'Home'
                        });
                    }else{
                        this.$noty.error(response.message);
                    }
                })
        }
    },
    computed:{
        ...mapGetters([
            'sugProducts',
            'cartTotalPrice'
        ])
    }
}
</script>

<style scoped>
.table-responsive{
    margin-top: 0px;
}
</style>
