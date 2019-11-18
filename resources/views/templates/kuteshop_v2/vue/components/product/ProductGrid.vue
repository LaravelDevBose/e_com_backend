<template>

    <div class="product-item-info">
        <div class="product-item-photo">
            <a href="#" @click.prevent="productDetails(product.product_slug)" :title="product.product_name" class="product-item-img">
                <img :title="product.product_name" :src="product.thumb_image.image_path" style="width:100%; height:auto;">
            </a>
            <div class="product-item-actions">
                <a href="#" title="WishList" class="btn btn-wishlist" @click.prevent="addWishList(product.product_slug)"><span>{{ $t('header.wishlist')}}</span></a>
                <a href="#" title="Quick View" class="btn btn-quickview" @click.prevent="quickView"><span>{{ $t('product.quick_view')}}</span></a>
                <a href="#" title="Buy Now" class="btn" @click.prevent="buyNow()" style="font-size:18px;"><i class="fa fa-cart-plus"></i></a>
            </div>
            <button class="btn btn-cart" type="button" @click.prevent="addToCart()"><span>{{ $t('product.add_to_cart')}}</span></button>
<!--                    <span class="product-item-label label-price">30% <span>off</span></span>-->
        </div>
        <div class="product-item-detail">
            <strong class="product-item-name">
                <a :title="product.product_name" @click.prevent="productDetails(product.product_slug)" href="#">{{ product.product_name }}</a>
            </strong>
            <div class="clearfix">
                <div class="product-item-price">
                    <span class="price" >$ {{ cartData.price }}</span>
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
            quickView(){
                this.productQuickView(this.product);
                $('#quickView').modal('show');
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
            },
            buyNow(){
                this.cartData.id = this.product.product_id;
                this.cartData.name = this.product.product_name;
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
            ])
        }
    }
</script>

<style scoped>

</style>
