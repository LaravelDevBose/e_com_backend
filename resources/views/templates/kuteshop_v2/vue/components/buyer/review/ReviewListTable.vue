<template>
    <div class="table-responsive wow bounceInUp animated">
        <table class="table table-bordered  cart_summary">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ $t('buyer.order.order')}} </th>
                <th>product Name</th>
                <th class="text-right">Review</th>
                <th class="text-center">Rating</th>
                <th class="action text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="reviewList" v-for="(review,index) in reviewList" :key="index">
                <td>{{ index+1 }}</td>
                <td>{{ review.order_date }}</td>
                <td>
                    <span>{{ review.product.product_name }}</span>
                </td>
                <td class="text-right">
                    <span class="price">{{ review.review }}</span>
                </td>
                <td class="text-center">
                    <em>{{ review.rating }}</em>
                </td>
                <td class="text-center">
                    <a href="#" class="text-primary"> <i class="fa fa-eye"></i></a>
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

    export default {
        name: "ReviewListTable",
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
