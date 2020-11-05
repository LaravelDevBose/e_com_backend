<template>
    <div v-if="checkSearchResult" class="search-content block-sidebar block-sidebar-products">
        <div role="complementary" class="widget_wrapper13" id="secondary">
            <div class="popular-posts widget widget__sidebar wow bounceInUp animated" id="recent-posts-4">
                <h3 class="widget-title"><span>Search Products</span></h3>
                <div class="widget-content">
                    <ul v-if="searchResult.products && Object.entries(searchResult.products).length !== 0" class="posts-list unstyled clearfix">
                        <li v-for="(product,index) in searchResult.products" :key="index" class="product-item product-item-opt-2">
                            <div class="product-item-info">
                                <figure class="featured-thumb">
                                    <router-link :to="{ name: 'Product', params:{ slug: product.slug } }" class="product-item-img" >
                                        <clazy-load :src="product.image.image_path">
                                            <img :title="product.name" :src="product.image.image_path" class="feat-thumb ">

                                            <div class="preloader" slot="placeholder">
                                                <img :title="product.name" :src="$baseUrl+'/images/loader.gif'" class="feat-thumb img-thumbnail">
                                            </div>
                                        </clazy-load>
                                    </router-link>
                                </figure>
                                <!--featured-thumb-->
                                <h4 class="product-name">
                                    <router-link :to="{name:'Product', params:{ slug:product.slug }}">
                                        {{ product.name }}
                                    </router-link>
                                </h4>
                            </div>
                        </li>
                    </ul>

                    <ul class="other-list" v-if="searchResult.categories && Object.entries(searchResult.categories).length !== 0">
                        <li>
                            <h3 class="widget-title"><span>Categories</span></h3>
                        </li>
                        <li class="cat-item" v-for="(category,index) in searchResult.categories" :key="index">
                            <router-link :to="{name:'Category Products', params:{category_slug:category.slug}}" class="author" >
                                {{ category.name }}
                            </router-link>
                        </li>
                    </ul>
                    <ul class="other-list" v-if="searchResult.brands && Object.entries(searchResult.brands).length !== 0">
                        <li>
                            <h3 class="widget-title"><span>Brands</span></h3>
                        </li>
                        <li class="cat-item" v-for="(brand,index) in searchResult.brands" :key="index">
                            <router-link :to="{name:'Brand Products', params:{brand_slug:brand.slug}}" class="author" >
                                {{ brand.name }}
                            </router-link>
                        </li>
                    </ul>
                </div>
                <!--widget-content-->
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters} from 'vuex';
    export default {
        name: "SearchResultSection",
        methods:{

        },
        computed:{
            ...mapGetters([
                'searchResult',
            ]),
            checkSearchResult(){
                console.log('eee');
                return this.searchResult.products.length > 0
                    || this.searchResult.categories.length > 0
                    || this.searchResult.brands.length > 0;
            }
        },
    }
</script>

<style scoped>
    ul{
        list-style: none;
    }
    .other-list{
        padding-left: 0;
    }
    .cat-item{
        padding: 4px 0;
    }
    .other-list .author{
        padding: 7px;
        font-weight: 600;
    }
    .cat-title{
        padding: 7px;
        font-weight: bold;
    }
    .popular-posts .post-meta{
        padding:0;
    }
    .popular-posts{
        border: none;
        margin-bottom: 0px;
        padding-bottom:0;
    }
    .widget-content{
        padding: 5px;
    }
    .posts-list li{
        border-bottom: 1px dotted #0acde6;
    }
    .search-content{
        position: absolute;
        top: 57px;
        right: 0px;
        background: #fff;
        padding: .6rem;
        z-index: 999;
        box-shadow: 0 0 15px -7px #666;
        border-radius: 5px;
        min-width: 250px;
        width: 100%;
    }
    .search-title{
        padding-bottom: .6rem;
        margin:.5rem 0 1rem;
        border-bottom: 1px dotted #0acde6;
    }
</style>
