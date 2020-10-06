<template>
    <div class="block-deal-opt12" >

        <div class="block-title">
            <span class="title">hot deal of this week</span>
        </div>

        <div class="block-content">
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
                 v-if="discountProducts && discountProducts.length > 0"
            >

                <div
                    class=" product-item product-item-deal-opt12"
                    v-for="disProduct in discountProducts"
                    :key="disProduct.id"
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
        if (this.discountProducts.length <= 0){
            this.getDiscountProducts();
        }
    },
    methods:{
        ...mapActions(['getDiscountProducts']),
        installOwlCarousel: function() {
            const hotDealOwl = $('.owl-carousel-hot-deal');
            var config = hotDealOwl.data();
            config.navText = ['',''];
            config.dotsData = false;
            config.smartSpeed="800";
            config.animateOut="fadeOutDown";
            config.animateIn="fadeInDown";
            hotDealOwl.owlCarousel(config);
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
                    this.installOwlCarousel();
                }.bind(this));
            },
            deep:true,
        },
    }
}
</script>

<style scoped>

</style>
