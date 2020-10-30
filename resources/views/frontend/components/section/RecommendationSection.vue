<template>
    <div
        class="block-floor-products block-floor-products-opt3 floor-products4"
        v-if="recommendedProducts && recommendedProducts.length > 0"
    >
        <div class="container">
            <!-- title -->
            <div class="block-title ">
                <span class="title">RECOMMENDATION FOR YOU</span>
            </div>

            <div class="block-content">

                <!-- banner -->
                <div class="col-banner">
                    <router-link
                        :to="{name: 'Section Products', params:{section_slug: 'recommendation'}}"
                        class="box-img"
                        title="Shop Now"
                    >
                        <img :src="$baseUrl+'/images/section/trending.jpg'" alt="RECOMMENDATION Products" style="height: 100%;">
<!--                        <div class="des"><span>SHOW ALL</span></div>-->
                    </router-link>
                </div>

                <!-- tab product -->
                <div class="col-products">
                    <div class="owl-carousel owl-carousel-recommended"
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
                            v-for="product in recommendedProducts"
                            :key="'R-'+product.id"
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
    name: "RecommendationSection",
    components: {ProductItem},
    created() {
        this.getRecommendedProducts();
    },
    methods:{
        ...mapActions(['getRecommendedProducts']),
        installOwlCarousel: function() {
            const OwlData = $('.owl-carousel-recommended');
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
        ...mapGetters(['recommendedProducts']),
        checkRecommendedProducts(){
            return JSON.parse(JSON.stringify(this.recommendedProducts))
        }
    },
    watch:{
        checkRecommendedProducts:{
            handler(newValue){
                if (this.recommendedProducts && this.recommendedProducts.length> 0){
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
