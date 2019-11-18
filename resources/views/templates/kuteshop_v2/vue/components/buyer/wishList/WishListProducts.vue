<template>
    <div class="table-responsive wow bounceInUp animated">
        <table class="table table-bordered  cart_summary">
            <thead>
                <tr>
                    <th>{{ $t('buyer.wish_list.image')}}</th>
                    <th>{{ $t('buyer.wish_list.product_info')}}</th>
                    <th>{{ $t('buyer.wish_list.qty')}}</th>
                    <th class="text-right">{{ $t('buyer.wish_list.price')}}</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody v-if="wishLists">
                <tr  v-for="(wishList,index) in wishLists" :key="index">
                    <td >
                        <a :title="wishList.productName" :href="wishList.links.product_link" class="product-image">
                            <img width="80" :alt="wishList.productName" :src="wishList.thumbImage.image_path">
                        </a>
                    </td>
                    <td>
                        <span class="product-name"><a :title="wishList.productName" :href="wishList.links.product_link" >{{wishList.productName}}</a></span>
                        <div class="description std">
                            <div class="inner">
                                <span v-if="wishList.brand">Brand: {{ wishList.brand.brand_name }} </span>
                                <span v-if="wishList.seller"><i class="icon-store text-primary"></i> {{ wishList.seller.shop_name}} </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-cell">
                            <div class="add-to-cart-alt">
                                <input type="number" value="1" :id="'qty-'+wishList.id" name="qty[31]" class="input-text qty validate-not-negative-number" pattern="\d*">
                            </div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="cart-cell">
                            <div class="price-box">
                                <span class="regular-price">
                                    <span v-if="wishList.product_type === 1">
                                         <span class="price"> {{ wishList.price }} </span>
                                         <input type="hidden" :id="'price-'+wishList.id" :value="wishList.price">
                                    </span>
                                    <span v-else>
                                        <span class="price" >{{ wishList.singleVariation.price }}</span>
                                        <input type="hidden" :id="'price-'+wishList.id" :value="wishList.singleVariation.price">
                                    </span>

                                </span>

                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <a href="#" @click.prevent="wishListToCart(wishList.id)" title="Add to Cart" type="button">
                            <i class="icon-cart-add"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a class="remove-item" title="Remove WishList" @click.prevent="removeWishList(wishList.product_slug)" href="#">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        name: "WishListProducts",
        data(){
            return{
                cartData:{
                    id:'',
                    name:'',
                    qty:1,
                    price:0,
                    colorId:'',
                    sizeId:'',

                }
            }
        },
        created(){
            this.getWishListDetails();
        },
        mounted(){

        },
        methods:{
            ...mapActions([
                'getWishListDetails',
                'deleteFromWishList',
                'addToCartProduct',
            ]),
            removeWishList(slug){
                if(AppStorage.getWhoIs() === 'buyer'){
                    this.deleteFromWishList(slug)
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
            wishListToCart(productId){
                let qty = $('#qty-'+productId).val();
                let price = $('#price-'+productId).val();

                this.cartData.id = productId;
                this.cartData.qty = qty;
                this.cartData.price = price;

                this.addToCartProduct(this.cartData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                            this.emptyCartDataVar();
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message)
                        }else{
                            this.$noty.error(response.message);
                        }
                    });
            },
            emptyCartDataVar(){
                this.cartData.id = '';
                this.cartData.qty = '';
                this.cartData.price = '';
            }
        },
        computed:{
            ...mapGetters([
                'wishLists',
            ])
        }
    }
</script>

<style scoped>
    .product-name{
        font-weight:bold;
    }
</style>
