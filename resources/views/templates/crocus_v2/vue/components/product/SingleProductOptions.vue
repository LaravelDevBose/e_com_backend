<template>
    <div>
        <div class="price-block">
            <div class="price-box">
                <p class="special-price">
                    <span class="price">{{ $t('products.price')}}: $ {{ cartData.price }}</span>
                    <br>
                    <del class="old-price" v-if="oldPrice !== 0 && oldPrice !== '' ">Old Price: $ {{ oldPrice}}</del>
                </p>
            </div>
        </div>
        <div class="short-description">
            <h2>{{ $t('products.overview')}}</h2>
            <span v-html="product.highlight"></span>
        </div>
        <div class="add-to-box">
            <div class="add-to-cart">
                <div class="pull-left">
                    <div class="custom pull-left">
                        <button @click.prevent="reducedQty" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                        <input type="text" v-model="cartData.qty" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                        <button @click.prevent="increaseQty" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                    </div>
                </div>
                <button @click.prevent="addToCart" class="button btn-cart" title="Add to Cart" type="button">{{ $t('products.add_to_cart')}}</button>
                <button @click.prevent="buyNow()" class="button btn-cart btn-buy" title="Buy New" type="button">{{ $t('products.buy_now')}}</button>
            </div>
            <div class="email-addto-box">
                <ul class="add-to-links">
                    <li> <a class="link-wishlist" href="#" @click.prevent="addWishList(product.product_slug)"><span>{{ $t('header.wishlist')}}</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions} from 'vuex';
    export default {
        name: "SingleProductOptions",
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
                oldPrice: 0,
            }
        },
        created(){
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
                .catch(error => {
                    this.$noty.error('Something Wrong. Try Again.');
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
                    .catch(error => {
                        this.$noty.error('Something Wrong. Try Again.');
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
                        .catch(error => {
                            this.$noty.error('Something Wrong. Try Again.');
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
                        .catch(error => {
                            this.$noty.error('Something Wrong. Try Again.');
                        })
                }else{
                    location.href = '/login';
                }
            },
            setProductPrice(){
                let variations = this.product.variations;
                variations.filter(variation=>{
                    if(parseInt(variation.pri_id) === this.cartData.colorId && parseInt(variation.sec_id) === this.cartData.sizeId){
                        this.cartData.price = parseFloat(variation.price).toFixed(2);

                        if(typeof this.product.discount_price !== "undefined" && this.product.discount_price > 0){
                            this.oldPrice = this.cartData.price;
                            this.cartData.price = (this.oldPrice -  parseFloat(this.product.discount_price)).toFixed(2);
                        }
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
