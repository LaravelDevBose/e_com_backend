<template>
    <form action="" id="co-payment-form">
        <dl id="checkout-payment-method-load" v-if="paymentMethods">
            <dt v-for="(payment, index ) in paymentMethods">
                <input
                    type="radio"
                    :id="'p_method_'+index"
                    v-model="formData.payment_method_id"
                    :value="payment.key"
                    name="payment_method"
                    :title="payment.value"
                    class="radio"
                    @click="paymentMethodStore(payment.key)"
                >
                <label :for="'p_method_'+index">{{ payment.value }}</label>
            </dt>
            <dt class="row">
                <div class="col-md-6 col-md-offset-3" v-if="formData.payment_method_id === 2">
                    <div class="text-center">
                        <button type="button" style="background:#f36; color: #ffffff;" class="button btn-block">Pay here by Salaam (123456789)</button>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3" v-if="formData.payment_method_id === 3">
                    <div class="text-center">
                        <button type="button" style="background:#f78031; color: #ffffff;" class="button btn-block">Pay here by eDahab (123456789)</button>
                    </div>
                </div>
            </dt>
        </dl>
        <p class="require"><em class="required">* </em>Required Fields</p>
        <div class="buttons-set1" id="payment-buttons-container">
            <a href="#"  class="back-link">« Back</a>
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
            paymentMethodStore(value){
                this.storePaymentMethod(value)
                    .then(response=>{
                        this.$noty.success('Payment Information Selected.');
                    })
            }
        },
        computed:{
            ...mapGetters([
                'paymentMethods',
            ]),

        }
    }
</script>

<style scoped>

</style>
