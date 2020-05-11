<template>
    <div class="col-main">
        <div class="page-title">
            <h1>Checkout</h1>
        </div>
        <ol class="one-page-checkout" id="checkoutSteps">
            <!--<li id="opc-billing" class="section" :class="billingTab ? 'allow active':' '">
                <div class="step-title"> <span class="number">1</span>
                    <h3>Checkout Method</h3>
                    &lt;!&ndash;<a href="#">Edit</a> &ndash;&gt;
                </div>
                <div id="checkout-step-billing" class="step a-item"  :class="billingTab ? 'show':'hidden'">
                    <billing-form></billing-form>
                </div>
            </li>-->
            <li id="opc-shipping" class="section" :class="shoppingTab ? 'allow active':''">
                <div class="step-title"> <span class="number">1</span>
                    <h3 class="one_page_heading"> Shipping Information</h3>
                    <!--<a href="#">Edit</a>-->
                </div>
                <div id="checkout-step-shipping" class="step a-item" :class="shoppingTab ? 'show':'hidden'" >
                    <shipping-form></shipping-form>
                </div>
            </li>
            <li id="opc-shipping_method" class="section" :class="methodTab ? 'allow active':''">
                <div class="step-title"> <span class="number">2</span>
                    <h3 class="one_page_heading">Shipping Method</h3>
                    <!--<a href="#">Edit</a>-->
                </div>
                <div id="checkout-step-shipping_method" class="step a-item" :class="methodTab ? 'show':'hidden'">
                    <form id="co-shipping-method-form" action="">
                        <shipping-method></shipping-method>
                    </form>
                </div>
            </li>
            <li id="opc-payment" class="section" :class="paymentTab ? 'allow active':''">
                <div class="step-title"> <span class="number">3</span>
                    <h3 class="one_page_heading">Payment Information</h3>
                    <!--<a href="#">Edit</a>-->
                </div>
                <div id="checkout-step-payment" class="step a-item" :class="paymentTab ? 'show':'hidden'">
                    <payment-method></payment-method>
                    <div style="clear: both;"></div>
                </div>

            </li>
        </ol>
        <ul class="checkout">
            <li>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 ">
                        <button class="button btn-proceed-checkout" @click.prevent="proceedToOrder()" :disabled="btnDisabled" title="Proceed to Checkout" type="button"><span>Proceed to Order</span></button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapState,mapGetters, mapActions} from 'vuex';
    import BillingForm from "./BillingForm";
    import ShippingForm from "./ShippingForm";
    import PaymentMethod from "./PaymentMethod";
    import ShippingMethod from "./ShippingMethod";
    export default {
        name: "CheckoutPage",
        components: {ShippingMethod, PaymentMethod, ShippingForm, BillingForm,},
        data(){
            return{
                formData:{
                    billing_address:{},
                    billing_address_id:'',
                    shipping_address:{},
                    shipping_address_id:'',
                    shipping_method: '',
                    shipping_method_id: '',
                    payment_method:'',
                    payment_method_id:'',
                    delivery_charge:'',
                },
                btnDisabled: false,
            }
        },
        created() {

        },
        mounted() {
            this.getAddressBookList();
        },
        updated(){
            if(this.cartTotal === 0){
                location.href = '/';
            }
        },
        methods:{
            ...mapActions([
                'getAddressBookList',
                'tabChange',
                'orderProceed'
            ]),
            continueTab(){
                let data={

                    method:{
                        'tabAction':false,
                    },
                    payment:{
                        'tabAction':true,
                    },

                };
                this.tabChange(data);

            },
            backTab(){
                let data={
                    method:{
                        'tabAction':false,
                    },
                    shopping:{
                        'tabAction':true,
                    },

                };
                this.tabChange(data);
            },
            proceedToOrder(){
                this.btnDisabled =true;
                this.formData.billing_address = this.billingAddress;
                this.formData.billing_address_id = this.billingAddressId;
                this.formData.shipping_address = this.shippingAddress;
                this.formData.shipping_address_id = this.shippingAddressId;
                this.formData.payment_method = this.paymentInfo;
                this.formData.payment_method_id = this.paymentMethodId;
                this.formData.shipping_method_id = this.shippingMethodId;
                this.formData.delivery_charge = this.deliveryCost;
                console.log(this.formData);
                //TODO Form Validation
                this.orderProceed(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 201){
                            this.$noty.success(response.message);
                            setTimeout(function () {
                                location.href = response.url;
                            },2000);
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else {
                            this.$noty.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'cartList',
                'cartTotal',
                'billingAddress',
                'billingAddressId',
                'shippingAddress',
                'shippingAddressId',
                'paymentInfo',
                'paymentMethodId',
                'shippingMethodId',
                'deliveryCost',
                'billingTab',
                'shoppingTab',
                'methodTab',
                'paymentTab',
            ]),
        }
    }
</script>

<style scoped>
    .show{
        display: block;
    }
    .hidden{
        display: none;
    }
</style>
