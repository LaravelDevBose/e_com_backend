
const state = {
    categories:[],
    brands:[],
    products:[],
    conditions:[],
};

//declare Getters
const getters = {
    brandList:(state)=>state.brands,
    treeList:(state)=>state.categories,
    conditionList:(state)=>state.conditions,
    products:(state)=>state.products,
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

};

const mutations = {
    setProductCreateDependency:(state, response)=>{
        state.categories = response.categories;
        state.brands = response.brands;
        state.conditions = response.conditions;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
