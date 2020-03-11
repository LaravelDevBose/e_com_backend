<template>
    <div class="table-responsive">
        <table class="data-table" id="my-orders-table">
            <thead>
            <tr class="first last">
                <th>{{ $t('buyer.order.order')}}#</th>
                <th style="max-width:70px;">{{ $t('buyer.order.image')}}</th>
                <th>{{ $t('product.details')}}</th>
                <th>{{ $t('buyer.order.date')}}</th>
                <th>{{ $tc('products.brand', 1)}}</th>
                <th class="text-right">{{ $t('buyer.order.price')}}</th>
                <th class="text-center">{{ $t('buyer.order.qty')}}</th>
                <th class="text-right">{{ $t('buyer.order.t_price')}}</th>
                <th class="text-center">{{ $t('buyer.order.view')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr v-if="individualSellerOrders.length !== 0" v-for="(orderItem,index) in individualSellerOrders" :class="{'first':index === 0, 'last':(index+1) === individualSellerOrders.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                <td>{{ orderItem.order.order_no }}</td>
                <td>
                    <img v-if="orderItem.product.thumb_image.image_path" :src="orderItem.product.thumb_image.image_path" :alt="orderItem.product.product_name" class="img img-responsive" style="max-width: 50px; max-height: 50px">
                </td>
                <td>
                    <div>
                        <p class="mar-0">Name: {{ orderItem.product.product_name }}</p>
                        <p class="mar-0" >SKU: {{ orderItem.product.product_sku }}</p>
                    </div>
                </td>
                <td>
                    <span>{{ orderItem.order.order_date}}</span>
                </td>
                <td>
                    <span v-if="orderItem.brand !== null">{{ orderItem.brand.brand_name }}</span>
                </td>
                <td class="text-right">{{ orderItem.price }}</td>
                <td class="text-center">{{ orderItem.qty }}</td>
                <td class="text-center">{{ orderItem.total_price }}</td>
                <td class="text-center">
                    <div class="dropdown">
                        <button
                            class="btn btn-sm dropdown-toggle"
                            :class="{'btn-info':orderItem.item_status ===1, 'btn-danger':orderItem.item_status===2, 'btn-primary':orderItem.item_status===5}"
                            type="button"
                            data-toggle="dropdown"
                        >{{ orderItem.item_status_label }}
                            <span v-if="orderItem.item_status === 1" class="caret"></span>
                        </button>
                        <ul v-if="orderItem.item_status === 1" class="dropdown-menu">
                            <li><a href="#" class="cancel" @click.prevent="changeOrderStatus(orderItem.item_id, 2)" >Cancel</a></li>
                            <li><a href="#" class="ready-to-ship"  @click.prevent="changeOrderStatus(orderItem.item_id, 5)" >Ready To Ship</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr v-else class="last even">
                <td colspan="9">{{ $t('buyer.order.no_order')}}</td>
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
    .ready-to-ship{
        color: #31708f!important;
    }
    .cancel{
        color: #d81f1f!important;
    }
    .mar-0{
        margin: 0px!important;
    }
</style>
