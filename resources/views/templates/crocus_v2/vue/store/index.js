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
import seller_product from "./modules/seller/seller_product";
import productHelper from "./modules/helper/productHelper";
import imageCropper from "./modules/helper/imageCropper";
import seller_order from "./modules/seller/seller_order";
import review from "./modules/review";

export default new Vuex.Store({
    state:{
        resData:'',
        errors:null,
        paginate:{},
        region_list:[
            {key:'Awdal',       name:'Awdal'},
            {key:'Bakool',      name:'Bakool'},
            {key:'Banaadir',    name:'Banaadir'},
            {key:'Bari',        name:'Bari'},
            {key:'Baay',        name:'Baay'},
            {key:'Galguduud',   name:'Galguduud'},
            {key:'Gedo',        name:'Gedo'},
            {key:'Hiiraan',     name:'Hiiraan'},
            {key:'Jubbada Dhexe',name:'Jubbada Dhexe'},
            {key:'Jubbada Hoose',name:'Jubbada Hoose'},
            {key:'Mudug',       name:'Mudug'},
            {key:'Nugaal',      name:'Nugaal'},
            {key:'Sanaag',      name:'Sanaag'},
            {key:'Shabeellaha', name:'Shabeellaha'},
            {key:'Shabeellaha Hoose',name:'Shabeellaha Hoose'},
            {key:'Sool',        name:'Sool'},
            {key:'Togdheer',    name:'Togdheer'},
            {key:'Woqooyi Galbeed',name:'Woqooyi Galbeed'},
        ],
    },
    getters:{
        regions:(state)=>state.region_list,
        pagination:(state)=>state.paginate,
    },
    actions:{
        changeLanguage({commit},lang){
            return axios.get(`/set/language/${lang}`)
                .then(response=>{
                    return response.data;
                });
        },
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
        seller_product,
        productHelper,
        imageCropper,
        seller_order,
        review,
    }
})


