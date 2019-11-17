<template>
    <form action="" id="co-payment-form">
        <div class="box-border">
            <ul>
                <li v-if="paymentMethods" v-for="(payment,index) in paymentMethods"  :key="index">
                    <label :for="'method-'+index">
                        <input checked="" name="radio_4" v-model="formData.payment_method_id" :value="payment.key" :id="'method-'+index" type="radio">{{ payment.value }}</label>
                </li>
            </ul>
            <button type="button" @click.prevent="paymentMethodStore" class="button">{{ $t('checkout.continue')}}</button>
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
        }
    }
</script>

<style scoped>

</style>
