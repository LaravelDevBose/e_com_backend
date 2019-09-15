<template>
    <fieldset>
        <table class="data-table cart-table" id="shopping-cart-table">
            <colgroup>
                <col width="1">
                <col>
                <col width="1">
                <col width="1">
                <col width="1">
                <col width="1">
                <col width="1">
            </colgroup>
            <thead>
                <tr class="first last">
                    <th rowspan="1">&nbsp;</th>
                    <th rowspan="1"><span class="nobr">Product Name</span></th>
                    <th rowspan="1"></th>
                    <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                    <th class="a-center" rowspan="1">Qty</th>
                    <th colspan="1" class="a-center">Subtotal</th>
                    <th class="a-center" rowspan="1">&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <tr v-if="cartTotal > 0" v-for="(cart,index) in  cartList"  :class="{'first':index === 0, 'last':(index+1) === cartList.length ,'even': index % 2 === 0, 'odd': index % 2 !== 0 }">
                    <td class="image">
                        <a class="product-image" :title="cart.name" :href="cart.options.product_url">
                            <img width="75" :alt="cart.name" :src="cart.options.image">
                        </a>
                    </td>
                    <td>
                        <h2 class="product-name">
                            <a :href="cart.options.product_url" >{{ cart.name }}</a>
                        </h2>
                    </td>
                    <td class="a-center">
                        <a title="Edit item parameters" class="edit-bnt" href="#configure/id/15945/"></a>
                    </td>
                    <td class="a-right">
                        <span class="cart-price">
                            <span class="price">{{ cart.price }}</span>
                        </span>
                    </td>
                    <td class="a-center movewishlist">
                        <input maxlength="12" class="input-text qty" title="Qty" size="4" :value="cart.qty" name="cart[15945][qty]">
                    </td>
                    <td class="a-right movewishlist">
                        <span class="cart-price">
                            <span class="price">{{ cart.price*cart.qty }}</span>
                        </span>
                    </td>
                    <td class="a-center last">
                        <a class="button remove-item" title="Remove item" href="#" @click.prevent="productRemoveFromCart(cart.rowId)">
                            <span><span>Remove item</span></span>
                        </a>
                    </td>
                </tr>
                <tr v-else class="last even">
                    <td><span>Cart is Empty </span></td>
                </tr>
            </tbody>
            <tfoot>
            <tr class="first last">
                <td class="a-right last" colspan="50">
                    <button onClick="setLocation('#')" class="button btn-continue" title="Continue Shopping" type="button">
                        <span>Continue Shopping</span>
                    </button>
                    <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit">
                        <span>Update Cart</span>
                    </button>
                    <button @click.prevent="cartDestroy()" id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="button">
                        <span>Clear Cart</span>
                    </button>
                </td>
            </tr>
            </tfoot>
        </table>
    </fieldset>
</template>

<script>
    import {mapGetters,mapActions} from 'vuex';
    export default {
        name: "CartListTable",
        data(){
            return{

            }
        },
        updated(){
            this.isEmptyCart();
        },
        methods:{
            ...mapActions([
                'removeFromCart',
                'destroyCart',
            ]),
            productRemoveFromCart(rowId){
                this.removeFromCart(rowId)
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            //TODO  User Alert Function
                            alert(response.message);
                        }else{
                            alert(response.message);
                        }
                    })
            },
            goToCheckoutPage(){
                if(AppStorage.getWhoIs() === 'buyer'){
                    location.href = '/checkout';
                }else{
                    location.href = '/login';
                }
            },
            cartDestroy(){
                this.destroyCart()
                    .then(response=>{
                        if(typeof response.code !== "undefined" && response.code === 200){
                            //TODO  User Alert Function
                            alert(response.message);
                            location.href = '/';
                        }else{
                            alert(response.message);
                        }
                    })
            }
        },
        computed:{
            ...mapGetters([
                'cartList',
                'cartTotal'
            ]),
            isEmptyCart(){
                if(this.cartTotal === 0){
                    location.href = '/';
                }
                console.log('empty');
            }
        },
    }
</script>

<style scoped>

</style>
