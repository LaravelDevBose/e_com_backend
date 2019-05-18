//declare State
const state = {
    addedProductIDs:[]
};

//declare Getters
const getters = {
    selectedProductIDs:(state)=> state.addedProductIDs,
};

const actions = {
    addedProducts({commit}, productIds){
        commit('setProductIds', productIds);
    }
};

const mutations = {
    setProductIds:(state, productIds)=>state.addedProductIDs = productIds,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
