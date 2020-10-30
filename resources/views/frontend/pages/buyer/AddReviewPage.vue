<template>
    <div class="content-text clearfix wow bounceInUp animated">
        <div class="row" v-if="reviewItems.length !== 0">
            <div class="col-md-12" v-for="(item,index) in reviewItems" :key="index">
                <review-form-component :order_item="item"></review-form-component>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
import ReviewFormComponent from "../../components/buyer/ReviewFormComponent";

export default {
    name: "AddReviewPage",
    components: {ReviewFormComponent},
    beforeRouteEnter(to, from, next) {
        let orderNo = '';
        if (to.params.hasOwnProperty('order_no')) {
            orderNo = to.params.order_no;
        } else {
            vm.$router.push('/page_not_found');
        }

        next(vm => {
            vm.getOrderReviewItems(orderNo)
                .then(response => {
                    if (response.status !== 200) {
                        vm.$router.push('/page_not_found');
                    }
                });
        });
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
