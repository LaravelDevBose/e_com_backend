<template>
    <fieldset>
        <div id="checkout-shipping-method-load">
            <dl class="shipping-methods" v-if="deliveryMethods">
                <dd>
                    <ul>
                        <li v-for="(method, index) in deliveryMethods" :key="index">
                            <input
                                type="radio"
                                name="shipping_method"
                                v-model="formData.shipping_method_id"
                                :value="method.delivery_id"
                                :id="'radio_button_'+index"
                                class="radio"
                            >
                            <label :for="'radio_button_'+index">
                                {{ method.delivery_title }}
                                ({{ method.min_time }}-{{ method.max_time }}) working days
                                <b class="price"> - ${{ method.cost_price }}</b>
                            </label>
                        </li>
                    </ul>
                </dd>
            </dl>
        </div>
        <div class="buttons-set1" id="shipping-method-buttons-container">
            <a href="#" @click.prevent="backTab()"  class="back-link">« Back</a>
            <button type="button" class="button" @click.prevent="shippingMethodStore" style="float: right;"><span>Continue</span></button>
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
                    cost_price:0,
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
                this.deliveryMethods.filter(method=>{
                    if(method.delivery_id === this.formData.shipping_method_id){
                        this.formData.cost_price = method.cost_price
                    }
                });
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
            backTab(){
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
        },
        computed:{
            ...mapGetters([
                'deliveryMethods',
                'deliveryCharge'
            ])
        }
    }
</script>

<style scoped>

</style>
