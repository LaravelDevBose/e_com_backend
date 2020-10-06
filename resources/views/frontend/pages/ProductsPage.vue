<template>
    <!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <!--<li><a href="#">Home </a></li>
                <li><a href="#">Electronics </a></li>
                <li class="active">Machine Pro</li>-->
            </ol><!-- Block  Breadcrumb-->

            <div class="row">

                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3  col-main">

                    <!-- images categori -->
                    <div class="category-view" v-if="categoryInfo">
                        <div class="owl-carousel owl-carousel-category "
                             data-nav="true"
                             data-dots="false"
                             data-margin="0"
                             data-items='1'
                             data-autoplayTimeout="700"
                             data-autoplay="true"
                             data-loop="true"
                        >
                            <div class="item" v-for="slider in cat_slider">
                                <router-link :to="{name: 'Category Products', params:{category_slug: slider.slug}}">
                                    <img :src="slider.image_path" :alt="slider.name" :title="slider.name">
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <!-- images categori -->

                    <!-- link categori -->
                    <ul class="category-links" v-if="categoryInfo">
                        <li class="current-cate" :class="{'text-center width-100': categoryInfo.children.length <= 0}">
                            <router-link :to="{name: 'Category Products', params:{category_slug: categoryInfo.slug}}">
                                {{ categoryInfo.name }}
                            </router-link>
                        </li>
                        <li
                            v-if="categoryInfo.children && categoryInfo.children.length > 0"
                            v-for="category in categoryInfo.children"
                            :key="category.slug"
                        >
                            <router-link :to="{name: 'Category Products', params:{category_slug: category.slug}}">
                                {{ category.name }}
                            </router-link>
                        </li>
                    </ul>
                    <!-- link categori -->

                    <!-- Toolbar -->
                        <products-toolbar-top></products-toolbar-top>
                    <!-- Toolbar -->

                    <!-- List Products -->
                    <div class="products"
                         :class="[view === 2 ? 'products-list': 'products-grid']"
                    >
                        <ol class="product-items row">
                            <li
                                class="product-item"
                                v-if="products && products.length > 0"
                                v-for="(productEl, index) in products"
                                :key="randomNumber(productEl.slug)"
                                :class="[view === 2 ? 'col-sm-12': 'col-sm-3']"
                            >
                                <div class="product-item-opt-1">
                                    <product-item :product="productEl" :page="true"></product-item>
                                </div>
                            </li>
                            <li
                                class="col-sm-12 product-item"
                                v-else
                            >
                                <div class="alert alert-info text-center">
                                    <h2>No Product Found</h2>
                                </div>
                            </li>

                        </ol><!-- list product -->
                    </div> <!-- List Products -->

                    <!-- Toolbar -->
                    <products-toolbar-bottom></products-toolbar-bottom>
                    <!-- Toolbar -->

                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class="col-md-3 col-md-pull-9  col-sidebar">
                    <products-sidebar-section></products-sidebar-section>
                </div><!-- Sidebar -->


            </div>
        </div>


    </main>
    <!-- end MAIN -->
</template>

<script>
import ProductsSidebarSection from "../components/products/ProductsSidebarSection";
import ProductsToolbarBottom from "../components/products/ProductsToolbarBottom";
import ProductItem from "../components/product/ProductItem";
import ProductsToolbarTop from "../components/products/ProductsToolbarTop";
import {mapActions, mapGetters} from 'vuex';
import Vue from "vue";

