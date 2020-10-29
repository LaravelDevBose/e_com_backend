<template>
    <span>
        <!-- block mini cart -->
        <div class="block-minicart dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <span class="cart-icon"></span>
                <span class="counter qty">
                        <span class="cart-text">cart</span>
                        <span class="counter-number">{{ cartTotal}}</span>
                        <span class="counter-label">{{ cartTotal }} <span>Item(s)</span></span>
                        <span class="counter-price">{{ cartTotalPrice }}</span>
                    </span>
            </a>
            <header-cart-dropdown></header-cart-dropdown>
        </div>
        <!-- block mini cart -->


        <!-- link  Login-->
            <router-link v-if="!isAuthenticated" to="/login" class="link-login"><span>Login</span></router-link>
            <div class="dropdown link-login setting" v-if="isAuthenticated">
                <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>Login</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                <div class="dropdown-menu  ">
                    <ul class="account">
                        <li>
                            <router-link  to="/buyer/dashboard">Dashboard</router-link>
                        <li>
                            <router-link  to="/buyer/wishlist">WishList</router-link>
                        </li>
                        <li>
                            <router-link  to="/buyer/reviews">Review</router-link>
                        </li>
                        <li>
                            <a  href="#" @click.prevent="logoutUser()">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        <!-- link  Login-->

        <!-- link  wishlish-->
            <router-link  to="/buyer/wishlist" class="link-wishlist"><span>wishlist</span></router-link>
        <!-- link  wishlish-->
    </span>
</template>

<script>
import HeaderCartDropdown from "./cart/HeaderCartDropdown";
import {mapActions, mapGetters} from 'vuex';
export default {
    name: "HeaderRightSection",
    components: {HeaderCartDropdown},
    data(){
        return{
            token: localStorage.getItem('token') || ''
        }
    },
    mounted() {
        this.getCartDetails();
    },
    methods:{
        ...mapActions(['getCartDetails', 'logout']),
        logoutUser(){
            this.logout()
            .then(response=>{
                if(typeof response.status !== "undefined" && response.status === 200){
                    this.$router.push('/');
                }
            })
        }
    },
    computed:{
        ...mapGetters(['cartTotal', 'cartTotalPrice', 'isAuthenticated'])
    }
}
</script>

<style scoped>

</style>
