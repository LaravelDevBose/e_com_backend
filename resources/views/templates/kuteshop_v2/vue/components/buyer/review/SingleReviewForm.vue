<template>
    <div v-if="order_item" class="box-border">
        <div class="item">
            <div class="product-item">
                <div class="product-item-info row">
                    <div class="product-item-photo col-sm-4 col-md-2">
                        <a class="product-item-img" href="#">
                            <img alt="product name" :src="order_item.product.thumb_image.image_path"  class="product-image img-thumbnail">
                        </a>
                    </div>
                    <div class="product-item-detail col-sm-8 col-md-10">
                        <h4 style="margin-top:0px; margin-bottom:3px;">
                            <strong class="product-item-name"><a href="#">{{ order_item.product_name }}</a></strong>
                        </h4>
                        <p>
                            <strong class="product-item-name">SKU:</strong> {{ order_item.product.product_sku }}
                        </p>
                        <p v-if="order_item.seller.shop">
                            <strong class="product-item-name">SHOP:</strong>{{ order_item.seller.shop.shop_name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <form action="" @submit.prevent="addBuyerReview">
            <ul>
                <li class="row">
                    <div class="col-sm-12 col-md-4">
                        <label  class="required">Rating</label>
                        <star-rating
                            v-model="formData.rating"
                            :star-size="25"
                        ></star-rating>
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <label for="review" class="required">Review</label>
                        <textarea id="review" class="input form-control" v-model="formData.review" rows="3" placeholder="Your Review.."></textarea>
                    </div>
                </li>
                <li style="text-align: right; margin-top: 10px;">
                    <button type="submit"  :disabled="btnDisabled" class="button">
                        <span>Save</span>
                    </button>
                </li>
            </ul>
        </form>
    </div>
</template>

<script>
    import {mapActions,mapGetters} from 'vuex';
    import StarRating from 'vue-star-rating';
    export default {
        name: "SingleReviewForm",
        components:{
            'star-rating':StarRating,
        },
        props:{
            order_item:[Object]
        },
        data(){
            return{
                formData:{
                    item_id:'',
                    product_id:'',
                    rating:'',
                    review:'',
                },
                btnDisabled:false,
            }
        },
        methods:{
          ...mapActions([
              'addBuyerReview',
          ])
        },
        computed:{

        },
        watch:{

        }
    }
</script>

<style scoped>
    .box-border{
        padding:7px 15px;
        margin-bottom:10px;
    }
    .product-image{
        width: 100%;
        height: auto;
    }
    .product-item-detail{
        display: inline-block;
        padding:10px;
    }
    .product-item-detail p{
        margin-bottom: 0px;
    }
    ul{
        padding-top: 1rem;
    }
</style>
