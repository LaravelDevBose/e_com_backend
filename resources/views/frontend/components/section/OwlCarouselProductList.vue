<template>
    <!-- block  -new-product-->
    <div class="block-new-product-opt12" v-if="products && products.length > 0">

        <div class="block-title">
            <span class="title">{{ title}}</span>
        </div>

        <div class="block-content">
            <div class="owl-carousel owl-carousel-product-list"
                 data-nav="true"
                 data-dots="false"
                 data-margin="30"
                 data-responsive='{
                    "0":{"items":1},
                    "480":{"items":1},
                    "640":{"items":2},
                    "768":{"items":2},
                    "992":{"items":1},
                    "1200":{"items":1}
                }'>

                <div class="item"
                    v-if="product_list && product_list.length > 0"
                    v-for="(productsData, ind) in product_list"
                     :key="ind"
                >

                    <div
                        class="product-item product-item-opt-12"
                        v-if="productsData && productsData.length > 0"
                        v-for="productEl in productsData"
                        :key="productEl.slug"
                    >
                        <carousel-product-list-item :product="productEl"></carousel-product-list-item>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- block  -new-product-->
</template>

<script>
import CarouselProductListItem from "../product/CarouselProductListItem";
import Vue from "vue";

export default {
    name: "OwlCarouselProductList",
    components: {CarouselProductListItem},
    props:{
        products:Array,
        title: {
            type: String,
            default: 'Related Product'
        }
    },
    data(){
        return{
            product_list:[],
        }
    },
    mounted() {

    },
    methods:{
        installOwlCarousel: function() {
            const owlProList = $('.owl-carousel-product-list');
            var config = owlProList.data();
            config.dotsData = false;
            config.smartSpeed="800";
            config.animateOut="fadeOutDown";
            config.animateIn="fadeInDown";
            owlProList.owlCarousel(config);
        },
        createProductChuck(){
            Object.defineProperty(Array.prototype, 'chunk', {
                value: function(chunkSize) {
                    var R = [];
                    for (var i = 0; i < this.length; i += chunkSize)
                        R.push(this.slice(i, i + chunkSize));
                    return R;
                }
            });
            this.product_list = this.products.chunk(5);
        }
    },
    computed:{
        checkProducts(){
            return JSON.parse(JSON.stringify(this.products))
        }
    },
    watch:{
        checkProducts:{
            handler(newValue){
                this.createProductChuck();
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
