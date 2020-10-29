<template>
    <li class="product-item" v-if="cart">
        <router-link
            :to="{name: 'Product', params:{slug: cart.options.slug}}"
            class="product-item-photo"
            :title="cart.name"
        >
            <img class="product-image-photo"
                 v-if="cart.options.image"
                 :src="cart.options.image"
                 :alt="cart.name"
                 style="height: 60px"
            >

            <img class="product-image-photo"
                 v-else
                 :src="$baseUrl+'/images/loader.gif'"
                 :alt="cart.name"
                 style="height: 60px"
            >
        </router-link>
        <div class="product-item-details">
            <strong class="product-item-name">
                <router-link
                    :to="{name: 'Product', params:{slug: cart.options.slug}}"
                    :title="cart.name"
                >
                    {{ cart.name}}
                </router-link>
            </strong>
            <div class="product-item-price">
                <span class="price">Price: {{ cart.price}}</span>
                <span class="old-price" v-if="cart.options.old_price" style="float: right;">
                    <del>{{ cart.options.old_price}}</del>
                </span>
            </div>
            <div class="product-item-qty">
                <span class="label">Qty: </span>
                <span class="number">{{ cart.qty }}</span>
                <a class="action " style="float: right; color: red;" href="#" title="Remove item" @click.prevent="removeFromCart(cart.rowId)">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <div class="product-item-qty">
                <span class="label" v-if="cart.options.color">Color: </span><b class="number">{{ cart.options.color }}</b>
                <span class="label" v-if="cart.options.size" style="margin-left: 5px;">Size: </span><b class="number">{{ cart.options.size }}</b>
            </div>

        </div>
    </li>
</template>

<script>
import {mapActions} from 'vuex';
export default {
    name: "CartDropdownItem",
    props:{
        cart: Object
    },
    methods:{
        ...mapActions(['removeFromCart'])
    }
}
</script>

<style scoped>

</style>
