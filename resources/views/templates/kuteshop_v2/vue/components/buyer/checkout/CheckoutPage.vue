<template>
    <div class="page-content checkout-page">
        <h3 class="checkout-sep">1. Billing Information</h3>
        <billing-form></billing-form>
        <h3 class="checkout-sep">2. Shipping Information</h3>
        <shipping-form></shipping-form>
        <h3 class="checkout-sep">3. Shipping Method</h3>
        <shipping-method></shipping-method>
        <h3 class="checkout-sep">4. Payment Information</h3>
        <payment-method></payment-method>
        <h3 class="checkout-sep">5. Order Review</h3>
        <div class="box-border">
            <cart-list-table></cart-list-table>
        </div>
    </div>
</template>

<script>
    import {mapState,mapGetters, mapActions} from 'vuex';
    import BillingForm from "./BillingForm";
    import ShippingForm from "./ShippingForm";
    import PaymentMethod from "./PaymentMethod";
    import ShippingMethod from  "./ShippingMethod";
    import CartListTable from  "../../cart/CartListTable"
    export default {
        name: "CheckoutPage",
        components: {PaymentMethod, ShippingForm, BillingForm,ShippingMethod, CartListTable},
        data(){
            return{
                formData:{
                    billing_address:{},
                    billing_address_id:'',
                    shipping_address:{},
                    shipping_address_id:'',
                    shipping_method: 1,
                    payment_method:'',
                    payment_method_id:'',
                }
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
                this.formData.billing_address = this.billingAddress;
                this.formData.billing_address_id = this.billingAddressId;
                this.formData.shipping_address = this.shippingAddress;
                this.formData.shipping_address_id = this.shippingAddressId;
                this.formData.payment_method = this.paymentInfo;
                this.formData.payment_method_id = this.paymentMethodId;
                console.log(this.formData);
                //TODO Form Validation
                this.orderProceed(this.formData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 201){
                            this.$noty.success(response.message);
                            setTimeout(function () {
                                location.href = '/';
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
