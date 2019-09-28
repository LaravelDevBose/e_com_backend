<template>
    <form action="" id="co-payment-form">
        <div class="box-border">
            <ul>
                <li>
                    <label for="radio_button_5"><input checked="" name="radio_4" id="radio_button_5" type="radio"> Check / Money order</label>
                </li>

                <li>

                    <label for="radio_button_6"><input name="radio_4" id="radio_button_6" type="radio"> Credit card (saved)</label>
                </li>

            </ul>
            <button class="button">Continue</button>
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
