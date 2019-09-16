import Vue from 'vue'
import Vuex from 'vuex'


Vue.use(Vuex);

import authentication from "./modules/authentication";
import product from "./modules/product";
import wishList from "./modules/wishList";
import cart from "./modules/cart";
import checkout from "./modules/checkout";

export default new Vuex.Store({
    state:{
        resData:'',
        errors:null,

    },
    getters:{

    },
    actions:{

    },
    mutations:{
        setResponse:(state, res)=>{
            state.resData = res;
        }
    },
    modules:{
        authentication,
        product,
        wishList,
        cart,
        checkout,
    }
})


