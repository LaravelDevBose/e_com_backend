<template>
    <div class="block-deals-of-opt2">
        <div class="block-title ">
            <span class="title">Latest Deals</span>
            <div class="deals-of-countdown">
                <timer
                    :starttime="latestDeals.start_time"
                    :endtime="latestDeals.end_time"
                ></timer>
            </div>
        </div>
        <div class="block-content">
            <div class="owl-carousel owl-carousel-hot-grid"
                 data-nav="true"
                 data-dots="false"
                 data-margin="8"
                 data-responsive='{
                            "0":{"items":1},
                            "480":{"items":2},
                            "640":{"items":3},
                            "992":{"items":4},
                            "1200":{"items":5}
                            }'>
                <template
                    v-if="latestDeals.deal_products"
                    v-for="dealProduct in latestDeals.deal_products"
                >
                    <section-product-grid :product="dealProduct.product" :mallname="mallTitle"></section-product-grid>
                </template>
            </div>

        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import SectionProductGrid from "../product/SectionProductGrid";
import Timer from "../helper/Timer";
export default {
    props:{
        latestDeals: Object,
        mallTitle: String
    },
    name: "HotDealGridSection",
    components: {Timer, SectionProductGrid},
    mounted() {
        Vue.nextTick(function () {
            this.installOwlCarousel();
        }.bind(this));
    },
    methods:{
        installOwlCarousel: function() {
            const hotDealOwl = $('.owl-carousel-hot-grid');
            var config = hotDealOwl.data();
            config.dotsData = false;
            config.smartSpeed="800";
            config.animateOut="fadeOutDown";
            config.animateIn="fadeInDown";
            hotDealOwl.owlCarousel(config);
        }
    }
}
</script>

<style scoped>
.des{
    float: right;
    height: 25px;
    width: max-content;
    color: #fff;
    background-color: #08c;
    padding: 2px 5px;
}
a{
    color: #fff!important;
}
</style>
