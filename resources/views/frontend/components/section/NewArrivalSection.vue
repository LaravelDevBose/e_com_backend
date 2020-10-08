<template>
    <div class="block-floor-products block-floor-products-opt3 floor-products1"  v-if="newArrivals && newArrivals.length >0 ">
        <div class="container">
            <!-- title -->
            <div class="block-title ">
                <span class="title">NEW ARRIVALS IN</span>
            </div>

            <div class="block-content">
                <!-- banner -->
                <div class="col-banner">
                    <router-link :to="{name: 'Section Products', params:{section_slug: 'new_arrival'}}" class="box-img" title="Shop now">
                        <img :src="$baseUrl+'/images/section/new-arrival.jpg'" alt="New Arrival Products">
                        <div class="des" v-if="max_discount > 0"><span>up to {{ max_discount}}% off</span></div>
                    </router-link>

                </div>

                <!-- tab product -->
                <div class="col-products">
                    <div class="owl-carousel owl-carousel-new-arrival"
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
                            class="product-item  product-item-opt-1"
                            v-for="newArrival in newArrivals"
                            :key="newArrival.id"
                        >
                            <product-item :product="newArrival"></product-item>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
import Vue from 'vue';
import ProductItem from "../product/ProductItem";
import {mapGetters, mapActions} from 'vuex';
export default {
    name: "NewArrivalSection",
    components: {ProductItem},
    data(){
        return{
            max_discount: 0,
        }
    },
    created() {
        this.getNewArrivalProducts();
    },
    methods:{
        ...mapActions(['getNewArrivalProducts']),
        installOwlCarousel: function() {
            const newAOwl = $('.owl-carousel-new-arrival');
            var config = newAOwl.data();
            config.navText = ['',''];
            config.dotsData = false;
            config.smartSpeed="800";
            config.animateOut="fadeOutDown";
            config.animateIn="fadeInDown";
            newAOwl.owlCarousel(config);
        },
        findMaxDiscount(){
            this.newArrivals.filter(product=> {
                if (product.discount){
                    if (this.max_discount < product.discount.percent){
                        this.max_discount = product.discount.percent;
                    }
                }
            })
        }
    },
    computed: {
        ...mapGetters(['newArrivals']),
        checkNewArrivalsProducts(){
            return JSON.parse(JSON.stringify(this.newArrivals))
        }
    },
    watch:{
        checkNewArrivalsProducts:{
            handler(newValue){
                Vue.nextTick(function(){
                    this.installOwlCarousel();
                }.bind(this));
                this.findMaxDiscount();
            },
            deep:true,
        },
    }
}
</script>

<style scoped>

</style>
