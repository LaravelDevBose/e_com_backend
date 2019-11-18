<template>
    <div class="block block-progress">
        <div class="block-title ">Your Checkout</div>
        <div class="block-content">
            <dl>
                <dt class="complete"> Billing Address <span class="separator">|</span> <a  href="#billing" @click.prevent="changeBillingAddress">Change</a> </dt>
                <dd class="complete" v-if="Object.entries(billingAddress).length !== 0 && billingAddress !== null ">
                    <address>
                        {{ billingAddress.first_name}} {{ billingAddress.last_name }}<br>
                        {{ billingAddress.address }}<br>
                        {{ billingAddress.city }}<br>
                        {{ billingAddress.state }},  {{ billingAddress.postal_code }}<br>
                        {{ billingAddress.country }}<br>
                        T: {{ billingAddress.phone_no }}<br>
                    </address>
                </dd>
                <dt class="complete"> Shipping Address <span class="separator">|</span> <a  href="#payment" @click.prevent="changeShippingAddress">Change</a> </dt>
                <dd class="complete" v-if="Object.entries(shippingAddress).length !== 0 && shippingAddress !== null ">
                    <address>
                        {{ shippingAddress.first_name}} {{ shippingAddress.last_name }}<br>
                        {{ shippingAddress.address }}<br>
                        {{ shippingAddress.city }}<br>
                        {{ shippingAddress.state }},  {{ shippingAddress.postal_code }}<br>
                        {{ shippingAddress.country }}<br>
                        T: {{ shippingAddress.phone_no }}<br>
                    </address>
                </dd>
                <dt class="complete"> Shipping Method <span class="separator">|</span> <a  href="#shipping_method" @click.prevent="changeShippingMethod">Change</a> </dt>
                <dd class="complete"> Flat Rate - Fixed <br>
                    <span class="price">$15.00</span> </dd>
                <dt> Payment Method </dt>
                <dd class="complete" v-if="Object.entries(paymentInfo).length !== 0 ">
                    <address>
                        {{ paymentInfo }}
                    </address>
                </dd>
            </dl>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name: "CheckoutSidebar",
        data(){
            return{

            }
        },
        methods:{
            ...mapActions([
                'tabChange',
            ]),
            changeBillingAddress(){
                let data={
                    billing:{
                        'tabAction':true,
                    },
                    shopping:{
                        'tabAction':false,
                    },
                    method:{
                        'tabAction':false,
                    },
                    payment:{
                        'tabAction':false,
                    },

                };
                this.tabChange(data);
            },
            changeShippingAddress(){
                let data={
                    billing:{
                        'tabAction':false,
                    },
                    shopping:{
                        'tabAction':true,
                    },
                    method:{
                        'tabAction':false,
                    },
                    payment:{
                        'tabAction':false,
                    },

                };
                this.tabChange(data);
            },
            changeShippingMethod(){
                let data={
                    billing:{
                        'tabAction':false,
                    },
                    shopping:{
                        'tabAction':false,
                    },
                    method:{
                        'tabAction':true,
                    },
                    payment:{
                        'tabAction':false,
                    },

                };
                this.tabChange(data);
            }
        },
        computed:{
            ...mapGetters([
                'billingAddress',
                'shippingAddress',
                'paymentInfo',
            ])
        }
    }
</script>

<style scoped>

</style>
