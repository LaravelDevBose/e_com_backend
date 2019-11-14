<template>
    <div class="table-responsive">
        <table class="data-table" id="my-orders-table">
            <thead>
            <tr class="first last">
                <th>Order No#</th>
                <th style="max-width:70px;">Image</th>
                <th>Product Info</th>
                <th>Order Date</th>
                <th>Brand</th>
                <th class="text-right">Price</th>
                <th class="text-center">Qty</th>
                <th class="text-right">T. Price</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action </th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="individualSellerOrders.length !== 0" v-for="(orderItem,index) in individualSellerOrders" :class="{'first':index === 0, 'last':(index+1) === individualSellerOrders.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                <td>{{ orderItem.order.order_no }}</td>
                <td>
                    <img v-if="orderItem.product.thumb_image.image_path" :src="orderItem.product.thumb_image.image_path" :alt="orderItem.product.product_name" class="img-responsive" style="max-width: 50px; max-height: 50px">
                </td>
                <td>
                    <div>
                        <p>Name: {{ orderItem.product.product_name }}</p>
                        <p>SKU: {{ orderItem.product.product_sku }}</p>
                    </div>
                </td>
                <td>
                    <span>{{ orderItem.order.order_date}}</span>
                </td>
                <td>
                    <span v-if="orderItem.brand !== null">{{ orderItem.brand.name }}</span>
                </td>
                <td class="text-right">{{ orderItem.price }}</td>
                <td class="text-center">{{ orderItem.qty }}</td>
                <td class="text-center">{{ orderItem.total_price }}</td>
                <td class="a-center last text-center">
                    <div class="btn-group btn-group-sm" role="group">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ orderItem.item_status_label }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#" @click.prevent="changeOrderStatus(orderItem.item_id, 2)">Action</a>
                                <a class="dropdown-item" href="#" @click.prevent="changeOrderStatus(orderItem.item_id, 5)">Action</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr v-else class="last even">
                <td colspan="9">No Product Found</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex';

    export default {
        name: "IndividualSellerOrderList",
        data(){
            return{
                reqData:{
                    seller_id:'seller',
                }
            }
        },
        mounted() {
            this.getIndividualSellerOrders(this.reqData);
        },
        methods:{
            ...mapActions([
                'getIndividualSellerOrders',
                'orderStatusChange'
            ]),
            changeOrderStatus(itemId, status){
                let data ={
                    item_id:itemId,
                    item_status:status,
                };
                this.orderStatusChange(data)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                            if (response.hasOwnProperty('url')){
                                setTimeout(()=>{
                                    location.href = response.url;
                                }, 1500);
                            }
                        }else if(response.status === 'validation'){
                            this.$noty.warning(response.message);
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'individualSellerOrders'
            ])
        }
    }
</script>

<style scoped>

</style>
