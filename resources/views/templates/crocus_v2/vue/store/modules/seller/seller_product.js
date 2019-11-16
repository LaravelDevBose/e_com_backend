
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
    async updateIndividualSellerProduct({commit}, formData){
        try {
            return await axios.put(`/buyer/seller/product/${formData.product_id}/update`, formData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },
    async deleteIndividualSellerProduct({commit}, slug){
        try {
            return await axios.delete(`/buyer/seller/product/${slug}`)
                .then(response=>{
                    if (typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeIndividualSellerProduct', slug);
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

    },
    removeIndividualSellerProduct:(state, slug)=>{
        state.products = state.products.filter(product=>{
            return product.product_slug !== slug;
        })
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
