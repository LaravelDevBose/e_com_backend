<template>
    <div class="product-item-info">
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
                <a class="btn btn-compare" href=""><span>compare</span></a>
                <a class="btn btn-quickview" href=""><span>quickview</span></a>
            </div>
            <button type="button" class="btn btn-cart"><span>Add to Cart</span></button>
        </div>
        <div class="product-item-detail">
            <strong class="product-item-name">
                <router-link :to="{name:'Product', params:{ slug:product.slug }}">
                    {{ product.name }}
                </router-link>
            </strong>
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
export default {
    name: "ProductItem",
    props: {
        product: Object,
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
        this.cartData.price = parseInt(this.product.variation.price).toFixed(2);
        if (this.product.discount){
            this.cartData.oldPrice = this.cartData.price;
            let discount = (this.cartData.oldPrice * this.product.discount.percent)/100;
            this.cartData.price = this.cartData.oldPrice - discount.toFixed(0);
            this.cartData.price = parseFloat(this.cartData.price).toFixed(2);
        }
    }
}
</script>

<style scoped>

</style>
