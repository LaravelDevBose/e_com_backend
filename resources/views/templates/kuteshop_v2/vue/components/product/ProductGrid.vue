<template>

    <div class="product-item-info" v-if="product">
        <div class="product-item-photo">
            <a href="#" @click.prevent="productDetails(product.product_slug)" :title="product.product_name" class="product-item-img">
                <clazy-load :src="product.thumb_image.image_path">
                    <img :title="product.product_name" :src="product.thumb_image.image_path" style="width:100%; height:auto;">
                    <div class="preloader" slot="placeholder">
                        <img :title="product.product_name" src="/images/placeholder.png" style="width:100%; height:auto;">
                    </div>
                </clazy-load>
            </a>
            <div class="product-item-actions">
                <a href="#" title="WishList" class="btn btn-wishlist" @click.prevent="addWishList(product.product_slug)"><span>{{ $t('header.wishlist')}}</span></a>
                <a href="#" title="Quick View" class="btn btn-quickview" @click.prevent="quickView"><span>{{ $t('product.quick_view')}}</span></a>
                <a href="#" title="Buy Now" class="btn" @click.prevent="buyNow()" style="font-size:18px;"><i class="fa fa-cart-plus"></i></a>
            </div>
            <button class="btn btn-cart" type="button" @click.prevent="addToCart()"><span>{{ $t('product.add_to_cart')}}</span></button>
            <span v-if="product.seller_id === 1" class="product-item-label label-sale-off">{{ mallname }}</span>
        </div>
        <div class="product-item-detail">
            <strong class="product-item-name">
                <a :title="product.product_name" @click.prevent="productDetails(product.product_slug)" href="#">{{ product.product_name }}</a>
            </strong>
            <div class="clearfix">
                <div v-if="this.product.product_type === 1" class="product-item-price">
                    <span v-if="typeof this.product.discount_price !== 'undefined' && this.product.discount_price > 0">
                        <span class="price" >$ {{ (parseFloat(this.product.product_price).toFixed(2) -  parseFloat(this.product.discount_price)).toFixed(2) }}</span>
                        <span class="old-price">$ {{ parseFloat(this.product.product_price).toFixed(2) }}</span>
                    </span>
                    <span class="price" v-else>$ {{ parseFloat(this.product.product_price).toFixed(2) }}</span>
                </div>
                <div v-else class="product-item-price">
                    <span v-if="typeof this.product.discount_price !== 'undefined' && this.product.discount_price > 0">
                        <span class="price" >$ {{ (parseFloat(this.product.single_variation.price).toFixed(2) -  parseFloat(this.product.discount_price)).toFixed(2) }}</span>
                        <span class="old-price">$ {{ parseFloat(this.product.single_variation.price).toFixed(2) }}</span>
                    </span>
                    <span class="price" v-else>$ {{ parseFloat(this.product.single_variation.price).toFixed(2) }}</span>
                </div>
                <div class="product-reviews-summary ">
                    <div class="rating-summary grid-rating">
                        <star-rating
                            :star-size="13"
                            :rating="rating"
                            :read-only="true"
                        ></star-rating>
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
                default:{},
            },
            mallname:{
                type: String,
                default: 'Saliim Mall'
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
                rating:0,
                oldPrice:0,
            }
        },
        created(){

        },
        mounted(){
            if(this.product.reviews.length >0 && this.product.reviews !== ''){
                let sum = this.product.reviews.reduce((acc, item) => acc + parseInt(item.rating), 0);
                this.rating = sum / this.product.reviews.length;
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
            quickView(){
                this.productQuickView(this.product);
                $('#quickView').modal('show');
            },
            addToCart(){
                this.cartData.id = this.product.product_id;
                this.cartData.name = this.product.product_name;
                if(this.product.product_type === 1){
                    this.cartData.price = parseFloat(this.product.product_price).toFixed(2);
                }else{
                    this.cartData.price = parseFloat(this.product.single_variation.price).toFixed(2);
                    this.cartData.colorId = parseInt(this.product.single_variation.pri_id);
                    this.cartData.sizeId = parseInt(this.product.single_variation.sec_id);
                }
                if(typeof this.product.discount_price !== "undefined" && this.product.discount_price > 0){
                    this.oldPrice = this.cartData.price;
                    this.cartData.price = (this.oldPrice -  parseFloat(this.product.discount_price)).toFixed(2);
                }
                this.addToCartProduct(this.cartData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            },
            buyNow(){
                this.cartData.id = this.product.product_id;
                this.cartData.name = this.product.product_name;
                if(this.product.product_type === 1){
                    this.cartData.price = parseFloat(this.product.product_price).toFixed(2);
                }else{
                    this.cartData.price = parseFloat(this.product.single_variation.price).toFixed(2);
                    this.cartData.colorId = parseInt(this.product.single_variation.pri_id);
                    this.cartData.sizeId = parseInt(this.product.single_variation.sec_id);
                }
                if(typeof this.product.discount_price !== "undefined" && this.product.discount_price > 0){
                    this.oldPrice = this.cartData.price;
                    this.cartData.price = (this.oldPrice -  parseFloat(this.product.discount_price)).toFixed(2);
                }
                this.addToCartProduct(this.cartData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            /*this.$noty.success(response.message);*/
                            location.href='/cart';
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            },

        },
        computed:{
            ...mapGetters([
                'cartList'
            ]),
        }
    }
</script>

<style scoped>

</style>
