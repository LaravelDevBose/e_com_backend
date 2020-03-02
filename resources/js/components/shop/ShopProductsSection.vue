<template>
    <div class="panel ">
        <div class="panel-heading bg-teal-300">
            <h6 class="panel-title">Product List</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <div id="table">
                            <datatable class="table-bordered table-striped" :columns="columns" :data="shopProducts"></datatable>
                        </div>
                        <div class="form-inline">
                            <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductAction from "../helper/table/ProductAction";
    import ProductThumbImg from "../helper/table/ProductThumbImg";
    import ProductStatus from "../helper/table/ProductStatus";
    import {mapGetters, mapActions} from 'vuex';
    export default {
        name: "ShopProductsSection",
        components:{
            'product-thumb-img':ProductThumbImg,
            'product-status':ProductStatus,
            'product-action':ProductAction,
        },
        data(){
            return {
                page: 1,
                per_page: 10,
                columns: [
                    { label: 'Product Name', field: 'product_title',  },
                    { label: 'Product SKU', field: 'sku' , },
                    { label: 'Category', field: 'category.name' },
                    { label: 'Brand', field: 'brand.name', sortable: true },
                    { label: 'Quantity', field: 'total_qty', align: 'center', sortable: true },
                    { label: 'Status', component: 'product-status', align: 'center', sortable: false },
                    // { label: 'Action', component: 'product-action', align: 'center', sortable: false },

                ]
            }
        },
        computed:{
            ...mapGetters([
                'shopProducts',
            ])
        }
    }
</script>

<style scoped>

</style>
