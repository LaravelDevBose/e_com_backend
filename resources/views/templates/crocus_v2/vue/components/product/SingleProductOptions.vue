<template>
    <div>
        <div class="price-block">
            <div class="price-box">
                <p class="special-price"><span class="price-label">Price</span>
                    <span class="price">$ {{ cartData.price }}</span>
                </p>
            </div>
        </div>
        <div class="short-description">
            <h2>Quick Overview</h2>
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
                <button @click.prevent="addToCart" class="button btn-cart" title="Add to Cart" type="button">Add to Cart</button>
                <button @click.prevent="buyNow()" class="button btn-cart btn-buy" title="Add to Cart" type="button">Buy Now</button>
            </div>
            <div class="email-addto-box">
                <ul class="add-to-links">
                    <li> <a class="link-wishlist" href="#" @click.prevent="addWishList(product.product_slug)"><span>Add to Wishlist</span></a></li>
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
                }
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
