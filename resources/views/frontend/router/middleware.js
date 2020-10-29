import Vue from 'vue';
import store from '../store';



const ifNotAuthenticated = (to, from, next) => {
    if (!store.getters.isAuthenticated) {
        next();
        return;
    }else if (store.getters.cartTotal && store.getters.cartTotal > 0){
        next('/checkout');
        return ;
    }else{
        next('/buyer/dashboard');
    }

}

const ifAuthenticated = (to, from, next) => {
    if (store.getters.isAuthenticated) {
        next();
        return;
    }
    next('/login');
}

const ifAuthenticatedAndHaveCartItem = (to, form, next) =>{
    if (store.getters.isAuthenticated && store.getters.cartTotal && store.getters.cartTotal > 0){
        next();
    }if (!store.getters.isAuthenticated && store.getters.cartTotal && store.getters.cartTotal > 0){
        next('/login');
    }else {
        store.commit('updateResponse', {message: "Cart is Empty", type: 'Warning'});
        next(form);
    }
}
const ifHaveCartItem = (to, form, next) =>{
    if (store.getters.cartTotal && store.getters.cartTotal > 0){
        next();
    }else {
        store.commit('updateResponse', {message: "Cart is Empty", type: 'Warning'});
        next(form);
    }
}

export default {
    ifNotAuthenticated,
    ifAuthenticated,
    ifAuthenticatedAndHaveCartItem,
    ifHaveCartItem

}
