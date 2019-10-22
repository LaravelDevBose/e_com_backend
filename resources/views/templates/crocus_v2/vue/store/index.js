import Vue from 'vue'
import Vuex from 'vuex'


Vue.use(Vuex);

import authentication from "./modules/authentication";
import product from "./modules/product";
import wishList from "./modules/wishList";
import cart from "./modules/cart";
import checkout from "./modules/checkout";
import order from "./modules/order";
import address_book from "./modules/address_book";
import homepage from "./modules/homepage";
import account_info from "./modules/account_info";
import search from "./modules/search";


export default new Vuex.Store({
    state:{
        resData:'',
        errors:null,
        paginate:{},

    },
    getters:{
        pagination:(state)=>state.paginate,
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
        order,
        address_book,
        homepage,
        account_info,
        search,
    }
})


