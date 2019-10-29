<template>

    <div class="product-item-info">
        <div class="product-item-photo">
            <a href="#" @click.prevent="productDetails(product.product_slug)" :title="product.product_name" class="product-item-img">
                <img :title="product.product_name" :src="product.thumb_image.image_path" style="width:100%; height:auto;">
            </a>
            <div class="product-item-actions">
                <a href="" class="btn btn-wishlist" @click.prevent="addWishList(product.product_slug)"><span>wishlist</span></a>
                <a href="" class="btn btn-quickview" @click.prevent="quickView"><span>Quick view</span></a>
            </div>
            <button class="btn btn-cart" type="button" @click.prevent="addToCart()"><span>Add to Cart</span></button>
<!--                    <span class="product-item-label label-price">30% <span>off</span></span>-->
        </div>
        <div class="product-item-detail">
            <strong class="product-item-name">
                <a :title="product.product_name" @click.prevent="productDetails(product.product_slug)" href="#">{{ product.product_name }}</a>
            </strong>
            <div class="clearfix">
                <div class="product-item-price">
                    <span class="price" v-if="product.product_type === 1 && product.single_variation === null">$ {{ product.product_price }}</span>
                    <span class="price" v-else>$ {{ product.single_variation.price }}</span>
                </div>
                <div class="product-reviews-summary">
                    <div class="rating-summary">
                        <div class="rating-result" title="80%">
                            <span style="width:80%">
                                <span><span>80</span>% of <span>100</span></span>
                            </span>
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
                productData:{},
                cartData:{
                    id:'',
                    name:'',
                    qty:1,
                    price:0,
                    colorId:'',
                    sizeId:'',
                },
            }
        },
        created(){

        },
        mounted(){
            if(this.product.product_type === 1){
                this.cartData.price = parseFloat(this.product.product_price);
            }else{
                this.cartData.price = parseFloat(this.product.single_variation.price);
                this.cartData.colorId = parseInt(this.product.single_variation.pri_id);
                this.cartData.sizeId = parseInt(this.product.single_variation.sec_id);
            }
        },
        methods:{
            ...mapActions([
                'productQuickView',
                'insertToWishList',
                'deleteFromWishList',
                'addToCartProduct',
            ]),
            productDetails(slug){
                location.href = '/product/'+slug;
            },
            addWishList(slug){
                console.log(slug);
                if(AppStorage.getWhoIs() === 'buyer'){
                    this.insertToWishList(slug)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                this.$noty.success(response.message)
                            }else{
                                this.$noty.error('Try Again Later.');
                                console.log(response);
                            }
                        })
                }else{
                    location.href = '/login';
                }
            },
            removeWishList(slug){
                if(AppStorage.getWhoIs() === 'buyer'){
                    this.deleteFromWishList(slug)
                        .then(response=>{
                            if(typeof response.code !== "undefined" && response.code === 200){
                                this.$noty.success(response.message)
                            }else{
                                this.$noty.error(response.message);
                                console.log(response);
                            }
                        })
                }else{
                    location.href = '/login';
                }
            },
            addCompareProduct(slug){

            },
            quickView(){
                this.productQuickView(this.product);
            },
            addToCart(){
                this.cartData.id = this.product.product_id;
                this.cartData.name = this.product.product_name;
                this.addToCartProduct(this.cartData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'cartList'
            ])
        }
    }
</script>

<style scoped>

</style>
