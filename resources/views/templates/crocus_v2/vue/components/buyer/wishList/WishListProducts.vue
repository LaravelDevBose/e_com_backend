<template>
    <table id="wishlist-table" class="clean-table linearize-table data-table">
        <thead>
            <tr class="first last">
                <th class="customer-wishlist-item-image">{{ $t('buyer.wish_list.image')}}</th>
                <th class="customer-wishlist-item-info">{{ $t('buyer.wish_list.product_info')}}</th>
                <th class="customer-wishlist-item-quantity">{{ $t('buyer.wish_list.qty')}}</th>
                <th class="customer-wishlist-item-price">{{ $t('buyer.wish_list.price')}}</th>
                <th class="customer-wishlist-item-cart"></th>
                <th class="customer-wishlist-item-remove"></th>
            </tr>
        </thead>
        <tbody v-if="wishLists">
            <tr  v-for="(wishList,index) in wishLists" :class="{'first':index === 0, 'last':(index+1) === wishLists.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }"  >
                <td class="wishlist-cell0 customer-wishlist-item-image">
                    <a :title="wishList.productName" :href="wishList.links.product_link" class="product-image">
                        <img width="80" :alt="wishList.productName" :src="wishList.thumbImage.image_path">
                    </a>
                </td>
                <td class="wishlist-cell1 customer-wishlist-item-info">
                    <h3 class="product-name"><a :title="wishList.productName" :href="wishList.links.product_link" >{{wishList.productName}}</a></h3>
                    <div class="description std">
                        <div class="inner">
                            <span v-if="wishList.brand">Brand: {{ wishList.brand.brand_name }} </span>
                            <span v-if="wishList.seller.shop"><i class="icon-store text-primary"></i> {{ wishList.seller.shop.shop_name}} </span>
                        </div>
                    </div>
                </td>
                <td data-rwd-label="Quantity" class="wishlist-cell2 customer-wishlist-item-quantity">
                    <div class="cart-cell">
                        <div class="add-to-cart-alt">
                            <input type="number" value="1" :id="'qty-'+wishList.id" name="qty[31]" class="input-text qty validate-not-negative-number" pattern="\d*">
                        </div>
                    </div>
                </td>
                <td data-rwd-label="Price" class="wishlist-cell3 customer-wishlist-item-price">
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
                <td class="wishlist-cell4 customer-wishlist-item-cart">
                    <div class="cart-cell">
                        <button class="button btn-cart" @click.prevent="wishListToCart(wishList.id)" title="Add to Cart" type="button">
                            <span><span>{{ $t('buyer.wish_list.add_all_cart')}}</span></span>
                        </button>
                    </div>
                </td>
                <td class="wishlist-cell5 customer-wishlist-item-remove last">
                    <a class="remove-item" title="Remove WishList" @click.prevent="removeWishList(wishList.product_slug)" href="#"><span><span></span></span></a>
                </td>
            </tr>
        </tbody>
    </table>
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

                console.log(this.cartData);

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

</style>
