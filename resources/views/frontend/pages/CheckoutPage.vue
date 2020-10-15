<template>
    <!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home    </a></li>
                <li class="active"> Checkout</li>-->
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2"> Checkout</span>
            </h2>

            <div class="page-content checkout-page page-order">
                <ul class="step" style="margin-bottom: 1em;">
                    <li :class="{'current-step': activeSection === 1}" @click.prevent="sectionShow(1)" ><span>01. Shipping info</span></li>
                    <li :class="{'current-step': activeSection === 2}" @click.prevent="sectionShow(2)"><span>02. Delivery Method</span></li>
                    <li :class="{'current-step': activeSection === 3}" @click.prevent="sectionShow(3)"><span>03. Place Order</span></li>
                    <li :class="{'current-step': activeSection === 4}" ><span>04. Payment info</span></li>
                </ul>
                <shipping-info-component v-if="activeSection === 1" ></shipping-info-component>
                <delivery-method-component v-if="activeSection === 2" ></delivery-method-component>

                <div class="box-border" v-if="activeSection === 3">
                    <div class="table-responsive">
                        <cart-table-component>
                            <tr>
                                <td colspan="4"><strong>Subtotal</strong></td>
                                <td colspan="2"><strong>{{ cartTotalPrice }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Discount</strong></td>
                                <td colspan="2"><strong>{{ couponAmount}}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Total</strong></td>
                                <td colspan="2"><strong>{{ totalPrice }}</strong></td>
                            </tr>
                        </cart-table-component>
                    </div>
                    <div v-if="errorText">
                        <p class="alert alert-warning" v-html="errorText"></p>
                    </div>
                    <ul>
                        <li class="row">
                            <div class="col-sm-4">
                                <label for="first_name_1" style="display: inline-block">Coupon Code</label>
                                <input class="input form-control" v-model="reqData.coupon_code" id="first_name_1" type="text" style="display: inline-block; width: 175px;" >
                                <button class="button" style="display: inline-block; width: 76px; margin-top: 0;" @click.prevent="applyCoupon()">Apply</button>
                            </div>
                            <div class="col-sm-3 col-sm-offset-5">
                                <label >&nbsp;</label>
                                <button class="button pull-right btn-block" @click.prevent="placeOrder()">Place Order</button>
                            </div>
                        </li>
                    </ul>
                </div>
                <payment-info-component v-if="activeSection === 4"></payment-info-component>
            </div>

        </div>


    </main><!-- end MAIN -->
</template>

<script>
import ShippingInfoComponent from "../components/checkout/ShippingInfoComponent";
import DeliveryMethodComponent from "../components/checkout/DeliveryMethodComponent";
import CartTableComponent from "../components/cart/CartTableComponent";
import {mapActions, mapGetters} from 'vuex';
import PaymentInfoComponent from "../components/checkout/PaymentInfoComponent";
export default {
    name: "CheckoutPage",
    components: {
        PaymentInfoComponent,
        CartTableComponent,
        DeliveryMethodComponent,
        ShippingInfoComponent
    },
    data(){
        return{
            reqData:{
                coupon_code: ''
            },
            errorText: ''
        }
    },
    methods:{
        ...mapActions([
            'checkoutSection',
            'couponCodeApply',
            'orderSubmit'
        ]),
        sectionShow(section){
            this.checkoutSection(section);
        },
        applyCoupon(){
            this.couponCodeApply(this.reqData)
            .then(response=>{
                if(response.status === 200){
                    this.errorText = '';
                }else if(response.status === 400){
                    this.errorText = response.message;
                }else{
                    this.errorText = "Invalid Information";
                }
            });
        },

        placeOrder(){
            this.orderSubmit(this.checkoutData);
        }

    },
    computed:{
        ...mapGetters([
            'activeSection',
            'cartTotalPrice',
            'couponAmount',
            'checkoutData'
        ]),
        totalPrice(){
            return this.cartTotalPrice - this.couponAmount;
        }
    }
}
</script>

<style scoped>

</style>
