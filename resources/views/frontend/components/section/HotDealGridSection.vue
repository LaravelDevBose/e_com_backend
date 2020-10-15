<template>
    <div class="block-hot-deals-opt3" >
        <div class="container">

            <div class="box-content">

                <div class="block-title" style="padding-top: 0;">
                    <span class="title"><span>H<br>o<br>t</span><span>d<br>e<br>a<br>l<br>s</span></span>
                </div>

                <div class="block-content " style="padding: 0;">
                    <div class="col-banner">
                        <div class="des">
                            <router-link :to="{name: 'Section Products', params:{section_slug: 'hot_deal'}}" title="Shop now">
                            Show All
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="block-content ">
                    <div class="owl-carousel owl-carousel-hot-grid"
                         data-nav="true"
                         data-dots="false"
                         data-margin="30"
                         data-responsive='{
                                "0":{"items":1},
                                "480":{"items":2, "nav": false},
                                "480":{"items":2},
                                "768":{"items":3},
                                "992":{"items":4},
                                "1200":{"items":4}
                            }'
                         v-if="discountProducts && discountProducts.length > 0"
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

            </div>
        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import {mapActions, mapGetters} from 'vuex';
import HotDealProductItem from "../product/HotDealProductItem";
export default {
    name: "HotDealGridSection",
    components: {HotDealProductItem},
    created() {
        this.getDiscountProducts();
    },
    methods:{
        ...mapActions(['getDiscountProducts']),
        installOwlCarousel: function() {
            const hotDealOwl = $('.owl-carousel-hot-grid');
            var config = hotDealOwl.data();
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
