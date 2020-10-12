<template>
    <span>
        <!--   List View Product-->
        <div class="product-item-info" v-if="viewAs === 2 && page">
            <div class="product-item-photo">
                <router-link :to="{ name: 'Product', params:{ slug: product.slug } }" class="product-item-img" >
                    <clazy-load :src="product.image.image_path">
                        <img :title="product.name" :src="product.image.image_path" style="width:100%; height:auto;">

                        <div class="preloader" slot="placeholder">
                            <img :title="product.name" :src="$baseUrl+'/images/loader.gif'" style="width:100%; height:auto;">
                        </div>
                    </clazy-load>
                </router-link>
                <span class="product-item-label label-sale" v-if="product.discount">{{ product.discount.percent }}%</span>
            </div>
            <div class="product-item-detail">
                <strong class="product-item-name">
                    <router-link :to="{name:'Product', params:{ slug:product.slug }}">
                        {{ product.name }}
                    </router-link>
                </strong>
                <div class="clearfix product-info-des">
                    <div class="product-reviews-summary">
                        <div class="rating-summary">
                            <div class="rating-result" :title="product.rating">
                                 <span :style="{width: product.rating * 100 +'%'}">
                                    <span><span>{{ product.rating }}</span>% of <span>100</span></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="product-item-price">
                        <span class="price">{{ cartData.price }}</span>
                        <span class="old-price" v-if="cartData.oldPrice > 0" >{{ cartData.oldPrice }}</span>
                    </div>

                    <div class="product-item-code">
                        <span class="title">Item Code:</span> {{ product.sku }}
                    </div>
                    <div class="product-item-stock">
                        <span class="title">Availability:</span> In stock
                    </div>
                    <div class="product-item-actions">
                        <button
                            class="btn btn-cart"
                            type="button"
                            @click.prevent="addToCart()"
                        ><span>Add to Cart</span></button>
                        <a href="" class="btn btn-wishlist"><span>wishlist</span></a>
                    </div>
                </div>
                <div class="product-item-des" v-html="product.highlight"> </div>
            </div>
        </div>
        <!--  End List View Product-->

        <!--   Grid View Product-->
        <div class="product-item-info" v-else>
            <div class="product-item-photo">
                <router-link :to="{ name: 'Product', params:{ slug: product.slug } }" class="product-item-img" >
                    <clazy-load :src="product.image.image_path">
                        <img :title="product.name" :src="product.image.image_path" style="width:100%; height:auto;">
                        <span class="product-item-label label-sale" v-if="product.discount">{{ product.discount.percent }}%</span>
                        <div class="preloader" slot="placeholder">
                            <img :title="product.name" :src="$baseUrl+'/images/loader.gif'" style="width:100%; height:auto;">
                        </div>
                    </clazy-load>
                </router-link>
                <div class="product-item-actions">
                    <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                </div>
                <button
                    type="button"
                    class="btn btn-cart"
                    @click.prevent="addToCart()"
                ><span>Add to Cart</span></button>
            </div>
            <div class="product-item-detail">
                <strong class="product-item-name">
                    <router-link :to="{name:'Product', params:{ slug:product.slug }}">
                        {{ product.name }}
                    </router-link>
                </strong>
                <div class="product-reviews-summary" style="display: block; width: 100%; margin-bottom: 5px;">
                <div class="rating-summary">
                    <div class="rating-result" :title="product.rating">
                         <span :style="{width: product.rating * 100 +'%'}">
                            <span><span>{{ product.rating }}</span>% of <span>100</span></span>
                        </span>
                    </div>
                </div>
            </div>
                <div class="clearfix">
                    <div class="product-item-price">
                        <span class="price">{{ cartData.price }}</span>
                        <span class="old-price" v-if="cartData.oldPrice > 0" >{{ cartData.oldPrice }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!--  End Grid View Product-->
    </span>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name: "ProductItem",
    props: {
        product: Object,
        page:{
            type: Boolean,
            default: false
        }
    },
    data(){
        return{
            cartData:{
                id:'',
                name:'',
                qty:1,
                price:0,
                colorId:'',
                sizeId:'',
                oldPrice:0,
                discount: 0,
            },
            view: 1,
        }
    },
    mounted() {
        this.cartData.price = parseInt(this.product.variation.price).toFixed(2);
        if (this.product.discount){
            this.cartData.oldPrice = this.cartData.price;
            this.cartData.discount = (this.cartData.oldPrice * this.product.discount.percent)/100;
            this.cartData.price = this.cartData.oldPrice - this.cartData.discount.toFixed(0);
            this.cartData.price = parseFloat(this.cartData.price).toFixed(2);
        }
    },
    methods:{
        ...mapActions([
            'addToCartProduct'
        ]),
        addToCart(){
            this.cartData.id = this.product.id;
            this.cartData.name = this.product.name;
            if(this.product.product_type === 2){
                this.cartData.colorId =this.product.variation.color_id;
                this.cartData.sizeId = this.product.variation.size_id;
            }
            this.addToCartProduct(this.cartData);
        },
    },
    computed:{
        ...mapGetters(['viewAs']),
        checkViewAs(){
            return JSON.parse(JSON.stringify(this.viewAs))
        }
    },
    watch:{
        checkViewAs: {
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    this.view = this.viewAs;
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
