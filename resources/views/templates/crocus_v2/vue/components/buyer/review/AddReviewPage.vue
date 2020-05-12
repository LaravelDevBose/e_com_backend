<template>
    <section class="col-sm-9 wow bounceInUp animated">
        <div class="row" v-if="reviewItems.length !== 0">
            <div class="col-md-12" v-for="(item,index) in reviewItems" :key="index">
                <single-review-form :order_item="item"></single-review-form>
            </div>
        </div>
    </section>
</template>

<script>
    import {mapActions,mapGetters} from 'vuex';
    import SingleReviewForm from "./SingleReviewForm";

    export default {
        name: "AddReviewPage",
        components: {SingleReviewForm},
        props:{
            orderid:{
                type:[Number],
                default:'',
            }
        },
        data(){
            return{

            }
        },
        mounted(){
            if(this.orderid !== ''){
                this.getOrderReviewItems(this.orderid);
            }
        },
        methods:{
            ...mapActions([
                'getOrderReviewItems'
            ])
        },
        computed:{
            ...mapGetters([
                'reviewItems'
            ])
        }
    }
</script>

<style scoped>

</style>
