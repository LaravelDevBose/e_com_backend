//declare State
const state = {
    orders:{},
    order_info:{},
};

//declare Getters
const getters = {
    orderList:(state)=>state.orders,
    orderInfo:(state)=>state.order_info,
};

const actions = {
    async getOrderList({commit},reqData){
        try {
            console.log(reqData);
            return await axios.post('/buyer/order/list', reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setOrderList', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async getOrderInfo({commit},orderId){
        try {
            return await axios.get(`/buyer/order/${orderId}/show`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setOrderList', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    }

};

const mutations = {
    setOrderList:(state,response)=>{
        if(response.hasOwnProperty('current_page')){
            state.orders = response.data;
            delete response.data;
            state.paginate = response;
        }else{
            state.orders = response
        }
    },
    setOrderInfo:(state, response)=>state.order_info = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
