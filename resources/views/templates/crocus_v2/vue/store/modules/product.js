//declare State
const state = {
    show_in:false,
    modal_product:{},
};

//declare Getters
const getters = {
    showModal:(state)=>state.show_in,
    modal_product:(state)=>state.modal_product,
};

const actions = {
    productQuickView({commit}, product){
        commit('setQuickViewProduct', product);
    },
    modalClose(){
        Vue.set(state,'show_in', false);
    }
};

const mutations = {
    setQuickViewProduct:(state, product)=>{
        state.modal_product = product;
        state.show_in = true;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
