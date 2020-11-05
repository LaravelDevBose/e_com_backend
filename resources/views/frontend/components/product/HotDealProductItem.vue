<template>
    <div class="product-item-info">
        <timer
            :starttime="start_at"
            :endtime="expire_at"
        ></timer>
        <div class="product-item-photo">
            <router-link :to="{ name: 'Product', params:{ slug: product.slug } }" class="product-item-img" >
                <clazy-load :src="product.image.image_path">
                    <img :title="product.name" :src="product.image.image_path" style="width:100%; height:auto;">
                    <span class="product-item-label label-sale">{{ percent }}%</span>
                    <div class="preloader" slot="placeholder">
                        <img :title="product.name" :src="$baseUrl+'/images/loader.gif'" style="width:100%; height:auto;">
                    </div>
                </clazy-load>
            </router-link>
            <div class="product-item-actions">
                <a class="btn btn-wishlist" href="#" v-if="wishlisted" @click.prevent="wishlistRemove()"><span>wishlist</span></a>
                <a class="btn btn-wishlist" href="#" v-else @click.prevent="wishlistAdd()"><span>wishlist</span></a>
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
                         <span :style="{width: (product.rating * 100)/5 +'%'}">
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
</template>

<script>
import Timer from "../helper/Timer";
import {mapActions, mapGetters} from "vuex";
export default {
    name: "HotDealProductItem",
    components: {Timer},
    props:{
        product: Object,
        start_at: String,
        expire_at: String,
        percent: Number,
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
            wishlisted: false,
        }
    },
    mounted() {
        this.cartData.oldPrice = parseInt(this.product.variation.price).toFixed(2);
        this.cartData.discount = (this.cartData.oldPrice * this.percent)/100;
        this.cartData.price = this.cartData.oldPrice - this.cartData.discount.toFixed(0);
        this.cartData.price = parseFloat(this.cartData.price).toFixed(2);

    },
    methods:{
        ...mapActions([
            'addToWishlist',
            'removeFromWishlist',
            'addToCartProduct',
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
        wishlistAdd(){
            this.addToWishlist(this.product.slug);
        },
        wishlistRemove(){
            this.removeFromWishlist(this.product.slug);
        }
    },
    computed:{
        ...mapGetters([
            'wishlistProducts',
        ]),
        checkWishlistProducts(){
            return JSON.parse(JSON.stringify(this.wishlistProducts))
        }
    },
    watch:{
        checkWishlistProducts: {
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    this.wishlisted = !!this.wishlistProducts.includes(this.product.id);
                }
            }, deep: true,
        }
    }
}
</script>

<style scoped>

</style>
