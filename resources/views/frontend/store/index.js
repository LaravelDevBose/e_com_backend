import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

import product_page from "./modules/product_page";
import cart from './modules/cart';
import auth from './modules/auth';
import checkout from './modules/checkout';
import payment from "./modules/payment";
import buyer from "./modules/buyer";

export default new Vuex.Store({
    state:{
        response_info:{},
        paginate_data:[],
        category_list: [],
        brand_list: [],
        slider_list: [],
        discount_products:[],
        new_arrivals:[],
        trending_products:[],
        recommended_products:[],

    },
    getters:{
        responseInfo: state => state.response_info,
        categories: (state) => state.category_list,
        brands: state => state.brand_list,
        sliders: state => state.slider_list,
        discountProducts: state => state.discount_products,
        newArrivals: state => state.new_arrivals,
        trendingProducts: state => state.trending_products,
        recommendedProducts: state => state.recommended_products,
    },
    actions:{
        async getCategories({commit}){
            try {
                await axios.get('/front/get-categories')
                    .then(({data})=>{
                        commit('setCategoryList', data.data);
                })
            }catch (error){
                console.log(error);
            }
        },
        async getBrands({state}){
            try {
                await axios.get('/front/get-brands')
                    .then(({data})=>{
                        state.brand_list = data.data;
                    })
            }catch (error){
                console.log(error);
            }
        },
        async getSliders({state}){
            try {
                await axios.get('/front/get-sliders')
                    .then(({data})=>{
                        state.slider_list = data.data;
                    })
            }catch (error){
                console.log(error);
            }
        },
        async getDiscountProducts({state}){
            try {
                await axios.get('/front/get-discount/products')
                    .then(({data})=>{
                        state.discount_products = data.data;
                    })
            }catch (error){
                console.log(error);
            }
        },
        async getNewArrivalProducts({state}){
            try {
                await axios.get('/front/get-new-arrival/products')
                    .then(({data})=>{
                        state.new_arrivals = data.data;
                    })
            }catch (error){
                console.log(error);
            }
        },
        async getTrendingProducts({state}){
            try {
                await axios.get('/front/get-trending/products')
                    .then(({data})=>{
                        state.trending_products = data.data;
                    })
            }catch (error){
                console.log(error);
            }
        },
        async getRecommendedProducts({state}){
            try {
                await axios.get('/front/get-recommended/products')
                    .then(({data})=>{
                        state.recommended_products = data.data;
                    })
            }catch (error){
                console.log(error);
            }
        },
    },
    mutations:{
        setCategoryList:(state, response)=> state.category_list = response,
        updateResponse:(state, response)=> state.response_info = response,
    },
    modules:{
        product_page,
        cart,
        auth,
        checkout,
        payment,
        buyer
    }
})


