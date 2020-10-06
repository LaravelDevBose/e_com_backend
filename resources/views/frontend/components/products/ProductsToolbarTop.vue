<template>
    <div class=" toolbar-products toolbar-top row">
        <div class=" col-md-6 col-sm-12">
            <h1 class="cate-title">Electronics</h1>
        </div>
        <div class=" col-md-6 col-sm-12">
            <div class="toolbar-option">
                <div class="toolbar-sorter ">
                    <label class="label">Sort by:</label>
                    <select class="sorter-options form-control" v-model="reqData.order_by">
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                    </select>
                    <a href="" class="sorter-action"></a>
                </div><!-- Short by -->
                <div class="toolbar-limiter">
                    <label class="label">
                        <span>Sort Type:</span>
                    </label>

                    <select class="limiter-options form-control" v-model="reqData.order_type">
                        <option value="asc">ASC</option>
                        <option value="desc">DESC</option>
                    </select>

                </div>
            </div>
            <div class="modes">
                <strong class="label">View as:</strong>
                <strong
                    class="modes-mode mode-grid"
                    title="Grid"
                    :class="{active: view=== 1}"
                    @click="updateProductViewAs(1)"
                >
                    <span>grid</span>
                </strong>
                <strong
                    title="List"
                    class="modes-mode mode-list"
                    :class="{active: view=== 2}"
                    @click="updateProductViewAs(2)"
                >
                    <span>list</span>
                </strong>
            </div>
            <!-- View as -->
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex';
export default {
    name: "ProductsToolbarTop",
    data(){
        return{
            view: 1,
            reqData :{
                order_by: 'name',
                order_type: 'asc',
            }
        }
    },
    beforeDestroy() {
        this.$store.state.view = 1;
    },
    methods:{
        ...mapActions(['updateViewAsData', 'updateSortingData']),
        updateProductViewAs(data){
            this.view = data;
            this.updateViewAsData(this.view);
        }
    },
    computed:{
        checkReqData(){
            return JSON.parse(JSON.stringify(this.reqData));
        },
    },
    watch:{
        checkReqData: {
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    this.updateSortingData(this.reqData);
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
