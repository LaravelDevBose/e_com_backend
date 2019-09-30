//declare State
const state = {
    buyer_list:[],
    paginate_data:{},
};

//declare Getters
const getters = {
    buyerList:(state)=>state.buyer_list,
    paginate:(state)=>state.paginate_data,
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
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
