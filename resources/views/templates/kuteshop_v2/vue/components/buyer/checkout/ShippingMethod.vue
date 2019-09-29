<template>
    <div class="box-border">
        <ul class="shipping_method">
            <li v-if="shippingMethods" v-for="(shipping, index) in shippingMethods" :key="index">
                <label for="radio_button_3"><input checked="" v-model="formData.shipping_method_id" :value="index" name="radio_3" id="radio_button_3" type="radio">{{ shipping }}</label>
            </li>
        </ul>
        <button type="button" @click.prevent="shippingMethodStore" class="button">Continue</button>
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
                'tabChange'
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

            }
        },
        computed:{
            ...mapGetters([
                'shippingMethods'
            ])
        }
    }
</script>

<style scoped>

</style>
