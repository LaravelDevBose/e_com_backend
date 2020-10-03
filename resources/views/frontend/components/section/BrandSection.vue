<template>
    <div class="block-showcase-opt7" v-if="brands && brands.length > 0">
        <div class="container">

            <div class="block-title">
                <span class="title">brand showcase</span>
            </div>

            <div class="block-content" >
                <ul class="nav-brand owl-carousel owl-carousel-brand"
                    data-nav="true"
                    data-loop="true"
                    data-dots="false"
                    data-margin="1"
                    data-responsive='{
                            "0":{"items":3},
                            "380":{"items":4},
                            "480":{"items":5},
                            "640":{"items":7},
                            "992":{"items":8}
                        }'>

                    <li  class="item"
                         v-for="brand in brands"
                         :key="'brand-'+brand.id"
                         :title="brand.name"
                    >
                        <router-link :to="{name: 'Brand Product', params:{ slug: brand.slug }}" class="item-img">
                            <span v-if="brand.attachment">
                                <img  :src="brand.attachment.image_path" :alt="brand.name">
                            </span>
                            <span v-else>
                                <div class="d-brand">
                                    {{ brand.name }}
                                </div>
                            </span>
                        </router-link>
                    </li>

                </ul>

            </div>

        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import Vue from "vue";

export default {
    name: "BrandSection",
    created() {
        this.getBrands();
    },
    methods:{
        ...mapActions(['getBrands']),
        installOwlCarousel: function() {
            const OwlData = $('.owl-carousel-brand');
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
        ...mapGetters(['brands']),
        checkBrands(){
            return JSON.parse(JSON.stringify(this.brands))
        }
    },
    watch:{
        checkBrands:{
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
.d-brand{
    height: 40px;
    width: 100%;
    background-color: rgb(0, 136, 204);
    text-align: center;
    font-weight: bold;
    color: rgb(255, 255, 255);
    padding: 10px 0;
}
.item-img{
    height: 70px;
    width: 100%;
}
.item-img span img{
    height: 100%;
    width: 100%;
}
</style>
