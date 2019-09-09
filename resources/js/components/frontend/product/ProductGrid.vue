<template>
    <div class="item">
        <div class="item-inner">
            <div class="item-img">
                <div class="item-img-info">
                    <a class="product-image" @click.prevent="productDetails(product.product_slug)" :title="product.product_name" href="#">
                        <img alt="HI114 Dry Iron" :src="product.thumb_image.image_path">
                    </a>
                    <div class="box-hover">
                        <ul class="add-to-links">
                            <li><a class="link-quickview" href="#" @click.prevent="quickView">Quick View</a>
                            </li>
                            <li><a class="link-wishlist" href="#" @click.prevent="addWishList(product.product_slug)">Wishlist</a>
                            </li>
                            <li><a class="link-compare" href="#" @click.prevent="addCompareProduct(product.product_slug)">Compare</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="item-info">
                <div class="info-inner">
                    <div class="item-title">
                        <a :title="product.product_name" @click.prevent="productDetails(product.product_slug)" href="#">{{ product.product_name }}</a>
                    </div>
                    <div class="item-content">
                        <div class="rating">
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:80%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                            </div>
                        </div>
                        <div class="item-price">
                            <div class="price-box">
                                <p class="special-price" >
                                    <span class="price-label">Price</span>
                                    <span class="price">$ {{ product.single_variation.price }} </span>
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "ProductGrid",
        props:{
            product:{
                type:Object,
            }
        },
        data(){
            return{
                productData:{}
            }
        },
        created(){

        },
        methods:{
            ...mapActions([
                'productQuickView'
            ]),
            productDetails(slug){
                location.href = '/product/'+slug;
            },
            addWishList(slug){

            },
            addCompareProduct(slug){

            },
            quickView(){
                this.productQuickView(this.product);
            },

        }
    }
</script>

<style scoped>

</style>
