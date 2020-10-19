<template>
    <div class="table-responsive wow bounceInUp animated">
        <table class="table table-bordered  cart_summary">
            <thead>
            <tr>
                <th>Image</th>
                <th>Product Info</th>
                <th>Brand</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-if="wishListItems && wishListItems.length > 0"
                v-for="product in wishListItems"
                :key="product.sku"
            >
                <td class="cart_product">
                    <router-link :to="{ name: 'Product', params:{ slug: product.slug } }" >
                        <clazy-load :src="product.image.image_path">
                            <img :title="product.name" :src="product.image.image_path" style="width:100%; height:auto;">
                            <span class="product-item-label label-sale" v-if="product.discount">{{ product.discount.percent }}%</span>
                            <div class="preloader" slot="placeholder">
                                <img :title="product.name" :src="$baseUrl+'/images/loader.gif'" style="width:100%; height:auto;">
                            </div>
                        </clazy-load>
                    </router-link>
                </td>
                <td class="cart_description">
                    <p class="product-name">
                        <router-link :to="{ name: 'Product', params:{ slug: product.slug } }" >
                            {{ product.name }}
                        </router-link>
                    </p>
                    <small class="cart_ref">SKU: {{ product.sku }}</small><br>
                    <span v-if="product.discount" id="countdown">
                        <timer
                            :endtime="product.discount.expire_at"
                            :starttime="product.discount.start_at"
                            el-style="text-align: left; margin: 3px 0;"
                        ></timer>
                    </span>
                </td>
                <td class="text-center">{{ (product.brand)? product.brand.name: '' }}</td>
                <td class="action">
                    <a href="#" @click="removeWishlistItem(product.slug)">Delete item</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import Timer from "../helper/Timer";
export default {
    name: "WishlistTableComponent",
    components: {Timer},
    created() {
        this.getWishlistItems();
    },
    methods:{
        ...mapActions([
            'getWishlistItems',
            'removeFromWishlist'
        ]),
        removeWishlistItem(slug){
            this.removeFromWishlist(slug);
        }
    },
    computed:{
        ...mapGetters(['wishListItems'])
    }
}
</script>

<style scoped>
.cart_summary td.cart_product{
    position: relative;
}
.product-item-label{
    position: absolute;
    bottom: 18px;
    right: 17px;
    line-height: 35px;
    width: 35px;
    padding: 0 8px;
    display: block;
    text-align: center;
    background-color: #e52e04;
    color: #fff;
    font-size: 12px;
    border-radius: 100%;
    text-transform: uppercase;
    font-family: Oswald, sans-serif;
    font-weight: 600;
    z-index: 1;
}
.label-sale {
    background-color: #e52e04;
    top: 5px;
    right: 10px;
    bottom: auto;
    left: auto;
}
#countdown div{
    text-align: left;
}
</style>
