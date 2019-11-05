<template>
    <fieldset>
        <div id="checkout-shipping-method-load">
            <dl class="shipping-methods" v-if="shippingMethods">
                <dd>
                    <ul>
                        <li v-for="(shipping, index) in shippingMethods" :key="index">
                            <input type="radio" name="shipping_method" v-model="formData.shipping_method_id" :value="index" id="s_method_flatrate_flatrate" @click="setDeliveryCharge(deliveryCharge)" class="radio">
                            <label for="s_method_flatrate_flatrate">{{ shipping }} <span class="price">$ {{ deliveryCharge }}</span> </label>
                        </li>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="buttons-set1" id="shipping-method-buttons-container">
            <button type="button" class="button" @click.prevent="shippingMethodStore"><span>Continue</span></button>
        </div>
    </fieldset>
</template>

<script>
    import {mapActions,mapGetters} from 'vuex';

    export default {
        name: "ShippingMethod",
        data(){
            return{
                formData:{
                    shipping_method_id:'',
                }
            }
        },
        created() {

        },
        methods:{
            ...mapActions([
                'storeShippingMethod',
                'tabChange',
                'deliveryChargeUpdate'
            ]),
            shippingMethodStore(){
                this.storeShippingMethod(this.formData)
                    .then(response=>{
                        this.$noty.success('Shipping Information Added.');
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
                        'tabAction':true,
                    },

                };
                this.tabChange(data);

            },
            setDeliveryCharge(charge){
                this.deliveryChargeUpdate(charge);
            }
        },
        computed:{
            ...mapGetters([
                'shippingMethods',
                'deliveryCharge'
            ])
        }
    }
</script>

<style scoped>

</style>
