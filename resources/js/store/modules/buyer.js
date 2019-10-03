//declare State
const state = {
    buyer_list:[],
};

//declare Getters
const getters = {
    buyerList:(state)=>state.buyer_list,
};

const actions = {
    async getBuyerList({commit}, reqData=null){
        try {
            return await axios.get('/admin/buyer', reqData)
                .then(response=>{
                    commit('setBuyerList', response.data.data);
                    delete response.data.data;
                    return  response
                });
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async buyerStatusChange({commit},reqData){
        try {
            return await axios.post(`/admin/buyer/${reqData.Id}/change/status`,reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('statusChanging', response.data.data);
                        delete response.data.data;
                    }
                    return  response.data;
                });
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async buyerDelete({commit},ID){
        try {
            return await axios.delete(`/admin/buyer/${ID}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('deletingBuyer', ID);
                    }
                    return  response.data;
                });
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },


};

const mutations = {
    setBuyerList:(state, response)=>{
        if(response.hasOwnProperty('current_page')){
            state.buyer_list = response.data;
            delete response.data;
            state.paginate_data = response;
        }else{
            state.buyer_list = response
        }
    },
    statusChanging:(state, response)=>{
        state.buyer_list = state.buyer_list.filter(buyer=>{
            if(buyer.buyer_id == response.id){
                buyer.user.status = response.status;
            }
            return buyer;
        })
    },
    deletingBuyer:(state, buyerID)=>state.buyer_list = state.buyer_list.filter(buyer=>buyer.buyer_id !==buyerID)
};

export default {
    state,
    getters,
    actions,
    mutations,
}
