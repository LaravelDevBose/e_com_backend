<template>
    <div class="my-account">
        <div class="page-title">
            <h2>{{ $t('buyer.review.review_list')}}</h2>
        </div>
        <div class="dashboard">
            <div class="recent-orders">
                <review-list-table></review-list-table>
            </div>
        </div>
    </div>
</template>

<script>
    import ReviewListTable from "./ReviewListTable";

    export default {
        name: "ReviewListPage",
        components: {ReviewListTable},
        data(){
            return{

            }
        },
        mounted(){

        }
    }
</script>

<style scoped>

</style>
