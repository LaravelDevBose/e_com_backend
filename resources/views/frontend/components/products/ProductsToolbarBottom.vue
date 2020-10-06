<template>
    <div class="toolbar-products toolbar-bottom">
        <div class="toolbar-option">
            <div class="toolbar-limiter">
                <label class="label">
                    <span>Show:</span>
                </label>

                <select class="limiter-options form-control" v-model="reqData.per_page">
                    <option value="15">Show 15</option>
                    <option value="30">Show 30</option>
                    <option value="50">Show 50</option>
                </select>

            </div>
            <!-- Show per page -->
        </div>
        <ul class="pagination">
            <li class="action action-next">
                <button :disabled="! prevPage" @click.prevent="goToPrev">
                    <span><i aria-hidden="true" class="fa fa-angle-double-left"></i></span>
                    Previous
                </button>

            </li>
            <li>
                <p>{{ paginatonCount }}</p>
            </li>

            <li class="action action-next">
                <button :disabled="! nextPage" @click.prevent="goToNext">
                    Next
                    <span><i aria-hidden="true" class="fa fa-angle-double-right"></i></span>
                </button>
            </li>
        </ul>

    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
export default {
    name: "ProductsToolbarBottom",
    data(){
        return{
            reqData:{
                page: 1,
                per_page: 15
            }
        }
    },
    methods:{
        ...mapActions(['updateSortingData']),
        goToNext() {
            this.reqData.page  = this.nextPage
            this.$router.push({
                name: this.$route.name,
                query: {
                    page: this.reqData.page,
                },
            });
        },
        goToPrev() {
            this.reqData.page  = this.prevPage
            this.$router.push({
                name: this.$route.name,
                query: {
                    page: this.reqData.page,
                }
            });
        },
    },
    computed:{
        ...mapGetters(['metaData']),
        nextPage() {
            if (! this.metaData || this.metaData.current_page === this.metaData.last_page) {
                return;
            }

            return this.metaData.current_page + 1;
        },
        prevPage() {
            if (! this.metaData || this.metaData.current_page === 1) {
                return;
            }

            return this.metaData.current_page - 1;
        },
        paginatonCount() {
            if (! this.metaData) {
                return;
            }

            const { current_page, last_page } = this.metaData;

            return `${current_page} of ${last_page}`;
        },
        checkReqData(){
            return JSON.parse(JSON.stringify(this.reqData))
        }
    },
    watch:{
        checkReqData:{
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    console.log(this.reqData);
                    this.updateSortingData(this.reqData)
                }
            },deep: true,
        }
    }
}
</script>

<style scoped>

</style>
