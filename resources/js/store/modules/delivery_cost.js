//declare State
const state = {
    deliveryArea:
        [   {id:1, text:'Inside Of Dhaka'},
            {id:2, text:'Outside Of Dhaka'},
        ],
    allCosts:'',
};

//declare Getters
const getters = {
    deliveryAreas:(state)=>state.deliveryArea,
    deliveryCosts:(state)=>state.allCosts,
};

const actions = {
    async getDeliveryCost({commit}){
        try {
            await axios.get('/admin/delivery-costs').then(response=>{
                commit('setDeliveryCost', response.data.data);
            }).catch(errors=>{
                commit('setResponse', errors.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeDeliveryCost({commit}, formData){
        try {
            return await axios.post('/admin/delivery-cost/store',formData)
                .then(response=>{
                    commit('deliveryCostStore', response.data.cost);
                    commit('setResponse', response.data.res);
                    return response.data.res;
                })
                .catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteDeliveryCost({commit}, costID){
        try {
            return await axios.delete(`/admin/delivery-cost/delete/${costID}`)
                .then(response=>{
                    console.log(response);

                    commit('removeDeliveryCost', costID);
                    commit('setResponse',response.data);
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    setDeliveryCost:(state, response)=> state.allCosts = response,
    deliveryCostStore:(state, response)=>state.allCosts.unshift(response),
    removeDeliveryCost:(state, costID)=>state.allCosts = state.allCosts.filter(cost =>cost.id !== parseInt(costID)),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
