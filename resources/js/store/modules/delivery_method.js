//declare State
const state = {
    delivery_methods:[],
    delivery_method:{},
};

//declare Getters
const getters = {
    deliveryMethods:(state)=>state.delivery_methods,
    deliveryMethod:(state)=> state.delivery_method,
};

const actions = {
    async getDeliveryMethodList({commit}){
        try {
            await axios.get('/admin/delivery/method/list')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setDeliveryMethodList', response.data.data);
                    }
                    return response.data
                })
        }catch (error) {
            return error;
        }
    },
    async storeDeliveryMethod({commit}, fromData){
        try {
            return  await axios.post('/admin/delivery/method/store', fromData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('deliveryMethodStore', response.data.data)
                        delete response.data.data;
                    }
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async updateDeliveryMethodInfo({commit},formData){
        try {
            return await axios.put(`/admin/delivery/method/${formData.id}/update`, formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateDeliveryMethodData', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            return  error.data;
        }
    },
    async deleteDeliveryMethod({commit}, deliveryId){
        try {
            return await axios.delete(`/admin/delivery/method/${deliveryId}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeDeliveryMethod', deliveryId);
                    }
                    commit('setResponse', response.data);
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
            return error.data;
        }
    }
};

const mutations = {

    setDeliveryMethodList:(state,response)=>state.delivery_methods = response,
    deliveryMethodStore:(state,response)=> state.delivery_methods.unshift(response),
    removeDeliveryMethod:(state, deliveryId)=>state.delivery_methods = state.delivery_methods.filter(method=>method.id !== deliveryId),
    updateDeliveryMethodData:(state,response)=>{
        console.log(response);
        state.delivery_methods = state.delivery_methods.filter(method=>{
            if(method.id === response.id){
                method.title = response.title;
                method.min_days = response.min_days;
                method.max_days = response.max_days;
                method.charge = response.charge;
                method.status = response.status;
                method.status_label = response.status_label;
            }
            return method;
        });
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
