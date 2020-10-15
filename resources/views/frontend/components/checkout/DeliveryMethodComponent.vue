<template>
    <div class="box-border">
        <ul class="shipping_method">
            <li
                v-if="deliveryMethods && deliveryMethods.length > 0"
                v-for="method in deliveryMethods"
                :key="method.id"
            >
                <p :for="'delivery_method'+ method.id" class="subcaption bold" style="margin: 0">{{ method.title }}</p>
                <label :for="'delivery_method'+ method.id" style="margin-top: 0;">
                    <input v-model="delivery_method_id" :value="method.id" name="radio_3" :id="'delivery_method'+ method.id" type="radio">
                     <strong>{{ method.cost }}</strong>- {{ method.minTime +'-'+ method.maxTime}}(days)
                </label>
            </li>
        </ul>
        <button class="button" @click.prevent="storeDeliveryMethod()">Continue</button>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
export default {
    name: "DeliveryMethodComponent",
    data(){
        return{
            delivery_method_id: ''
        }
    },
    created() {
        this.getDeliveryMethods();
    },
    methods:{
        ...mapActions([
            'selectedDeliveryMethod',
            'getDeliveryMethods'
        ]),
        storeDeliveryMethod(){
            this.selectedDeliveryMethod(this.delivery_method_id);
        }
    },
    computed:{
        ...mapGetters(['deliveryMethods', 'checkoutData']),
        checkCheckoutData(){
            return JSON.parse(JSON.stringify(this.checkoutData));
        }
    },
    watch:{
        checkCheckoutData:{
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    if (this.checkoutData.delivery_method_id > 0){
                        this.delivery_method_id = this.checkoutData.delivery_method_id;
                    }
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
