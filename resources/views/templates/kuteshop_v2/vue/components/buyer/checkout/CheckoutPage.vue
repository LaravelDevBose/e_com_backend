<template>
    <div class="page-content checkout-page">
        <h3 class="checkout-sep">1. {{ $t('checkout.billing_section')}}</h3>
        <div :class="billingTab ? 'show':'hidden'">
            <billing-form ></billing-form>
        </div>
        <h3 class="checkout-sep">2. {{ $t('checkout.shipping_section')}}</h3>
        <div :class="shoppingTab ? 'show':'hidden'">
            <shipping-form></shipping-form>
        </div>
        <h3 class="checkout-sep">3. {{ $t('checkout.shipping_method')}}</h3>
        <div :class="methodTab ? 'show':'hidden'">
            <shipping-method></shipping-method>
        </div>
        <h3 class="checkout-sep">4. {{ $t('checkout.payment_section')}}</h3>
        <div :class="paymentTab ? 'show':'hidden'">
            <payment-method></payment-method>
        </div>

        <h3 class="checkout-sep">5. {{ $t('checkout.order_review')}}</h3>
        <div class="box-border">
            <cart-list-table> </cart-list-table>
            <div class="row" :class="cartTab ? 'show':'hidden'">
                <div class="col-md-5">
                    <div class="text-left">
                        <button type="button" @click.prevent="backTab()" class="button">Back</button>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="text-right">
                        <button type="button" @click.prevent="proceedToOrder" class="button btn-block">{{ $t('checkout.place_order')}}</button>
                    </div>
                </div>
            </div>
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
                    shipping_method: '',
                    shipping_method_id: '',
                    payment_method:'',
                    payment_method_id:'',
                    delivery_charge:'',
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
                'orderProceed',
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
                    billing:{
                        'tabAction':false,
                    },
                    shopping:{
                        'tabAction':false,
                    },
                    method:{
                        'tabAction':false,
                    },
                    payment:{
                        'tabAction':true,
                    },
                    cart_tab:{
                        'tabAction':false,
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
                this.formData.shipping_method_id = this.shippingMethodId;
                this.formData.delivery_charge = this.deliveryCost;
                /*console.log(this.formData);
                return false;*/
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
                'cartTab'
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
