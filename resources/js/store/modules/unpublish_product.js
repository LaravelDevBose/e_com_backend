//declare State
const state = {
    unPublish_products:[],
};

//declare Getters
const getters = {
    unPublishProducts:(state)=>state.unPublish_products,
};

const actions = {
    async getUnPublishProducts({commit},reqData){
        try {
            await axios.get('/admin/un-publish/products',reqData)
                .then(response=>{
                    commit('setUnPublishProduct', response.data.data);
                });
        }catch (error) {
            commit('setResponse', error.data);
        }
    },

    async productsStatusUpdate({commit}, formData){
        try {
            return await axios.post('/admin/products/status/change',formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeUpdatedProducts', formData.productIds);
                    }
                    return response.data;
                });
        }catch (error) {
            commit('setResponse', error.data);
        }
    },

};

const mutations = {
    setUnPublishProduct:(state, response)=>{
        console.log(response);
        state.unPublish_products = response
    },
    removeUpdatedProducts:(state,response)=>{
        state.unPublish_products  = state.unPublish_products.filter(product=>{
            if(response.indexOf(product.id) <= -1){
                return product;
            }
        });
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
