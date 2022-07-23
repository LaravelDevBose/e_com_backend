<template>
    <div class="block-trending banner-slide2" v-if="mostRatedProducts">
        <div class="block-title" v-if="mostRatedProducts.length > 0">
            Trending
        </div>
        <div class="block-content">
            <div class="owl-carousel owl-carousel-mostRated"
                 data-nav="true"
                 data-dots="false"
                 data-margin="30"
                 data-responsive='{
                    "0":{"items":1},
                    "480":{"items":1},
                    "768":{"items":1},
                    "992":{"items":1},
                    "1200":{"items":1}
                    }'>
                <div class="item" v-for="(mostRated, index) in mostRatedProducts">

                    <div
                        class="product-item product-item-opt-1"
                        v-if="mostRated && mostRated.length > 0"
                        v-for="product in mostRated"
                        :key="product.slug"
                    >
                        <rated-product-list-item :product="product"></rated-product-list-item>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import Vue from "vue";
import CarouselProductListItem from "../product/CarouselProductListItem";
import RatedProductListItem from "../product/RatedProductListItem";

export default {
    name: "HomeTrendingSection",
    components: {RatedProductListItem, CarouselProductListItem},
    created() {
        this.getMostRatedProducts();
    },
    methods:{
        ...mapActions(['getMostRatedProducts']),
        installOwlCarousel: function() {
            const OwlData = $('.owl-carousel-mostRated');
            var config = OwlData.data();
            config.navText = ['',''];
            config.dotsData = false;
            config.smartSpeed="800";
            config.animateOut="fadeOutDown";
            config.animateIn="fadeInDown";
            OwlData.owlCarousel(config);
        }
    },
    computed: {
        ...mapGetters(['mostRatedProducts']),
        checkMostRatedProducts(){
            return JSON.parse(JSON.stringify(this.mostRatedProducts))
        }
    },
    watch:{
        checkMostRatedProducts:{
            handler(newValue){
                if (this.mostRatedProducts && this.mostRatedProducts.length> 0){
                    Vue.nextTick(function(){
                        this.installOwlCarousel();
                    }.bind(this));
                }
            },
            deep:true,
        },
    }
}
</script>

<style scoped>

</style>
