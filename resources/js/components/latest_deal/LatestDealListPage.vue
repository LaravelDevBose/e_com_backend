<template>
    <div class="content">
        <div class="panel">
            <div class="panel-heading bg-teal-400">
                <h5 class="panel-title">Product Group List</h5>
                <div class="heading-elements">
                    <a href="/admin/latest/deal/create" class="btn bg-indigo btn-sm btn-inline"><i class="icon-plus-circle2 text-left"></i> Add Latest Deal Products</a>
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
                                <datatable class="table-bordered table-striped" :columns="columns" :data="groupList" :filter-by="filter"></datatable>
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
    import {mapActions, mapGetters} from 'vuex';
    import ProductThumbImg from "../helper/table/ProductThumbImg";
    import GroupProductAction from "./LatestDealAction";
    import LatestDealStatus from './LatestDealStatus'
    export default {
        name: "LatestDealListPage",
        components:{
            'product-thumb-img':ProductThumbImg,
            'latest-deal-action':LatestDealAction,
            'latest-deal-status':LatestDealStatus,
        },
        data(){
            return{
                page: 1,
                per_page: 25,
                filter: '',
                rows:'',
                columns: [
                    { label: 'Image', component: 'product-thumb-img', align: 'left', headerClass:'pro-img', sortable: false },
                    { label: 'Product Name', field: 'product.product_name',  },
                    { label: 'Product SKU', field: 'product.product_sku'},
                    { label: 'Category', field: 'product.category.category_name' },
                    { label: 'Brand', field: 'product.brand.brand_name', sortable: true },
                    { label: 'Group Title', field: 'group_title', align: 'center', sortable: true },
                    { label: 'Position', field: 'position', align: 'center', sortable: true },
                    { label: 'Expired', field: 'expired_at', align: 'center', sortable: true },
                    { label: 'Status', component: 'latest-deal-status', align: 'center', sortable: true },
                    { label: 'Action', component: 'latest-deal-action', align: 'center', sortable: true },
                ],
            }
        },
        mounted() {
            this.getGroupList();
        },
        methods:{
            ...mapActions([
                'getGroupList',
            ]),
        },
        computed:{
            ...mapGetters([
                'groupList',
            ]),
        }
    }
</script>

<style scoped>

</style>
