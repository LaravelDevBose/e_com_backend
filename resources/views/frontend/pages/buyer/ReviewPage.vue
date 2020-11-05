<template>
    <div>
        <h3>Review List</h3>
        <div class="table-responsive wow bounceInUp animated">
            <table class="table table-bordered  cart_summary">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Info</th>
                    <th class="text-center">Rating</th>
                    <th>Review</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-if="reviewList && reviewList.length > 0"
                    v-for="review in reviewList"
                    :key="review.id"
                >
                    <td class="cart_product text-center">
                        <router-link :to="{ name: 'Product', params:{ slug: review.product.slug } }">
                            <clazy-load :src="review.product.image.image_path">
                                <img :title="review.product.name" :src="review.product.image.image_path"
                                     style="width:40px; height:40px;">
                                <div class="preloader" slot="placeholder">
                                    <img :title="review.product.name" :src="$baseUrl+'/images/loader.gif'"
                                         style="width:100%; height:auto;">
                                </div>
                            </clazy-load>
                        </router-link>
                    </td>
                    <td class="cart_description">
                        <p class="product-name">
                            <router-link :to="{ name: 'Product', params:{ slug: review.product.slug } }">
                                {{ review.product.name }}
                            </router-link>
                        </p>
                        <small class="cart_ref">SKU: {{ review.product.sku }}</small>
                    </td>
                    <td class="text-center">
                        <star-rating
                            :star-size="25"
                            :rating="Number(review.rating)"
                            :read-only="true"
                        ></star-rating>
                    </td>
                    <td>{{ review.review }}</td>
                    <td>
                        {{ review.date }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


</template>

<script>
import {mapGetters, mapActions} from 'vuex';
export default {
    name: "ReviewPage",
    mounted(){
        this.getBuyerReviews();
    },
    methods:{
        ...mapActions(['getBuyerReviews'])
    },
    computed:{
        ...mapGetters(['reviewList'])
    }
}
</script>

<style scoped>

</style>
