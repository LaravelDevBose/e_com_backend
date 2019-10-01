//declare State
const state = {
    shop_list:[],
    paginate_data:{},
    shop_status:[],
};

//declare Getters
const getters = {
    shopStatus:(state)=>state.shop_status,
    shopList:(state)=>state.shop_list,
    paginate:(state)=>state.paginate_data,
};

const actions = {
    async getShopStatus({commit}){
        try {
            return await axios.get('/admin/shop/status')
                .then(response=>{
                    commit('setShopStatus', response.data.data);
                    delete response.data.data;
                    return  response
                });
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getShopList({commit}, reqData=null){
        try {
            return await axios.get('/admin/shop', reqData)
                .then(response=>{
                    commit('setShopList', response.data.data);
                    delete response.data.data;
                    return  response
                });
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async shopStatusChange({commit},reqData){
        try {
            return await axios.post(`/admin/shop/${reqData.sellerId}/change/status`,reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setShopStatusUpdate', response.data.data);
                        delete response.data.data;
                    }
                    return  response.data;
                });
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async shopDelete({commit},ID){
        try {
            return await axios.delete(`/admin/shop/${ID}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeShop', ID);
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
    setShopStatus:(state, response)=>state.shop_status = response,
    setShopList:(state, response)=>{
        if(response.hasOwnProperty('current_page')){
            state.shop_list = response.data;
            delete response.data;
            state.paginate_data = response;
        }else{
            state.shop_list = response
        }
    },
    setShopStatusUpdate:(state, response)=>{
        state.shop_list = state.shop_list.filter(shop=>{
            if(shop.seller_id == response.seller_id){
                shop.shop_status = response.status;
                shop.status_label = response.status_label;
            }
            return shop;
        })
    },
    removeShop:(state, sellerId)=>state.shop_list = state.shop_list.filter(shop=>shop.seller_id !== sellerId)
};

export default {
    state,
    getters,
    actions,
    mutations,
}
