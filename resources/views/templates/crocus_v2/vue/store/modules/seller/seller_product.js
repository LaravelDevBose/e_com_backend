
const state = {
    categories:[],
    brands:[],
    products:[],
    conditions:[],
    edit_product:'',
    category_info:'',
};

//declare Getters
const getters = {
    brandList:(state)=>state.brands,
    treeList:(state)=>state.categories,
    conditionList:(state)=>state.conditions,
    individualSellerProducts:(state)=>state.products,
    editProduct:(state)=>state.edit_product,
    categoryInfo:(state)=>state.category_info,
};

const actions = {
    async getProductCreateDependency({commit}){
        try {
            return await axios.get('/buyer/seller/product/create/dependency')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setProductCreateDependency', response.data.data)
                    }
                    delete response.data.data;
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },
    async storeIndividualSellerProduct({commit}, formData){
        try {
            return await axios.post('/buyer/seller/product', formData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },

    async getIndividualSellerProducts({commit}){
        try {
            return await axios.get('/buyer/seller/product/list')
                .then(response=>{
                    if (typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setIndividualSellerProducts', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },
    async getEditProductInfo({commit}, productId){
        try {
            return await axios.get(`/buyer/seller/product/${productId}`)
                .then(response=>{
                    if (typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setEditProductInfo', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },

};

const mutations = {
    setProductCreateDependency:(state, response)=>{
        state.categories = response.categories;
        state.brands = response.brands;
        state.conditions = response.conditions;
    },
    setIndividualSellerProducts:(state,response)=>state.products= response,
    setEditProductInfo:(state, response)=>{
        state.edit_product = response.product;
        state.category_info = response.categoryInfo;

    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
