<template>
    <div class="product-item-info">
        <timer
            :starttime="start_at"
            :endtime="expire_at"
            trans='{
             "day":"Day",
             "hours":"Hours",
             "minutes":"Minuts",
             "seconds":"Seconds",
             "expired":"Event has been expired.",
             "running":"Till the end of event.",
             "upcoming":"Till start of event.",
             "status": {
                "expired":"Expired",
                "running":"Running",
                "upcoming":"Future"
               }}'
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
        </div>
        <div class="product-item-detail">
            <strong class="product-item-name">
                <router-link :to="{name:'Product', params:{ slug:product.slug }}">
                    {{ product.name }}
                </router-link>
            </strong>
            <div class="product-item-price">
                <span class="price">{{ cartData.price }}</span>
                <span class="old-price" v-if="cartData.oldPrice > 0" >{{ cartData.oldPrice }}</span>
            </div>
            <div class="product-item-actions">
                <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
                <a class="btn btn-wishlist" href=""><span>wishlist</span></a>
                <a class="btn btn-quickview" href=""><span>compare</span></a>
            </div>
        </div>
    </div>
</template>

<script>
import Timer from "../helper/Timer";
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
            rating:0,
        }
    },
    mounted() {
        this.cartData.oldPrice = parseInt(this.product.variation.price).toFixed(2);
        let discount = (this.cartData.oldPrice * this.percent)/100;
        this.cartData.price = this.cartData.oldPrice - discount.toFixed(0);
        this.cartData.price = parseFloat(this.cartData.price).toFixed(2);
    }
}
</script>

<style scoped>

</style>
