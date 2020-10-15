<template>
    <div class="block-deal-opt12" v-if="discountProducts && discountProducts.length > 0" >

        <div class="block-title">
            <span class="title">hot deal of this week</span>
        </div>

        <div class="block-content" style="padding: 0;">
            <div class="owl-carousel owl-carousel-hot-deal"
                 data-nav="true"
                 data-dots="false"
                 data-margin="30"
                 data-responsive='{
                    "0":{"items":1},
                    "480":{"items":1},
                    "640":{"items":2},
                    "992":{"items":1},
                    "1200":{"items":1}
                    }'
            >

                <div
                    class=" product-item product-item-opt-1"
                    v-for="disProduct in discountProducts"
                    :key="disProduct.id"
                    v-if="disProduct.product"
                >
                    <hot-deal-product-item
                        :product="disProduct.product"
                        :start_at="disProduct.start_at"
                        :expire_at="disProduct.expire_at"
                        :percent="disProduct.percent"
                    ></hot-deal-product-item>
                </div>
            </div>
        </div>
        <!--<div class="block-content">
            <div class="col-banner">
                <router-link :to="{name: 'Section Products', params:{section_slug: 'hot_deal'}}">
                    <div class="des"><span>Show All</span></div>
                </router-link>

            </div>
        </div>
-->
    </div>
</template>

<script>
import HotDealProductItem from "../product/HotDealProductItem";
import {mapActions, mapGetters} from "vuex";
import Vue from "vue";
export default {
    name: "HotDealCarouselSection",
    components:{HotDealProductItem},
    created() {
        this.getDiscountProducts();
    },
    methods:{
        ...mapActions(['getDiscountProducts']),
        installOwlCarousels: function() {
            const hotDealOwlC = $('.owl-carousel-hot-deal');
            var config = hotDealOwlC.data();
            config.navText = ['',''];
            config.dotsData = false;
            config.smartSpeed="800";
            config.loop= true;
            config.rewind = true;
            /*config.animateOut="fadeOutDown";
            config.animateIn="fadeInDown";*/
            hotDealOwlC.owlCarousel(config);
        }
    },
    computed:{
        ...mapGetters(['discountProducts']),
        checkDiscountProducts(){
            return JSON.parse(JSON.stringify(this.discountProducts))
        }
    },
    watch:{
        checkDiscountProducts:{
            handler(newValue){
                Vue.nextTick(function(){
                    this.installOwlCarousels();
                }.bind(this));
            },
            deep:true,
        },
    }
}
</script>

<style scoped>

</style>
