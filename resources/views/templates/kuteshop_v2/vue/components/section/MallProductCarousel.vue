<template>
    <div class="block-deals-of-opt2">
        <div class="block-title ">
            <span class="title">Saliim Mall Products</span>
        </div>
        <div class="block-content">
            <div class="owl-carousel owl-carousel-mall-products"
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
                    v-for="product in mallLatestProducts">
                    <mall-product-grid :product="product" :mallname="mallTitle"></mall-product-grid>
                </template>
            </div>
            <a href="/mall" style="float: right; color: #f78031;">See All</a>
        </div>
    </div>
</template>

<script>
import Vue from "vue";
import MallProductGrid from "../product/MallProductGrid";

export default {
    name: "MallProductCarousel",
    props:{
        mallLatestProducts: Array,
        mallTitle: String
    },
    components:{MallProductGrid},
    mounted() {
        Vue.nextTick(function () {
            this.installOwlCarousel();
        }.bind(this));
    },
    methods:{
        installOwlCarousel: function() {
            const hotDealOwl = $('.owl-carousel-mall-products');
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

</style>
