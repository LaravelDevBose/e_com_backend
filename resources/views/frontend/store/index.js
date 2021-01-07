import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

import product_page from "./modules/product_page";
import cart from './modules/cart';
import auth from './modules/auth';
import checkout from './modules/checkout';
import payment from "./modules/payment";
import buyer from "./modules/buyer";
import wishlist from "./modules/wishlist";
import review from "./modules/review";
import search from "./modules/search";
export default new Vuex.Store({
    state:{
        response_info:{},
        paginate_data:[],
        category_list: [],
        brand_list: [],
        discount_products:[],
        new_arrivals:[],
        trending_products:[],
        recommended_products:[],
        page_list: [],
        company_info:{},
        page_info: {},
        most_rated_products:{},
    },
    getters:{
        responseInfo: state => state.response_info,
        categories: (state) => state.category_list,
        brands: state => state.brand_list,
        discountProducts: state => state.discount_products,
        newArrivals: state => state.new_arrivals,
        trendingProducts: state => state.trending_products,
        recommendedProducts: state => state.recommended_products,
        pages: state => state.page_list,
        companyInfo: state => state.company_info,
        pageInfo: state => state.page_info,
        mostRatedProducts: state => state.most_rated_products,
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
        async getMostRatedProducts({state}){
            try {
                await axios.get('/front/get-most_rated/products')
                    .then(({data})=>{
                        const chunk = (arr, size) => arr.reduce((acc, e, i) => (i % size ? acc[acc.length - 1].push(e) : acc.push([e]), acc), []);
                        state.most_rated_products = chunk(data.data, 2);
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
        async getCompanyInfo({state}){
            try {
                await axios.get('/front/company-info')
                    .then(({data})=>{
                        state.page_list = data.data.pages;
                        state.company_info = data.data.info;
                    })
            }catch (error){
                console.log(error);
            }
        },
        async getPageDetails({state}, slug){
            try {
                return await axios.get(`/front/${slug}/page-info`)
                    .then(({data})=>{
                        if (data.status === 200){
                            state.page_info = data.data;
                        }
                        return data;
                    })
            }catch (error){
                console.log(error);
            }
        },
        subscribeNewsletter({commit},formData){
            return axios.post('/subscribe', formData)
                .then(response=>{
                    return response.data;
                });
        }

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
        buyer,
        wishlist,
        review,
        search,
    }
})


