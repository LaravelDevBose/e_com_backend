<template>
    <div  v-if="hotproducts.length !== 0"  class="block-deals-of block-deals-of-opt1">
        <div class="block-title ">
            <span class="icon"></span>
            <div class="heading-title">{{ $t('products.hot_deals') }}</div>
        </div>
        <div class="block-content">

            <div class="owl-carousel"
                 data-nav="false"
                 data-dots="false"
                 data-margin="30"
                 data-responsive='{
                        "0":{"items":1},
                        "480":{"items":2},
                        "768":{"items":3},
                        "992":{"items":1},
                        "1200":{"items":1}
                        }'>

                <div v-for="(hotProduct,index) in hotproducts" :key="index" class="product-item  product-item-opt-2 ">
                    <div class="deals-of-countdown">
                        <div class="count-down-time" :data-countdown="hotProduct.expired_at"></div>
                    </div>
                    <product-grid :product="hotProduct.product" :mallname="mallname"></product-grid>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductGrid from "../product/ProductGrid";
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name: "HotDealProductsBlock",
        components: {ProductGrid},
        props:{
            hotproducts:{
                type:[Object, Array]
            },
            mallname:{
                type: String,
                default: 'Saliim Mall'
            }
        },
        data(){
            return{
                hotProducts:[],
            }
        }
    }
</script>

<style scoped>

</style>
