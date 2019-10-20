<template>
    <form action="" id="co-payment-form">
        <dl id="checkout-payment-method-load" v-if="paymentMethods">
            <dt v-for="(paymentMethod, index ) in paymentMethods">
                <input type="radio" :id="'p_method_'+index" v-model="formData.payment_method_id" :value="index" name="payment_method"  :title="paymentMethod" class="radio">
                <label :for="'p_method_'+index">{{ paymentMethod }}</label>
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
            ])
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
