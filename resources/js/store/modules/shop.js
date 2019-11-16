//declare State
const state = {
    shop_list:[],
    paginate_data:{},
    shop_status:[],

    shop_info:{},
    seller_info:{},
    overview_report:{},
    latest_orders:[],
    shop_orders:[],
    shop_products:[],
    shop_reports:[],
};

//declare Getters
const getters = {
    shopStatus:(state)=>state.shop_status,
    shopList:(state)=>state.shop_list,
    shopInfo:(state)=>state.shop_info,
    sellerInfo:(state)=>state.seller_info,
    overviewReport:(state)=>state.overview_report,
    latestOrders:(state)=>state.latest_orders,
    shopOrders:(state)=>state.shop_orders,
    shopProducts:(state)=>state.shop_products,
    shopReports:(state)=>state.shop_reports,

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
    async getShopInfoSectionData({commit}, reqData){
        try {
            return await axios.get(`/admin/shop/${reqData.seller_id}`, reqData)
                .then(response=>{
                    commit('setShopInfoData', response.data.data);
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
    removeShop:(state, sellerId)=>state.shop_list = state.shop_list.filter(shop=>shop.seller_id !== sellerId),
    setShopInfoData:(state, response)=>{
        state.shop_info = response.shop_info;
        state.seller_info = response.seller_info;
        state.overview_report = response.overview_report;
        state.latest_orders = response.latest_orders;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
