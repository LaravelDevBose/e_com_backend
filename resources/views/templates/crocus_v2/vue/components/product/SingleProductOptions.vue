<template>
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
        </div>
        <div class="email-addto-box">
            <ul class="add-to-links">
                <li> <a class="link-wishlist" href="#" @click.prevent="addWishList(product.product_slug)"><span>Add to Wishlist</span></a></li>
            </ul>
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
                }
            }
        },
        created(){
            console.log(this.product);
        },
        methods:{
            ...mapActions([
                'addToCartProduct',
                'insertToWishList',
                'deleteFromWishList',
            ]),
            addToCart(){
                this.cartData.id = this.product.product_id;
                this.cartData.name = this.product.product_name;
                if(this.product.product_type === 1){
                    this.cartInfo.price = this.product.product_price;
                }else{
                    this.cartInfo.price = this.product.single_variation.price;
                }

                this.addToCartProduct(this.cartData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
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

        }
    }
</script>

<style scoped>

</style>
