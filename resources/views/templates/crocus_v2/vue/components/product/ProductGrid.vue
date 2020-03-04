<template>
    <div class="item">
        <div class="item-inner">
            <div class="item-img">
                <div class="item-img-info">
                    <a class="product-image" @click.prevent="productDetails(product.product_slug)" :title="product.product_name" href="#">
                        <img :title="product.product_name" :src="product.thumb_image.image_path">
                    </a>
                    <div class="box-hover">
                        <ul class="add-to-links">
                            <li><a class="link-quickview" href="#"  @click.prevent="quickView">Quick View</a> </li>
                            <li><a class="link-wishlist" href="#" @click.prevent="addWishList(product.product_slug)">Wishlist</a> </li>
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
                            <star-rating
                                :star-size="13"
                                :rating="rating"
                                :read-only="true"
                            ></star-rating>
                        </div>
                        <div class="item-price">
                            <div class="price-box" >
                                <p class="special-price" v-if="this.product.product_type === 1">
                                    <span class="price-label">Price</span>
                                    <span v-if="typeof this.product.discount_price !== 'undefined' && this.product.discount_price > 0">
                                        <span class="price" >$ {{ (parseFloat(this.product.product_price).toFixed(2) -  parseFloat(this.product.discount_price)).toFixed(2) }}</span>
                                        <del class="old-price">$ {{ parseFloat(this.product.product_price).toFixed(2) }}</del>
                                    </span>
                                    <span class="price" v-else>$ {{ parseFloat(this.product.product_price).toFixed(2) }}</span>
                                </p>
                                <p class="special-price" v-else>
                                    <span class="price-label">Price</span>
                                    <span v-if="typeof this.product.discount_price !== 'undefined' && this.product.discount_price > 0">
                                        <span class="price" >$ {{ (parseFloat(this.product.single_variation.price).toFixed(2) -  parseFloat(this.product.discount_price)).toFixed(2) }}</span>
                                        <del class="old-price">$ {{ parseFloat(this.product.single_variation.price).toFixed(2) }}</del>
                                    </span>
                                    <span class="price" v-else>$ {{ parseFloat(this.product.single_variation.price).toFixed(2) }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button @click.prevent="addToCart()" class="button btn-cart" type="button" title="" data-original-title="Add to Cart">
                                <span>Add to Cart</span>
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
                productData:{},
                cartInfo:{
                    id:'',
                    name:'',
                    qty:1,
                    price:0,
                    colorId:'',
                    sizeId:'',
                },
                rating:0,
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
            quickView(){
                this.productQuickView(this.product);
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
            }
        },
        computed:{
            /*...mapGetters([
                'cartList'
            ])*/
        }
    }
</script>

<style scoped>

</style>
