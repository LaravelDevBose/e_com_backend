<template>
    <div class="table-responsive">
        <table class="table table-bordered  cart_summary">
            <thead>
            <tr>
                <th class="cart_product">Product</th>
                <th>Description</th>
                <th class="text-right">Unit price</th>
                <th class="text-center">Qty</th>
                <th class="text-right">Total</th>
                <th class="action" style="width: 8%"><i class="fa fa-trash-o"></i></th>
            </tr>
            </thead>
            <tbody>
                <tr v-if="cartTotal > 0" v-for="(cart,index) in  cartList" :key="index">
                    <td class="cart_product">
                        <a :title="cart.name" :href="cart.options.product_url">
                            <img :alt="cart.name" :src="cart.options.image" >
                        </a>
                    </td>
                    <td class="cart_description">
                        <p class="product-name">
                            <a :href="cart.options.product_url" >{{ cart.name }}</a>
                        </p>
                        <small class="cart_ref">SKU : #123654999</small><br>
                        <small v-if="cart.options.color"><a href="#">Color : {{ cart.options.color }}</a></small><br>
                        <small v-if="cart.options.size"><a href="#">Size : {{ cart.options.size }}</a></small>
                    </td>
                    <td class="price"><span>$ {{ cart.price }}</span></td>
                    <td class="qty">
                        <input type="number" :value="cart.qty" :id="cart.rowId" @change="cartUpdate($event, cart.rowId)"  minlength="1" maxlength="12" :disabled="qtyDisable" name="qty0" class="form-control input-sm">
                    </td>
                    <td class="price">
                        <span>$ {{ cart.price*cart.qty }}</span>
                    </td>
                    <td class="action">
                        <a href="#" @click.prevent="productRemoveFromCart(cart.rowId)">Delete item</a>
                    </td>
                </tr>
                <tr v-else class="last even">
                    <td colspan="7"><span>Cart is Empty </span></td>
                </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2"></td>
                <td colspan="3">Subtotal:</td>
                <td colspan="2">$ {{ cartSubTotal }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="3">Discount: </td>
                <td colspan="2">$ {{ cartDiscount }}</td>
            </tr>
            <tr v-if="deliveryCost!==0">
                <td colspan="2"></td>
                <td colspan="3">Delivery Charge: </td>
                <td colspan="2">$ {{ deliveryCost }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="3"><strong>Grand Total</strong></td>
                <td colspan="2"><strong>$ {{ (parseFloat(cartTotalPrice)+parseInt(deliveryCost)).toFixed(2) }}</strong></td>
            </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';
    import _ from 'lodash';

    export default {
        name: "CartListTable",
        data(){
            return{
                delay:5000,
                proQty:0,
                cartRowId:'',
                qtyDisable:false,
            }
        },
        updated(){
            if(this.cartTotal === 0){
                setTimeout(()=>{
                    location.href = '/';
                },1000)

            }
        },
        methods:{
            ...mapActions([
                'removeFromCart',
                'destroyCart',
                'updateCart',
            ]),
            productRemoveFromCart(rowId){
                this.removeFromCart(rowId)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            },
            goToCheckoutPage(){
                if(AppStorage.getWhoIs() === 'buyer'){
                    location.href = '/buyer/checkout';
                }else{
                    location.href = '/login';
                }
            },
            cartDestroy(){
                this.destroyCart()
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                            location.href = '/';
                        }else{
                            this.$noty.error(response.message);
                        }
                    })
            },
            cartUpdate(e, rowId){
                if(e.target.value <= 0){
                    this.$noty.warning('Product Qty Atlest 1');
                    this.proQty = 1;
                    return false;
                }
                this.proQty = e.target.value;

                this.cartRowId = rowId;
            },
            updateCartProduct: _.debounce(function() {
                this.qtyDisable = true;
                let updateData ={
                    rowId:this.cartRowId,
                    qty:this.proQty,
                };

                this.updateCart(updateData)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            this.$noty.success(response.message);
                        }else{
                            this.$noty.error(response.message);
                        }
                        this.qtyDisable = false;
                    })
            },700)
        },
        computed:{
            ...mapGetters([
                'cartList',
                'cartTotal',
                'cartSubTotal',
                'cartDiscount',
                'cartTotalPrice',
                'deliveryCost',
            ]),

        },
        watch: {
            proQty:function () {
                this.updateCartProduct();
            }
        }
    }
</script>

<style scoped>

</style>
