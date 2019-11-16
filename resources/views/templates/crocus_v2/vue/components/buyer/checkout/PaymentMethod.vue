<template>
    <form action="" id="co-payment-form">
        <dl id="checkout-payment-method-load" v-if="paymentMethods">
            <dt v-for="(payment, index ) in paymentMethods">
                <input type="radio" :id="'p_method_'+index" v-model="formData.payment_method_id" :value="payment.key" name="payment_method"  :title="payment.value" class="radio">
                <label :for="'p_method_'+index">{{ payment.value }}</label>
            </dt>
        </dl>
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

                };
                this.tabChange(data);

            }
        },
        computed:{
            ...mapGetters([
                'paymentMethods',
            ]),
            formDataCheck(){
                return JSON.parse(JSON.stringify(this.formData));
            },
        },
        watch:{
            formDataCheck:{
                handler(newVal, oldVal){
                    if(newVal !== oldVal){
                        this.storePaymentMethod(this.formData);
                    }

                }
            },
        }

    }
</script>

<style scoped>

</style>
