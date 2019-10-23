<template>
    <div v-if="checkSearchResult" class="search-content">
        <div role="complementary" class="widget_wrapper13" id="secondary">
            <div class="popular-posts widget widget__sidebar wow bounceInUp animated" id="recent-posts-4">
                <h3 class="widget-title"><span>Most Popular Post</span></h3>
                <div class="widget-content">
                    <ul v-if="searchResult.products && Object.entries(searchResult.products).length !== 0" class="posts-list unstyled clearfix">
                        <li v-for="(product,index) in searchResult.products" :key="index">
                            <figure class="featured-thumb">
                                <a :href="'/product/'+product.product_slug">
                                    <img v-if="product.thumbImage.image_path" width="50" height="50" :alt="product.productName" :src="product.thumbImage.image_path">
                                    <img v-else width="50" height="50" :alt="product.productName" src="/crocus_v2/images/blog-img.jpg">
                                </a>
                            </figure>
                            <!--featured-thumb-->
                            <h4>
                                <a :title="product.productName" :href="'/product/'+product.product_slug">{{ product.productName}}</a>
                            </h4>
                            <p class="post-meta" v-if="product.brand">
                                <span class="entry-date">{{ product.brand.brand_name }}</span>
                            </p>
                            <p class="post-meta" v-if="product.category">
                                <span class="entry-date">{{ product.category.name }}</span>
                            </p>
                        </li>
                    </ul>

                    <ul class="other-list" v-if="searchResult.categories && Object.entries(searchResult.categories).length !== 0">
                        <li>
                            <h3 class="widget-title"><span>Categories</span></h3>
                        </li>
                        <li class="cat-item" v-for="(category,index) in searchResult.categories" :key="index">
                            <a class="author" :href="`/category/${category.slug}/products`">{{ category.name }}</a>
                        </li>
                    </ul>
                    <ul class="other-list" v-if="searchResult.brands && Object.entries(searchResult.brands).length !== 0">
                        <li>
                            <h3 class="widget-title"><span>Brands</span></h3>
                        </li>
                        <li class="cat-item" v-for="(brand,index) in searchResult.brands" :key="index">
                            <a class="author" :href="`/category/${brand.brand_slug}/products`">{{ brand.brand_name }}</a>
                        </li>
                    </ul>
                </div>
                <!--widget-content-->
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    export default {
        name: "SearchResultSection",
        methods:{

        },
        computed:{
            ...mapGetters([
                'searchResult',
            ]),
            checkSearchResult(){
                if(this.searchResult.products){
                    return true;
                }else if(this.searchResult.categories){
                    return true;
                }else if(this.searchResult.brands){
                    return true;
                }else{
                    return false;
                }
            }
        }
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
        z-index: 100;
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
