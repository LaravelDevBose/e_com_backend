<template>
    <div class="item" v-if="isExpired">
        <div class="item-inner">
            <div class="item-img">
                <div class="item-img-info">
                    <a class="product-image" @click.prevent="productDetails(product.product_slug)" :title="product.product_name" href="#">
                        <img :title="product.product_name" :src="product.thumb_image.image_path">
                    </a>
                    <div class="box-hover">
                        <ul class="add-to-links">
                            <li><a class="link-quickview" href="#" @click.prevent="quickView">Quick View</a> </li>
                            <li><a class="link-wishlist" href="#" @click.prevent="addWishList(product.product_slug)">Wishlist</a> </li>
                        </ul>
                    </div>
                    <div class="box-timer">
                        <div class="timer-grid">
                            <div class="countdown">
                                <div class="block">
                                    <p class="digit">{{ days | two_digits }}</p>
                                    <p class="text">D</p>
                                </div>
                                <div class="block">
                                    <p class="digit">{{ hours | two_digits }}</p>
                                    <p class="text">H</p>
                                </div>
                                <div class="block">
                                    <p class="digit">{{ minutes | two_digits }}</p>
                                    <p class="text">M</p>
                                </div>
                                <div class="block">
                                    <p class="digit">{{ seconds | two_digits }}</p>
                                    <p class="text">S</p>
                                </div>
                            </div>
                        </div>
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
                                    <span class="price-label">{{ $t('products.price')}}</span>
                                    <span v-if="typeof this.product.discount_price !== 'undefined' && this.product.discount_price > 0">
                                        <span class="price" >$ {{ (parseFloat(this.product.product_price).toFixed(2) -  parseFloat(this.product.discount_price)).toFixed(2) }}</span>
                                        <del class="old-price">$ {{ parseFloat(this.product.product_price).toFixed(2) }}</del>
                                    </span>
                                    <span class="price" v-else>$ {{ parseFloat(this.product.product_price).toFixed(2) }}</span>
                                </p>
                                <p class="special-price" v-else>
                                    <span class="price-label">{{ $t('products.price')}}</span>
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
                                <span>{{ $t('product.add_to_cart')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions} from 'vuex';
    export default {
        name: "HotDealProduct",
        props:{
            hotproduct:{
                type:Object,
            }
        },
        data(){
            return{
                now: Math.trunc((new Date()).getTime() / 1000),
                cartData:{
                    id:'',
                    name:'',
                    qty:1,
                    price:0,
                    colorId:'',
                    sizeId:'',
                },
                product:{},
                rating:0,
                oldPrice: 0,
            }
        },
        created(){
            this.product = this.hotproduct.product
        },
        mounted(){
            if(this.product.reviews.length >0 && this.product.reviews !== ''){
                let sum = this.product.reviews.reduce((acc, item) => acc + parseInt(item.rating), 0);
                this.rating = sum / this.product.reviews.length;
            }
            window.setInterval(() => {
                this.now = Math.trunc((new Date()).getTime() / 1000);
            },1000);
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
                                this.$noty.error('Something Wrong. Try Again.');
                                console.log(response);
                            }
                        })
                        .catch(error => {
                            this.$noty.error('Something Wrong. Try Again.');
                            console.log(error);
                        });
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
                            }else if(response.code === 401){
                                this.$noty.error(response.message);
                                setTimeout(()=>{
                                    location.href = response.url;
                                },1000)

                            }else{
                                this.$noty.error('Something Wrong. Try Again.');
                                console.log(response);
                            }
                        })
                        .catch(error => {
                            this.$noty.error('Something Wrong. Try Again.');
                            console.log(error);
                        });
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
                    .catch(error => {
                        this.$noty.error('Something Wrong. Try Again.');
                        console.log(error);
                    });
            }
        },
        computed: {
            dateInMilliseconds() {
                return Math.trunc(Date.parse(this.hotproduct.expired_at) / 1000)
            },
            seconds() {
                return (this.dateInMilliseconds - this.now) % 60;
            },
            minutes() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60) % 60;
            },
            hours() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60) % 24;
            },
            days() {
                return Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60 / 24);
            },
            isExpired(){
                return (this.dateInMilliseconds - this.now > 0);
            }
        },
    }
</script>

<style scoped>

    .countdown {
        display: inline-block;
        line-height: 20px;
    }

    .countdown .block {
        display: inline-block;
        margin: 0px;
        background: #e25b60;
        height: 30px;
        text-align: center;
        padding: 3px;
    }

    .countdown .text {
        color: #cdd1d4;
        font-size: 11px;
        margin: 0px;
        display: inline-block;
        line-height: 11px;
    }

    .countdown .digit {
        color: #ffffff;
        font-size: 18px;
        font-weight: bold;
        display: inline-block;
        margin: 0;
        line-height: 17px;
    }
</style>
