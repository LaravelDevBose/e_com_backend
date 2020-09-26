//declare State
const state = {
    seller_data:{},
    seller_list:[],
    seller_select_list: [],
};

//declare Getters
const getters = {
    sellerData:(state)=> state.seller_data,
    sellerList:(state)=>state.seller_list,
    sellerListData:(state)=> state.seller_select_list,
};

const actions = {
    async getSellerData({commit}, sellerId){
        try {
            await axios.get(`/admin/seller/${sellerId}`)
                .then(response=>{
                    commit('setSellerData', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getSellerList({commit}){
        try {
            await axios.get('/admin/seller/list')
                .then(response=>{
                    commit('setSellerList', response.data.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getSellerSelectList({commit}){
        try {
            await axios.get('/admin/seller/select/list')
                .then(response=>{
                    commit('setSellerSelectList', response.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeSellerData({commit}, from){
        try {
            return  await axios.post('/admin/seller/store', from)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('storeSeller', response.data.data);
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
    async updateSellerData({commit},fromData){
        try {
            return await axios.put(`/admin/seller/${fromData.id}/update`, fromData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateSellerData', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            return  error.data;
        }
    },
    async deleteSeller({commit}, brandID){
        try {
            return await axios.delete(`/admin/seller/${brandID}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeSeller', brandID);
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
    storeSeller:(state,response)=> state.seller_list.unshift(response),
    removeSeller:(state, sellerId)=>state.seller_list = state.seller_list.filter(seller=>seller.id !==sellerId),
    setSellerList:(state,response)=>state.seller_list = response,
    setSellerData:(state,response)=>state.seller_data = response,
    setSellerSelectList:(state,response)=>state.seller_select_list = response,
    updateSellerData:(state,response)=>{
        state.seller_list = state.seller_list.filter(seller=>{
            if(seller.id === response.id){
                seller.id = response.id;
                seller.name = response.name;
                seller.status = response.status;
                seller.attachment = response.attachment;
            }
            return seller;
        });
    },

};

export default {
    state,
    getters,
    actions,
    mutations,
}
