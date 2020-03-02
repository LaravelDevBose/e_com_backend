<template>
    <div class="col-md-9 col-md-push-3   col-main">
        <h2 class="page-heading">
            <span class="page-heading-title2">Review List</span>
        </h2>

        <div class="clearfix">
            <review-list-table></review-list-table>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
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
