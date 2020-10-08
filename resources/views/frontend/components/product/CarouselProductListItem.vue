<template>
    <div class="product-item-info">
        <div class="product-item-photo">
            <router-link :to="{ name: 'Product', params:{ slug: product.slug } }" class="product-item-img" >
                <clazy-load :src="product.image.image_path">
                    <img :title="product.name" :src="product.image.image_path">
                    <span class="label-sale product-item-label-list" v-if=" product.discount">{{ product.discount.percent }}%</span>
                    <div class="preloader" slot="placeholder">
                        <img :title="product.name" :src="$baseUrl+'/images/loader.gif'">
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
                <span class="price">{{ price }}</span>
                <span class="old-price" v-if="oldPrice > 0" >{{ oldPrice }}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CarouselProductListItem",
    props:{
        product: Object,
    },
    data(){
        return{
            oldPrice:0,
            price: 0,
            rating:0,
        }
    },
    mounted() {
        this.price = parseInt(this.product.variation.price).toFixed(2);
        if (this.product.discount){
            this.oldPrice = this.price;
            let discount = (this.oldPrice * this.product.discount.percent)/100;
            this.price = this.oldPrice - discount.toFixed(0);
            this.price = parseFloat(this.price).toFixed(2);
        }
    },
}
</script>

<style scoped>

</style>