export default {
    name: "ProductsPage",
    components: {
        ProductsToolbarTop,
        ProductItem,
        ProductsToolbarBottom,
        ProductsSidebarSection
    },
    data(){
        return{
            cat_slider: [],
            owl_carousel: false,
            hotDealOwl:{},
            view: 1,
        }
    },
    beforeRouteEnter(to, from, next){
        let req_data = {
            category_slug: '',
            brand_slug: '',
            tag_slug:'',
            section_slug:'',
        }
        if (to.params.hasOwnProperty('category_slug')){
            req_data.category_slug = to.params.category_slug;
        }else if(to.params.hasOwnProperty('brand_slug')){
            req_data.brand_slug = to.params.brand_slug;
        }else if(to.params.hasOwnProperty('tag_slug')){
            req_data.tag_slug = to.params.tag_slug;
        }else if(to.params.hasOwnProperty('section_slug')){
            req_data.section_slug = to.params.section_slug;
        }else{
            this.$router.push('/page_not_found');
        }

        next(vm => vm.updateSlugData(req_data));
    },
    beforeRouteUpdate(to, from, next){
        let req_data = {
            category_slug: '',
            brand_slug: '',
            tag_slug:'',
            section_slug:'',
        }
        if (to.params.hasOwnProperty('category_slug')){
            req_data.category_slug = to.params.category_slug;
        }else if(to.params.hasOwnProperty('brand_slug')){
            req_data.brand_slug = to.params.brand_slug;
        }else if(to.params.hasOwnProperty('tag_slug')){
            req_data.tag_slug = to.params.tag_slug;
        }else if(to.params.hasOwnProperty('section_slug')){
            req_data.section_slug = to.params.section_slug;
        }else{
            this.$router.push('/page_not_found');
        }
        this.updateSlugData(req_data);
        this.getProductList();
        next();
    },
    beforeCreate() {

    },
    created() {

    },
    mounted(){
        //console.log(this.reqData);
    },
    methods:{
        ...mapActions(['updateSlugData', 'getProductList']),
        installOwlCarousel: function() {
            this.owl_carousel = true;
            this.hotDealOwl = $('.owl-carousel-category');
            var config = this.hotDealOwl.data();
            config.navText = ['',''];
            config.dotsData = false;
            config.smartSpeed="800";
            config.animateOut="fadeOutDown";
            config.animateIn="fadeInDown";
            config.loop= true;
            config.rewind = true;
            this.hotDealOwl.owlCarousel(config);
        },
        mapCatSliderData(){
            if (this.categoryInfo !== ''){
                if (this.categoryInfo.attachment){
                    this.cat_slider.push({
                        name: this.categoryInfo.name,
                        slug: this.categoryInfo.slug,
                        image_path: this.categoryInfo.attachment.image_path,
                    })
                }

                if(this.categoryInfo.children && this.categoryInfo.children.length > 0){
                    let data = {
                        name: '',
                        slug: '',
                        image_path: '',
                    }
                    this.categoryInfo.children.forEach((subCategory)=>{
                        if (subCategory.attachment){
                            data.name = subCategory.name;
                            data.slug = subCategory.slug;
                            data.image_path = subCategory.attachment.image_path;
                            this.cat_slider.push(data)
                        }
                        if(subCategory.children && subCategory.children.length > 0){
                            subCategory.children.forEach((cat)=>{
                                if (cat.attachment){
                                    data.name = cat.name;
                                    data.slug = cat.slug;
                                    data.image_path = cat.attachment.image_path;
                                    this.cat_slider.push(data)
                                }
                            })
                        }
                    })
                }
            }
        },
        randomNumber : function(slug){
            return (Math.floor(Math.random() * (10 - 1 + 1)) + 1) + slug;
        }

    },
    computed:{
        ...mapGetters([
            'reqData',
            'categoryInfo',
            'products',
            'viewAs'
        ]),
        checkReqData(){
            return JSON.parse(JSON.stringify(this.reqData));
        },
        checkCategoryInfo(){
            return JSON.parse(JSON.stringify(this.categoryInfo))
        },
        checkViewAs(){
            return JSON.parse(JSON.stringify(this.viewAs))
        }
    },
    watch:{
        checkReqData: {
            handler(newValue, oldValue){
                if(newValue !== oldValue){
                    this.getProductList();
                }
            }, deep: true,
        },
        checkCategoryInfo:{
            handler(newValue, oldValue){
                if(newValue !== '' && newValue !== oldValue){
                    this.cat_slider.length = 0;
                    this.mapCatSliderData();
                    if (!this.owl_carousel){
                        Vue.nextTick(function(){
                            this.installOwlCarousel();
                        }.bind(this));
                    }else{
                        Vue.nextTick(function(){
                            this.hotDealOwl.trigger('destroy.owl.carousel');
                            this.installOwlCarousel();
                        }.bind(this));

                    }

                }

            },
            deep:true,
        },
        checkViewAs: {
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    this.view = this.viewAs;
                }
            }, deep: true
        }
    }
}
</script>

<style scoped>
.width-100{
    width: 100%!important;
    display: block;
}
</style>
