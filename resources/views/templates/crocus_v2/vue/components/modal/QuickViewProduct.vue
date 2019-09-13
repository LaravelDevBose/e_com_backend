<template>
<div v-if="showModal">
    <div style="background-color: rgb(119, 119, 119); opacity: 0.7; cursor: pointer; height: 1024px; display: block;" id="fancybox-overlay"></div>
    <div style="top: 15%; display: block;" id="fancybox-wrap">
        <div id="fancybox-outer">
            <div style="border-width: 10px; width: 1170px; height: auto;" id="fancybox-content">
                <div style="width:auto;height:auto;overflow: auto;position:relative;">
                    <div class="product-view">
                        <div class="product-essential">
                            <form action="#" method="post" id="product_addtocart_form">
                                <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                <div class="product-img-box col-lg-5 col-sm-5 col-xs-12">
<!--                                    <div class="new-label new-top-left"> New </div>-->
                                    <div class="product-image">
                                        <div class="product-full">
                                            <img id="product-zoom" :src="modal_product.thumb_image.image_path"  :data-zoom-image="modal_product.thumb_image.image_path"  :alt="modal_product.product_name"/>
                                        </div>
                                    </div>
                                    <!-- end: more-images -->
                                </div>
                                <div class="product-shop col-lg-7 col-sm-7 col-xs-12">

                                    <div class="product-name">
                                        <h1>{{ modal_product.product_name }}</h1>
                                    </div>
                                    <div class="ratings">
                                        <div class="rating-box">
                                            <div style="width:60%" class="rating"></div>
                                        </div>
                                        <p class="rating-links"> <a href="#">1 Review(s)</a></p>
                                    </div>
                                    <div class="price-block">
                                        <div class="price-box">
                                            <p class="special-price">
                                                <span class="price-label">Price</span>
                                                <span id="product-price-48" class="price"> $ {{ modal_product.single_variation.price }} </span>
                                            </p>
<!--                                            <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $315.99 </span> </p>-->
                                            <p class="availability in-stock pull-right"><span>In Stock</span></p>
                                        </div>
                                    </div>
                                    <div class="short-description">
                                        <h2>Quick Overview</h2>
                                        <span v-html="modal_product.highlight"></span>
                                    </div>
                                    <div class="add-to-box">
                                        <div class="add-to-cart">
                                            <div class="pull-left">
                                                <div class="custom pull-left">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                                                    <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                                                </div>
                                            </div>
                                            <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button"><span>Add to Cart</span></button>
                                        </div>
                                        <div class="email-addto-box">
                                            <ul class="add-to-links">
                                                <li> <a class="link-wishlist" href="#" @click.prevent="addWishList(modal_product.product_slug)"><span>Add to Wishlist</span></a></li>
                                                <li><span class="separator">|</span> <a class="link-compare" href="#" @click.prevent="addCompareProduct(modal_product.product_slug)"><span>Add to Compare</span></a></li>
                                            </ul>
                                            <p class="email-friend"><a href="#" class=""><span>Email to a Friend</span></a></p>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!--product-view-->

                </div>
            </div>
            <a style="display: inline;" id="fancybox-close" href="#" @click.prevent="closeModal()"></a> </div>
    </div>

</div>
</template>

<script>
    import {mapGetters, mapActions } from 'vuex';
    export default {
        name: "QuickViewProduct",
        data(){
            return{
                showIn:true,
            }
        },
        methods:{
            ...mapActions([
                'modalClose'
            ]),
            addWishList(slug){

            },
            addCompareProduct(slug){

            },
            closeModal(){
                this.modalClose();
            }
        },
        computed:{
            ...mapGetters([
                'showModal',
                'modal_product'
            ]),

        }
    }
</script>

<style scoped>

</style>
