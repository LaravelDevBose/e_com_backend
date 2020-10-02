<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal-400">
                <h5 class="panel-title">Product Discount List</h5>
                <div class="heading-elements">
                    <a href="/admin/discount-product/create" class="btn bg-indigo btn-sm btn-inline"><i class="icon-plus-circle2 text-left"></i> Add New Discount Products</a>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="form-inline" style="margin:1em;">
                                <div class="form-group">
                                    <input type="text" id="filter" class="form-control" v-model="filter" placeholder="Filter">
                                </div>
                            </div>

                            <div id="table">
                                <datatable class="table-bordered table-striped" :columns="columns" :data="discountProductList" :filter-by="filter"></datatable>
                            </div>
                            <div class="form-inline">
                                <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vue from 'vue';
Vue.component('discount-percent', {
    template: `
            <span class="text-bold">{{row.discount}} <b>%</b></span>
        `,
    props: ['row']
});
import {mapActions, mapGetters} from 'vuex';
import ProductThumbImg from "../helper/table/ProductThumbImg";
import DiscountProductAction from "./DiscountProductAction";
import DiscountProductStatus from './DiscountProductStatus'
import Vue from "vue";
export default {
    name: "DiscountProductList",
    components: {
        'product-thumb-img': ProductThumbImg,
        'discount-product-action': DiscountProductAction,
        'discount-product-status': DiscountProductStatus,
    },

    data(){
        return{
            page: 1,
            per_page: 25,
            filter: '',
            rows:'',
            columns: [
                { label: 'Image', component: 'product-thumb-img', align: 'left', headerClass:'pro-img', sortable: false },
                { label: 'Product Name', field: 'product.product_title',  },
                { label: 'Category', field: 'product.category.name' },
                { label: 'Discount', component: 'discount-percent', align: 'center', sortable: true },
                { label: 'Start Date', field: 'start_at', align: 'center', sortable: true },
                { label: 'Expired Date', field: 'expire_at', align: 'center', sortable: true },
                { label: 'Status', component: 'discount-product-status', align: 'center', sortable: true },
                { label: 'Action', component: 'discount-product-action', align: 'center', sortable: false },
            ],
        }
    },
    mounted() {
        this.getDiscountProductList();
    },
    methods:{
        ...mapActions([
            'getDiscountProductList',
        ]),
    },
    computed:{
        ...mapGetters([
            'discountProductList',
        ]),
    }
}
</script>

<style scoped>

</style>
