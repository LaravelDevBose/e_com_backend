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
                            <li><a class="link-quickview" href="#" @click.prevent="quickView">Quick View</a> </li>
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
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:80%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                            </div>
                        </div>
                        <div class="item-price">
                            <div class="price-box">
                                <p class="special-price" >
                                    <span class="price-label">Price</span>
                                    <span class="price">$ {{ product.single_variation.price }} </span>
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
                },
            }
        },
        created(){

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
                this.cartInfo.id = this.product.product_id;
                this.cartInfo.name = this.product.product_name;
                this.cartInfo.price = this.product.single_variation.price;

                this.addToCartProduct(this.cartInfo)
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
