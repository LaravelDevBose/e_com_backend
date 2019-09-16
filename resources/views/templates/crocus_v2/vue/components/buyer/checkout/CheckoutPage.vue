<template>
    <div class="col-main">
        <div class="page-title">
            <h1>Checkout</h1>
        </div>
        <ol class="one-page-checkout" id="checkoutSteps">
            <li id="opc-billing" class="section allow active">
                <div class="step-title"> <span class="number">1</span>
                    <h3>Checkout Method</h3>
                    <!--<a href="#">Edit</a> -->
                </div>
                <div id="checkout-step-billing" class="step a-item" style="">
                    <billing-form></billing-form>
                </div>
            </li>
            <li id="opc-shipping" class="section">
                <div class="step-title"> <span class="number">2</span>
                    <h3 class="one_page_heading"> Shipping Information</h3>
                    <!--<a href="#">Edit</a>-->
                </div>
                <div id="checkout-step-shipping" class="step a-item" >
                    <shipping-form></shipping-form>
                </div>
            </li>
            <li id="opc-shipping_method" class="section">
                <div class="step-title"> <span class="number">3</span>
                    <h3 class="one_page_heading">Shipping Method</h3>
                    <!--<a href="#">Edit</a>-->
                </div>
                <div id="checkout-step-shipping_method" class="step a-item" >
                    <form id="co-shipping-method-form" action="">
                        <fieldset>
                            <div id="checkout-shipping-method-load">
                                <dl class="shipping-methods">
                                    <dt>Flat Rate</dt>
                                    <dd>
                                        <ul>
                                            <li>
                                                <input type="radio" name="shipping_method" value="flatrate_flatrate" id="s_method_flatrate_flatrate" checked="checked" class="radio">
                                                <label for="s_method_flatrate_flatrate">Fixed <span class="price">$35.00</span> </label>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                            <div id="onepage-checkout-shipping-method-additional-load">
                                <div class="add-gift-message">
                                    <h4>Do you have any gift items in your order?</h4>
                                    <p>
                                        <input type="checkbox" name="allow_gift_messages" id="allow_gift_messages" value="1" onClick="toogleVisibilityOnObjects(this, ['allow-gift-message-container']);" class="checkbox">
                                        <label for="allow_gift_messages">Check this checkbox if you want to add gift messages.</label>
                                    </p>
                                </div>
                                <div style="display: none;" class="gift-message-form" id="allow-gift-message-container">
                                    <div class="inner-box"> </div>
                                </div>
                            </div>
                            <div class="buttons-set1" id="shipping-method-buttons-container">
                                <button type="button" class="button" onClick="shippingMethod.save()"><span>Continue</span></button>
                                <a href="#" onClick="checkout.back(); return false;" class="back-link">« Back</a> </div>
                        </fieldset>
                    </form>
                </div>
            </li>
            <li id="opc-payment" class="section">
                <div class="step-title"> <span class="number">4</span>
                    <h3 class="one_page_heading">Payment Information</h3>
                    <!--<a href="#">Edit</a>-->
                </div>
                <div id="checkout-step-payment" class="step a-item" >
                    <payment-method></payment-method>
                    <p class="require"><em class="required">* </em>Required Fields</p>
                    <div class="buttons-set1" id="payment-buttons-container">
                        <button type="button" class="button" onClick="payment.save()"><span>Continue</span></button>
                        <a href="#" onClick="checkout.back(); return false;" class="back-link">« Back</a> </div>
                    <div style="clear: both;"></div>
                </div>
            </li>
        </ol>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import BillingForm from "./BillingForm";
    import ShippingForm from "./ShippingForm";
    import PaymentMethod from "./PaymentMethod";
    export default {
        name: "CheckoutPage",
        components: {PaymentMethod, ShippingForm, BillingForm,},
        data(){
            return{

            }
        },
        created() {

        },
        mounted() {
            // if(this.cartTotal === 0){
            //     location.href = '/';
            // }
        },
        methods:{
            ...mapActions([

            ])
        },
        computed:{
            ...mapGetters([
                'cartList',
                'cartTotal'
            ])
        },
        watch:{

        }
    }
</script>

<style scoped>

</style>
