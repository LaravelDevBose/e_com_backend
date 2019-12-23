<template>
    <div>
        <div class="product-info-price">
            <div class="price-box">
                <span class="price">$ {{ cartData.price }}</span>
                <span class="old-price" v-if="oldPrice !== 0 && oldPrice !== '' ">$ {{ oldPrice}}</span>
            </div>
        </div>
        <!--<div class="product-code">
            SKU: #{{ product.product_sku }}
        </div>-->
        <div class="product-info-stock">
            <div class="stock available">
                <span class="label">{{ $t('product.availability')}}: </span>In stock
            </div>
        </div>
        <div class="product-overview">
            <div class="overview-content" v-html="product.highlight"> </div>
        </div>
        <div class="product-add-form">
            <p>{{ $t('product.avail_options')}}:</p>
            <form>

                <div class="product-options-wrapper">

                    <div v-if="product.product_type === 2" class="swatch-opt">
                        <div v-if="colors" class="swatch-attribute color" >
                            <span class="swatch-attribute-label">{{ $tc('products.color',colors.length)}}:</span>
                            <div class="swatch-attribute-options clearfix">
                                <label v-for="(color, index) in colors" :key="index" :for="'color-'+color.color_id" :class="(cartData.colorId == color.color_id) ? 'selected':'' " class="swatch-option color"  :style="{'background-color':color.color_code}">
                                    <input type="radio" :checked="cartData.colorId === color.color_id" style="display: none" name="color" :id="'color-'+color.color_id" v-model="cartData.colorId" :value="color.color_id">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div v-if="product.product_type === 2" class="form-configurable">
                        <label for="forSize" class="label">{{ $tc('products.size',sizes.length)}}: </label>
                        <div v-if="sizes" class="control">
                            <select v-model="cartData.sizeId"  id="forSize" class="form-control attribute-select">
                                <option v-for="(size, index) in sizes" :key="index" :value="size.size_id" :selected="cartData.sizeId == size.size_id">{{ size.size_name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-qty">
                        <label class="label">{{ $t('product.qty')}}: </label>
                        <div class="control">
                            <input type="text" class="form-control input-qty" v-model="cartData.qty" id="qty1" name="qty1"  maxlength="12"  minlength="1">
                            <button class="btn-number qtyminus" @click.prevent="reducedQty" data-type="minus" data-field="qty1"><span>-</span></button>
                            <button class="btn-number qtyplus" data-type="plus" @click.prevent="increaseQty" data-field="qty1"><span>+</span></button>
                        </div>
                    </div>
                </div>

                <div class="product-options-bottom clearfix">
                    <div class="actions">
                        <button type="submit" @click.prevent="addToCart()" title="Add to Cart" class="action btn-cart">
                            <span>{{ $t('product.add_to_cart')}}</span>
                        </button>
                        <button type="submit" @click.prevent="buyNow()" title="Buy Now" class="action btn-buy">
                            <i class="fa fa-cart-plus"></i>
                            <span>{{ $t('product.buy_now')}}</span>
                        </button>
                        <div class="product-addto-links">

                            <a href="#" @click.prevent="addWishList(product.product_slug)" class="action btn-wishlist" title="Wish List">
                                <span>{{ $t('header.wishlist')}}</span>
                            </a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "SingelProductOptions",
        props:['product'],
        data(){
            return{

                cartData:{
                    id:'',
                    name:'',
                    qty:1,
                    price:0,
                    colorId:'',
                    sizeId:'',
                },
                oldPrice:0,
            }
        },
        created(){
            if(this.product.product_type === 1){
                this.cartData.price = parseFloat(this.product.product_price);
            }else{
                this.cartData.price = parseFloat(this.product.single_variation.price);
                this.cartData.colorId = parseInt(this.product.single_variation.pri_id);
                this.cartData.sizeId = parseInt(this.product.single_variation.sec_id);
            }

            if(typeof this.product.discount_price !== "undefined" && this.product.discount_price > 0){
                this.oldPrice = this.cartData.price;
                this.cartData.price = this.oldPrice -  parseFloat(this.product.discount_price);
            }

        },
        mounted(){
            if(this.product.product_type === 2) {
                this.getProductVariationInfo(this.product.product_id);
            }
        },
        methods:{
            ...mapActions([
                'addToCartProduct',
                'insertToWishList',
                'deleteFromWishList',
                'getProductVariationInfo'
            ]),
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
            increaseQty(){
                this.cartData.qty ++;
            },

            reducedQty(){
                this.cartData.qty --;
                if(this.cartData.qty < 1){
                    this.$noty.warning('Min 1 Qty Required');
                    this.cartData.qty =1 ;
                }
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
            setProductPrice(){
                let variations = this.product.variations;
                variations.filter(variation=>{
                    if(parseInt(variation.pri_id) === this.cartData.colorId && parseInt(variation.sec_id) === this.cartData.sizeId){
                        console.log(variation);
                        this.cartData.price = parseFloat(variation.price);
                    }
                })
            }
        },
        computed:{
            ...mapGetters([
                'colors',
                'sizes',
            ]),
        },
        watch:{
            'cartData.colorId':{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.setProductPrice();
                    }
                }
            },
            'cartData.sizeId':{
                handler(newValue, oldValue){
                    if(newValue !== oldValue){
                        this.setProductPrice();
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>
