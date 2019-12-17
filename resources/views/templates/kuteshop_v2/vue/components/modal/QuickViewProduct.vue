<template>
    <div class="modal fade" id="quickView" tabindex="-1" role="dialog"  >
        <div class="modal-dialog modal-md" role="document" style="top: 10%;">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" @click="closeModal()" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div v-if="showIn" class="products  products-list">
                    <div class="product-items">
                        <div class="product-item ">
                            <div class="product-item-opt-1">
                                <div class="product-item-info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="product-item-photo">
                                                <a href="#" class="product-item-img">
                                                    <img :src="modal_product.thumb_image.image_path" :alt="modal_product.product_name">
                                                </a>
                                                <!--                                        <span class="product-item-label label-price">30% <span>off</span></span>-->
                                            </div>
                                            <div class="product-item-detail">
                                                <strong class="product-item-name">
                                                    <a href="#" @click.prevent="productDetails(modal_product.product_slug)">{{ modal_product.product_name }}</a>
                                                </strong>
                                                <div class="clearfix product-info-des">

                                                    <div class="product-reviews-summary ">
                                                        <div class="rating-summary grid-rating">
                                                            <star-rating
                                                                :star-size="13"
                                                                :rating="rating"
                                                                :read-only="true"
                                                            ></star-rating>
                                                        </div>
                                                    </div>
                                                    <div class="product-item-price">
                                                        <span class="price" >$ {{ cartData.price }} </span>
                                                        <span class="old-price" v-if="oldPrice !== 0 && oldPrice !== '' ">$ {{ oldPrice}}</span>
                                                    </div>

                                                    <div class="product-item-code">
                                                        <span class="title">Item Code:</span> {{ modal_product.product_sku }}
                                                    </div>
                                                    <div class="product-item-stock">
                                                        <span class="title">Availability:</span> In stock
                                                    </div>
                                                    <div class="product-add-form">
                                                        <p>Available Options:</p>
                                                        <div class="product-options-wrapper">
                                                            <div class="form-qty">
                                                                <label class="label">Qty: </label>
                                                                <div class="control">
                                                                    <input type="text" class="form-control input-qty" v-model="cartData.qty" id="qty1" name="qty1"  maxlength="12"  minlength="1">
                                                                    <button class="btn-number qtyminus" @click.prevent="reducedQty" data-type="minus" data-field="qty1"><span>-</span></button>
                                                                    <button class="btn-number qtyplus" data-type="plus" @click.prevent="increaseQty" data-field="qty1"><span>+</span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-options-bottom clearfix" style="margin-top: 0px;">
                                                            <div class="actions">
                                                                <button type="submit" @click.prevent="addToCart()" title="Add to Cart" class="action btn-cart">
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                                <button type="submit" @click.prevent="buyNow()" title="Buy Now" class="action btn-buy">
                                                                    <i class="fa fa-cart-plus"></i>
                                                                    <span>Buy Now</span>
                                                                </button>
                                                                <div class="product-addto-links">

                                                                    <a href="#" @click.prevent="addWishList(modal_product.product_slug)" class="action btn-wishlist" title="Wish List">
                                                                        <span>Wishlist</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-item-des" style="padding: 0 15px;">
                                        <span v-html="modal_product.highlight"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions } from 'vuex';
    export default {
        name: "QuickViewProduct",
        data(){
            return{
                showIn:false,
                cartData:{
                    id:'',
                    name:'',
                    qty:1,
                    price:0,
                    colorId:'',
                    sizeId:'',
                },
                rating:0,
                oldPrice:0,
            }
        },
        mounted(){

        },
        methods:{
            ...mapActions([
                'modalClose',
                'insertToWishList',
                'addToCartProduct',
                'getProductVariationInfo'
            ]),
            addWishList(slug){
                if(AppStorage.getWhoIs() === 'buyer'){
                    this.insertToWishList(slug)
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
            addToCart(){
                this.cartData.id = this.modal_product.product_id;
                this.cartData.name = this.modal_product.product_name;

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
            closeModal(){
                this.modalClose();
                this.showIn = false;
            },
            setupPrice(){
                if(this.modal_product.product_type === 1){
                    this.cartData.price = parseFloat(this.modal_product.product_price);
                }else{
                    this.cartData.price = parseFloat(this.modal_product.single_variation.price);
                    this.cartData.colorId = parseInt(this.modal_product.single_variation.pri_id);
                    this.cartData.sizeId = parseInt(this.modal_product.single_variation.sec_id);
                }
                if(typeof this.modal_product.discount_price !== "undefined" && this.modal_product.discount_price > 0){
                    this.oldPrice = this.cartData.price;
                    this.cartData.price = this.oldPrice -  parseFloat(this.modal_product.discount_price);
                }
                if(this.modal_product.reviews !== '' && this.modal_product.reviews.length >0){
                    let sum = this.modal_product.reviews.reduce((acc, item) => acc + parseInt(item.rating), 0);
                    this.rating = sum / this.modal_product.reviews.length;
                }
            },
            productDetails(slug){
                location.href = '/product/'+slug;
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
                'showModal',
                'modal_product',
            ]),
            checkModalData(){
                return JSON.parse(JSON.stringify(this.modal_product));
            }
        },
        watch:{
            checkModalData:{
                handler(newVal, oldVal){
                    if (newVal !== oldVal){
                        console.log(this.modal_product);
                        this.setupPrice();
                        this.showIn = true;
                    }
                }
            }
        }
    }
</script>

<style scoped>
    .products.products-list .product-items .product-item-opt-1 .product-info-des{
        padding-right: 0px;
    }
</style>
