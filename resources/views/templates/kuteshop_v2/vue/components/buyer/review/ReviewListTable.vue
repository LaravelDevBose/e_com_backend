<template>
    <div class="table-responsive wow bounceInUp animated">
        <table class="table table-bordered  cart_summary">
            <thead>
            <tr>
                <th>product Name</th>
                <th>Review</th>
                <th class="text-center">Rating</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="reviewList" v-for="(review,index) in reviewList" :key="index">
                <td>
                    <span>{{ review.product.product_name }}</span>
                </td>
                <td> {{ review.review }}</td>
                <td class="text-center">
                    <star-rating
                        :star-size="15"
                        :rating="review.rating"
                        :read-only="true"
                    ></star-rating>
                </td>
            </tr>
            <tr v-else>
                <td colspan="6">Review No List</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';
    import StarRating from 'vue-star-rating';

    export default {
        name: "ReviewListTable",
        components:{
            'star-rating':StarRating,
        },
        data(){
            return{

            }
        },
        mounted(){
            this.getBuyerReviews();
        },
        methods:{
            ...mapActions([
                'getBuyerReviews'
            ]),
        },
        computed:{
            ...mapGetters([
                'reviewList'
            ]),
        }
    }
</script>

<style scoped>

</style>
