<template>
    <div class="product-add-form">
        <p>Available Options:</p>
        <form>

            <div class="product-options-wrapper">

                <div class="swatch-opt">
                    <div class="swatch-attribute color" >
                        <span class="swatch-attribute-label">Color:</span>
                        <div class="swatch-attribute-options clearfix">
                            <div class="swatch-option color selected" style="background-color: #0c3b90 ;"></div>
                            <div class="swatch-option color" style="background-color: #036c5d ;"></div>
                            <div class="swatch-option color" style="background-color: #5f2363 ;"></div>
                            <div class="swatch-option color " style="background-color: #ffc000 ;"></div>
                            <div class="swatch-option color" style="background-color: #36a93c ;"></div>
                            <div class="swatch-option color" style="background-color: #ff0000 ;"></div>
                        </div>
                    </div>
                </div>
                <div class="form-qty">
                    <label class="label">Qty: </label>
                    <div class="control">
                        <input type="text" class="form-control input-qty" v-model="cartData.qty" id="qty1" name="qty1"  maxlength="12"  minlength="1">
                        <button class="btn-number qtyminus" @click.prevent="reducedQty" data-type="minus" data-field="qty1"><span>-</span></button>
                        <button class="btn-number qtyplus" data-type="plus" @click.prevent="increaseQty" data-field="qty1"><span>+</span></button>
                    </div>
                </div>
                <div class="form-configurable">
                    <label for="forSize" class="label">Size: </label>
                    <div class="control">
                        <select  id="forSize" class="form-control attribute-select">
                            <option value="1">XXXL</option>
                            <option value="4">X</option>
                            <option value="5">L</option>
                        </select>
                    </div>
                    <a href="" class="size-chart">Size chart</a>
                </div>
            </div>



            <div class="product-options-bottom clearfix">

                <div class="actions">

                    <button type="submit" @click.prevent="addToCart" title="Add to Cart" class="action btn-cart">
                        <span>Add to Cart</span>
                    </button>
                    <div class="product-addto-links">

                        <a href="#" @click.prevent="addWishList(product.product_slug)" class="action btn-wishlist" title="Wish List">
                            <span>Wishlist</span>
                        </a>
                    </div>
                </div>

            </div>

        </form>
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
                this.cartData.price = this.product.single_variation.price;

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
