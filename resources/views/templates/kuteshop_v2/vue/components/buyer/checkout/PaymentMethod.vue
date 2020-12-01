<template>
    <form action="" id="co-payment-form">
        <div class="box-border">
            <ul>
                <li v-if="paymentMethods" v-for="(payment,index) in paymentMethods"  :key="index">
                    <label :for="'method-'+index">
                        <input checked="" name="radio_4" v-model="formData.payment_method_id" :value="payment.key" :id="'method-'+index" type="radio">{{ payment.value }}</label>
                </li>
                <li class="row">
                    <div class="col-sm-6">
                        <button type="button" @click.prevent="backTab()" class="button">Back</button>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <button type="button" @click.prevent="paymentMethodStore" class="button">{{ $t('checkout.continue')}}</button>
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-6 col-md-offset-3" v-if="formData.payment_method_id == 2">
                        <div class="text-center">
                            <button type="button" style="background:#f36" class="button btn-block">Pay here by Salaam (34004813)</button>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-3" v-if="formData.payment_method_id == 3">
                        <div class="text-center">
                            <button type="button" style="background:#f78031" class="button btn-block">Pay here by IBS Bank (46481)</button>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </form>
</template>

<script>
    // TODO payment getwaye intregrate
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "PaymentMethod",
        data(){
            return{
                formData:{
                    payment_method_id:'',
                }
            }
        },
        methods:{
            ...mapActions([
                'storePaymentMethod',
                'tabChange'
            ]),
            paymentMethodStore(){
                this.storePaymentMethod(this.formData)
                    .then(response=>{
                        this.$noty.success('Payment Information Added.');
                        this.continueTab();
                    })
            },
            continueTab(){
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
                        'tabAction':false,
                    },
                    cart_tab:{
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
                        'tabAction':true,
                    },
                    payment:{
                        'tabAction':false,
                    },
                    cart_tab:{
                        'tabAction':false,
                    },
                };
                this.tabChange(data);

            },

        },
        computed:{
            ...mapGetters([
                'paymentMethods',
            ]),
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
        }
    }
</script>

<style scoped>

</style>
