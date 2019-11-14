
const state = {
    order_list:[],
};

//declare Getters
const getters = {
    individualSellerOrders:(state)=>state.order_list,
};

const actions = {
    async getIndividualSellerOrders({commit},reqData){
        try {
            return await axios.get('/buyer/seller/order/list',{reqData})
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setIndividualSellerOrders', response.data.data)
                    }
                    delete response.data.data;
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    },
    async orderStatusChange({commit},reqData){
        try {
            return await axios.post('/buyer/seller/order/status/change',reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setOrderStatusChange', response.data.data)
                    }
                    delete response.data.data;
                    return response.data;
                })
        }catch (error) {
            console.log(error.data);
            return  error.data;
        }
    }
};

const mutations = {
    setIndividualSellerOrders:(state,response)=>state.order_list= response,
    setOrderStatusChange:(state,response)=>{
        state.order_list = state.order_list.filter(orderItem=>{
            if(orderItem.item_id === response.item_id){
                orderItem.item_status = response.item_status;
                orderItem.item_status_label = response.item_status_label;
                return orderItem;
            }
        })
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
