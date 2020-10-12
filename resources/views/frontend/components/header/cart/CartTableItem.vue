<template>
    <tr v-if="cart">
        <td class="cart_product">
            <router-link :to="{ name: 'Product', params:{ slug: cart.options.slug } }" >
                <clazy-load :src="cart.options.image">
                    <img :title="cart.name" :src="cart.options.image" style="width:100%; height:auto;">
                    <div class="preloader" slot="placeholder">
                        <img :title="cart.name" :src="$baseUrl+'/images/loader.gif'" style="width:100%; height:auto;">
                    </div>
                </clazy-load>
            </router-link>
        </td>
        <td class="cart_description">
            <p class="product-name">
                <router-link :to="{ name: 'Product', params:{ slug: cart.options.slug } }" >
                    {{ cart.name }}
                </router-link>
            </p>
            <small class="cart_ref" v-if="cart.options.old_price > 0">old Price: {{ cart.options.old_price }}</small><br>
            <small v-if="cart.color">Color : {{ cart.color}}</small><br>
            <small v-if="cart.size">Size : {{ cart.size}}</small>
        </td>
        <td class="price"><span>{{ cart.price }}</span></td>
        <td class="qty">

            <input
                type="text"
                minlength="1"
                maxlength="12"
                name="qty0"
                id="qty0"
                v-model="qty"
                class="form-control input-sm"

            >
            <span  @click.prevent="increaseQty()" class="btn-number"><i class="fa fa-caret-up"></i></span>
            <span  @click.prevent="reducedQty()"  class="btn-number"><i class="fa fa-caret-down"></i></span>
        </td>
        <td class="price">
            <span>{{ cart.price * qty }}</span>
        </td>
        <td class="action">
            <a href="#" @click="removeCartItem()">Delete item</a>
        </td>
    </tr>
</template>

<script>
import {mapActions} from 'vuex';
import _ from 'lodash';
export default {
    name: "CartTableItem",
    props:{
        cart: Object,
    },
    data(){
        return{
            qty: this.cart.qty,
        }
    },
    methods:{
        ...mapActions([
            'removeFromCart',
            'updateCart'
        ]),
        removeCartItem(){
            this.removeFromCart(this.cart.rowId);
        },
        cartDataUpdate: _.debounce(function (){
            const cartData = {
                rowId: this.cart.rowId,
                qty: this.qty,
            }
            this.updateCart(cartData);
        }, 1200),
        increaseQty(){
            this.qty ++;
        },

        reducedQty(){
            this.qty --;
            if(this.qty < 1){
                this.$noty.warning('Min 1 Qty Required');
                this.qty =1 ;
            }
        },
    },
    watch:{
        qty: {
            handler(newVal, oldVal){
                if (newVal !== oldVal){
                    this.cartDataUpdate();
                }
            }
        }
    }
}
</script>

<style scoped>

</style>
