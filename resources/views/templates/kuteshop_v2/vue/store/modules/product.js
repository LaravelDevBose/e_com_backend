
const state = {
    show_in:false,
    modal_product:{},
    brands:[],
    colors:[],
    tags:[],
    sizes:[],
    products:[],
    hot_products:[],
};

//declare Getters
const getters = {
    showModal:(state)=>state.show_in,
    modal_product:(state)=>state.modal_product,
    brands:(state)=>state.brands,
    colors:(state)=>state.colors,
    tags:(state)=>state.tags,
    sizes:(state)=>state.sizes,
    productsData:(state)=>state.products,
    hotProducts:(state)=>state.hot_products,
};

const actions = {
    productQuickView({commit}, product){
        commit('setQuickViewProduct', product);
    },
    modalClose(){
        Vue.set(state,'show_in', false);
    },
    async getProductSidebar({commit},reqData){
        try {
            return await axios.post('/product/sidebar/data', reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setProductSidebarData', response.data.data)
                    }
                    delete response.data.data;
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },
    async getCategoryWishProducts({commit},reqData){
        try {
            return await axios.get(`/category/${reqData.slug}/products`, reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setProductsData', response.data.data)
                    }
                    delete response.data.data;
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },

    async getSortingProducts({commit},sortData){
        try {
            return await axios.post(`/shorting/products`, sortData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setProductsData', response.data.data);
                        delete response.data.data;
                    }

                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },
    async getProductVariationInfo({commit},productId){
        try {
            return await axios.get(`/product/variations/data`,{
                params:{
                    product_id:productId,
                }
            })
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setProductsVariationInfo', response.data.data);
                        delete response.data.data;
                    }

                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },
    getHotProducts({commit}){
        try {
            axios.get('/get/hot/products')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setHotProducts', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    }
};

const mutations = {
    setQuickViewProduct:(state, product)=>{
        state.modal_product = product;
        state.show_in = true;
    },
    setProductSidebarData:(state, response)=>{
        state.brands = response.brands;
        state.colors = response.colors;
        state.tags = response.tags;
        state.sizes = response.sizes;
    },
    setProductsData:(state,response)=>{
        if(response.hasOwnProperty('current_page')){
            state.products = response.data;
            delete response.data;
            state.paginate = response;
        }else{
            state.products = response
        }
    },
    setProductsVariationInfo:(state, response)=>{
        state.colors = response.colorInfos;
        state.sizes = response.sizeInfos;
    },
    setHotProducts:(state,response)=>{
        state.hot_products = response;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
