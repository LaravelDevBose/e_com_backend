<template>
    <div class="block block-progress">
        <div class="block-title ">Your Checkout</div>
        <div class="block-content">
            <dl>
                <dt class="complete"> Shipping Address <span class="separator">|</span> <a  href="#payment" @click.prevent="changeShippingAddress">Change</a> </dt>
                <dd class="complete" v-if="Object.entries(shippingAddress).length !== 0 && shippingAddress">
                    <address>
                        {{ shippingAddress.first_name}} {{ shippingAddress.last_name }}<br>
                        {{ shippingAddress.address }}<br>
                        {{ shippingAddress.city }}<br>
                        {{ shippingAddress.region }},  {{ shippingAddress.postal_code }}<br>
                        {{ shippingAddress.country }}<br>
                        T: {{ shippingAddress.phone_no }}<br>
                    </address>
                </dd>
                <dt class="complete"> Shipping Method <span class="separator">|</span> <a  href="#shipping_method" @click.prevent="changeShippingMethod">Change</a> </dt>
                <dd class="complete" v-if="Object.entries(selectedMethod).length !== 0">
                    {{ selectedMethod.delivery_title }} <b class="price"> - ${{ selectedMethod.cost_price }}</b> <br>
                    ({{ selectedMethod.min_time }}-{{ selectedMethod.max_time }}) working days
                </dd>
                <dt> Payment Method </dt>
                <dd class="complete" v-if="Object.entries(paymentInfo).length !== 0 ">
                    <address>
                        {{ paymentInfo.value }}
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
                'selectedMethod'
            ])
        }
    }
</script>

<style scoped>

</style>
