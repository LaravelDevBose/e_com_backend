<template>
    <li class="col-sm-4 product-item ">
        <div class="product-item-opt-1">
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
                            <span class="price">$ {{ product.single_variation.price }}</span>
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
        </div>
    </li>
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
