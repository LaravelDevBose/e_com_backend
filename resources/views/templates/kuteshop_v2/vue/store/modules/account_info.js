//declare State
const state = {
    buyer_details:{},
};

//declare Getters
const getters = {
    buyerInfo:(state)=>state.buyer_details,
};

const actions = {
    async getBuyerDetails({commit}){
        return  await axios.get('/buyer/info')
            .then(response=>{
                if(typeof response.data.code !== "undefined" && response.data.code === 200){
                    commit('setBuyerDetails', response.data.data);
                    delete response.data.data;
                }
                return response.data;
            });
    },

    async buyerInfoUpdate({commit}, formData){
        return  await axios.post('/buyer/info/update', formData)
            .then(response=>{
                return response.data;
            });
    },
};

const mutations = {
    setBuyerDetails:(state,response)=>state.buyer_details = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
