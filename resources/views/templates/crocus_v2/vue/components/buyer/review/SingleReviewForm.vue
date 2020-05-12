<template>
    <div v-if="order_item" class="box-border shadow ">
        <div class="item">
            <div class="product-item">
                <div class="product-item-info row">
                    <div class="product-item-photo col-sm-4 col-md-2">
                        <a class="product-item-img" href="#">
                            <img :alt="order_item.product_name" :src="order_item.product.thumb_image.image_path"  class="product-image img-thumbnail">
                        </a>
                    </div>
                    <div class="product-item-detail col-sm-8 col-md-4">
                        <h4 style="margin-top:0px; margin-bottom:3px;">
                            <strong class="product-item-name"><a :href="'/product/'+ order_item.product.product_slug">{{ order_item.product_name }}</a></strong>
                        </h4>
                        <p>
                            <strong class="product-item-name">SKU: </strong> {{ order_item.product.product_sku }}
                        </p>
                        <p v-if="order_item.seller.shop">
                            <strong class="product-item-name">SHOP: </strong>{{ order_item.seller.shop.shop_name }}
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <form action="" @submit.prevent="addBuyerReview" class="review-form">
                            <ul v-if="order_item.item_status === 6">
                                <li class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <label  class="required">{{ $t('buyer.review.rating')}}</label>
                                        <star-rating
                                            v-model="formData.rating"
                                            :star-size="25"
                                            :rating="formData.rating"
                                            :read-only="haveReview"
                                        ></star-rating>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <label for="review" class="required">{{ $t('buyer.review.review')}}</label>
                                        <textarea v-if="!haveReview" id="review" class="input form-control" v-model="formData.review" rows="3" placeholder="Your Review.."></textarea>
                                        <p v-if="haveReview" v-html="formData.review" style="margin-bottom: 0px; padding-bottom: 5px "></p>
                                    </div>
                                </li>
                                <li v-if="!haveReview" style="text-align: right; margin-top: 10px;">
                                    <button type="submit"  :disabled="btnDisabled" class="button">
                                        <span>Save</span>
                                    </button>
                                </li>
                            </ul>
                            <ul v-else>
                                <li class="block">
                                    <p class="block-title">{{ $t('buyer.review.review_war')}}</p>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                    rating:0,
                    review:'',
                },
                btnDisabled:false,
                haveReview:false,
            }
        },
        mounted(){
          if(this.order_item.review !== '' && this.order_item.review !== null){
              this.haveReview = true;
              this.formData.review = this.order_item.review.review;
              this.formData.rating = this.order_item.review.rating;
          }
        },
        methods:{
          ...mapActions([
              'storeBuyerReview',
          ]),
            addBuyerReview(){
                if(!this.checkValidation()){
                    return false;
                }
                this.btnDisabled=true;
                this.formData.item_id = this.order_item.item_id;
                this.formData.product_id = this.order_item.product_id;
                this.storeBuyerReview(this.formData)
                    .then(response=>{
                        if (typeof response.code !== 'undefined' && response.code === 200){
                            this.haveReview = true;
                            this.$noty.success(response.message);
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            },
            checkValidation(){
                if(this.formData.rating === '' && this.formData.review === ''){
                    this.$noty.success('Review Form is Empty.');
                    return false;
                }

                return true;
            }
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
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
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
        list-style: none;
        padding-left: 0;
    }
</style>
