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
                                    <a :href="'/product/'+product.product_slug">
                                        <img class="feat-thumb " v-if="product.thumbImage.image_path" :alt="product.productName" :src="product.thumbImage.image_path">
                                        <img class="feat-thumb img-thumbnail" v-else :alt="product.productName" src="/crocus_v2/images/blog-img.jpg">
                                    </a>
                                </figure>
                                <!--featured-thumb-->
                                <h4 class="product-name">
                                    <a :title="product.productName" :href="'/product/'+product.product_slug">{{ product.productName}}</a>
                                </h4>
                            </div>
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
                if(this.searchResult.hasOwnProperty('products') && Object.entries(this.searchResult.products).length !== 0 ){
                    return true;
                }else if(this.searchResult.hasOwnProperty('categories') && Object.entries(this.searchResult.categories).length !== 0){
                    return true;
                }else if(this.searchResult.hasOwnProperty('brands') && Object.entries(this.searchResult.brands).length !== 0){
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
