//declare State
const state = {
    orders:{},
    order_info:{},
    order_paginate:{},

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
            return await axios.get(`/buyer/order/${orderId}/invoice`)
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
    async cancelOrderItem({commit},itemId){
        try {
            return await axios.get(`/buyer/order/item/${itemId}/cancel`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setOrderItemCancel', itemId);
                    }
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
            state.orders = response.data;
            delete response.data;
            state.paginate = response;
        }else{
            state.orders = response
        }
    },
    setOrderInfo:(state, response)=>state.order_info = response,
    setOrderItemCancel:(state, itemId)=>{
        state.order_info.order_items  = state.order_info.order_items.filter(orderItem=>{
            if(orderItem.item_id === itemId){
                orderItem.item_status = 2;
                orderItem.item_status_label = 'Cancel';
            }
            return orderItem;
        })
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
