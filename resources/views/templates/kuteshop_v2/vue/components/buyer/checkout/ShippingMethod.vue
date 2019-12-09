<template>
    <div class="box-border">
        <ul class="shipping_method">
            <li v-if="deliveryMethods" v-for="(method, index) in deliveryMethods" :key="index">
                <label for="radio_button_3" >
                    <input checked="" v-model="formData.shipping_method_id" :value="method.delivery_id" name="radio_3" id="radio_button_3" type="radio">
                    {{ method.delivery_title }}-  $ {{ method.cost_price}}
                    <br>
                    ({{ method.min_time }}-{{ method.max_time }}) working days
                </label>
            </li>
            <li class="row">
                <div class="col-sm-6">
                    <button type="button" @click.prevent="backTab()" class="button">Back</button>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <button type="button" @click.prevent="shippingMethodStore" class="button">{{ $t('checkout.continue')}}</button>
                </div>
            </li>
        </ul>
    </div>
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
                    cart_tab:{
                        'tabAction':false,
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
                'deliveryMethods',
                'deliveryCharge'
            ])
        }
    }
</script>

<style scoped>

</style>
