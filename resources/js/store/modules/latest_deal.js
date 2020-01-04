//declare State
const state = {
    latest_deal:{},
    deal_products:[],
};

//declare Getters
const getters = {
    latestDeal:(state)=> state.latest_deal,
    dealProducts:(state)=>state.deal_products,
};

const actions = {
    async getLatestDealData({commit}){
        try {
            await axios.get('/admin/latest/deal/data')
                .then(response=>{
                    if(typeof  response.code !== "undefined" && response.data.code === 200){
                        commit('setLatestDealData', response.data.data);
                    }
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeUpdateLatestDeal({commit}, formData){
        try {
            return  await axios.post('/admin/latest/deal/store/update', formData)
                .then(response=>{
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
};

const mutations = {
    setLatestDealData:(state, response)=>{
        state.deal_products = response.deal_products;
        delete response.deal_products;
        state.latest_deal = response
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
