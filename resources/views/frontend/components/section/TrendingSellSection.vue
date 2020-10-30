<template>
    <div
        class="block-floor-products block-floor-products-opt3 floor-products2"
        v-if="trendingProducts && trendingProducts.length > 0"
    >
        <div class="container">
            <!-- title -->
            <div class="block-title ">
                <span class="title">TOP Trending Products</span>
            </div>

            <div class="block-content">

                <!-- banner -->
                <div class="col-banner">
                    <router-link
                        :to="{name: 'Section Products', params:{section_slug: 'trending'}}"
                        class="box-img"
                        title="Shop now"
                    >
                        <img :src="$baseUrl+'/images/section/flash-sale.jpg'" alt="Trending Products" style="height: 100%;">
                    </router-link>
                </div>

                <!-- tab product -->
                <div class="col-products">
                    <div class="owl-carousel owl-carousel-trending"
                         data-nav="true"
                         data-dots="false"
                         data-margin="8"
                         data-responsive='{
                                    "0":{"items":1},
                                    "420":{"items":2},
                                    "600":{"items":3},
                                    "768":{"items":3},
                                    "992":{"items":3},
                                    "1200":{"items":4}
                                }'>
                        <div
                            class="product-item product-item-opt-1"
                            v-for="product in trendingProducts"
                            :key="'T-'+product.id"
                        >
                            <product-item :product="product"></product-item>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import ProductItem from "../product/ProductItem";
import {mapActions, mapGetters} from "vuex";
import Vue from "vue";
export default {
    name: "TrendingSellSection",
    components: {ProductItem},
    created() {
        this.getTrendingProducts();
    },
    methods:{
        ...mapActions(['getTrendingProducts']),
        installOwlCarousel: function() {
            const trendOwl = $('.owl-carousel-trending');
            var config = trendOwl.data();
            config.navText = ['',''];
            config.dotsData = false;
            config.smartSpeed="800";
            config.animateOut="fadeOutDown";
            config.animateIn="fadeInDown";
            trendOwl.owlCarousel(config);
        }
    },
    computed: {
        ...mapGetters(['trendingProducts']),
        checkTrendingProducts(){
            return JSON.parse(JSON.stringify(this.trendingProducts))
        }
    },
    watch:{
        checkTrendingProducts:{
            handler(newValue){
                if (this.trendingProducts && this.trendingProducts.length > 0){
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
