//declare State
const state = {
    order_list:[],
    order_info:[],
    order_status:[],
};

//declare Getters
const getters = {
    orderList:(state)=>state.order_list,
    order:(state)=>state.order_info,
    statusList:(state)=>state.order_status,
};

const actions = {
    async getOrderList({commit}, reqData){
        try {
            return await axios.post('/admin/order/list',reqData)
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
            return await axios.get(`/admin/order/${orderId}/details`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setOrderInfo', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async getOrderStatus({commit}){
        try {
            return await axios.get(`/admin/order/status`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setOrderStatus', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async orderStatusChange({commit}, reqData){
        try {
            return await axios.post('/admin/order/status/update',reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateOrderStatus', response.data.data);
                    }
                    delete response.data.data;
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
};

const mutations = {

    setOrderList:(state,response)=>{
        if(response.hasOwnProperty('current_page')){
            state.order_list = response.data;
            delete response.data;
            state.paginate_data = response;
        }else{
            state.order_list = response
        }
    },
    setOrderInfo:(state,response)=>state.order_info = response,
    setOrderStatus:(state,response)=>state.order_status = response,
    updateOrderStatus:(state, response)=>{
        state.order_list = state.order_list.filter(order=>{
            if(order.order_no === response.order_no){
                order.order_status = response.order_status;
                order.status_label = response.status_label;
                return order;
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
