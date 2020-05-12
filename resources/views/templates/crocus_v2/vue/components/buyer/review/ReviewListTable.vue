<template>
    <div class="table-responsive wow bounceInUp animated">
        <table class="table table-bordered  cart_summary">
            <thead>
            <tr>
                <th>{{ $t('buyer.product.pro_img')}} </th>
                <th>{{ $t('buyer.product.pro_name')}} </th>
                <th>{{ $t('buyer.review.review')}}</th>
                <th class="text-center">{{ $t('buyer.review.rating')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="paginatedData" v-for="(review,index) in paginatedData" :key="index">
                <td>
                    <img :src="review.item.image.image_path" :alt="review.item.product_name" class="img-responsive" style="max-height: 100px">
                </td>
                <td>
                    <span>{{ review.item.product_name }}</span>
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
        <div class="text-right" style="margin-top: 1rem;" v-if="reviewList.length > size">
            <button
                class="btn btn-sm btn-primary"
                :disabled="pageNumber === 0"
                @click="prevPage">
                Previous
            </button>
            <button
                class="btn btn-sm btn-primary"
                :disabled="pageNumber >= pageCount -1"
                @click="nextPage">
                Next
            </button>
        </div>
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
                pageNumber: 0,
                size: 10,
            }
        },
        mounted(){
            this.getBuyerReviews();
        },
        methods:{
            ...mapActions([
                'getBuyerReviews'
            ]),
            nextPage(){
                this.pageNumber++;
            },
            prevPage(){
                this.pageNumber--;
            }
        },
        computed:{
            ...mapGetters([
                'reviewList'
            ]),
            pageCount(){
                let l = this.reviewList.length,
                    s = this.size;
                return Math.ceil(l/s);
            },
            paginatedData(){
                const start = this.pageNumber * this.size,
                    end = start + this.size;
                return this.reviewList
                    .slice(start, end);
            }
        }
    }
</script>

<style scoped>

</style>
