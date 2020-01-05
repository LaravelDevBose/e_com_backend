<template>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h6 class="panel-title">Shop Order List</h6>
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
                            <datatable class="table-bordered table-striped" :columns="columns" :data="shopOrders"></datatable>
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
    import {mapActions, mapGetters} from "vuex";

    Vue.component('thumb-image', {
        template: `<img :src="row.product.thumb_image.image_path" :alt="row.product_name"  style="width:40px; height:40px">`,
        props: ['row'],
    });

    Vue.component('status-badge', {
        template: `<div class="btn-group">
                        <span  class="label  dropdown-toggle"
                            :class="{'bg-info':row.item_status == 1, 'bg-danger':row.item_status == 2, 'bg-warning':row.item_status == 3, 'bg-primary':row.item_status == 4, 'bg-indigo-400':row.item_status == 5, 'bg-teal':row.item_status == 6 }"
                            data-toggle="dropdown" aria-expanded="false">
                            {{ row.item_status_label }}
                        </span>
                    </div>`,
        props: ['row'],

    });
    Vue.component('order-product-info', {
        template: `<div><a href="#" @click.prevent="showProduct(row.product.product_slug)" class="text-semibold">{{ row.product_name }}</a>
            <div class="text-muted text-size-small">
                <span class="icon-qrcode bg-grey position-left"></span>
                    {{ row.product.product_sku }}
            </div></div>`,
        props: ['row'],
    });

    export default {
        name: "ShopOrdersSection",
        data(){
            return {
                page: 1,
                per_page: 10,
                columns: [
                    { label: 'Order No', field: 'order.order_no'},
                    { label: 'Image', component: 'thumb-image', align: 'center', sortable: false },
                    { label: 'Product Name', component: 'order-product-info' },
                    { label: 'Order Date', field: 'order.order_date', filterable: true, sortable:true },
                    { label: 'Buyer', field: 'buyer.user.full_name' , filterable: true, sortable:true },
                    { label: 'Brand', field: 'brand.brand_name', filterable: true, sortable:true },
                    { label: 'Price', field: 'price', align: 'right',},
                    { label: 'Quantity', field: 'qty', align: 'right',  },
                    { label: 'Total', field: 'total_price', align: 'right', sortable: true },
                    { label: 'Status', component: 'status-badge', align: 'center', sortable: true }
                ],
            }
        },
        methods:{
            ...mapActions([
                'getOrderStatus'
            ])
        },
        computed:{
            ...mapGetters([
                'shopOrders',
            ])
        }
    }
</script>

<style scoped>

</style>
