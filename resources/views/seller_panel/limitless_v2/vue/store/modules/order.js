//declare State
const state = {
    order_item_list:[],
    order_item_paginate:{},
    order_item_status:[],
};

//declare Getters
const getters = {
    orderItemList:(state)=>state.order_item_list,
    order:(state)=>state.order_info,
    paginateInfo:(state)=>state.order_item_paginate,
    itemStatusList:(state)=>state.order_item_status,
};

const actions = {
    async getOrderItemList({commit}, reqData){
        try {
            return await axios.post('/seller/order/item/list',reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setOrderItemList', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async getOrderItemStatus({commit}){
        try {
            return await axios.get(`/seller/order/item/status`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setOrderItemStatus', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async orderItemStatusChange({commit}, reqData){
        try {
            return await axios.post('/seller/order/item/status/update',reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateOrderItemStatus', response.data.data);
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

    setOrderItemList:(state,response)=>{
        if(response.hasOwnProperty('current_page')){
            state.order_item_list = response.data;
            delete response.data;
            state.order_item_paginate = response;
        }else{
            state.order_item_list = response
        }
    },
    setOrderItemStatus:(state,response)=>state.order_item_status = response,
    updateOrderItemStatus:(state, response)=>{
        state.order_item_list = state.order_item_list.filter(orderItem=>{
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
