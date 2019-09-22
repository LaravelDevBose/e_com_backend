//declare State
const state = {
    shop_details:[],
};

//declare Getters
const getters = {
    shopDetails:(state)=>state.shop_details,
};

const actions = {
    async getShopDetails({commit}){
        try {
            return await axios.get('/seller/shop/setting')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setShopDetails', response.data.data);
                    }
                    delete response.data.data;
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async updateShopSetting({commit}, reqData){
        try {
            return await axios.post('/seller/shop/setting/update',reqData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
};

const mutations = {

    setShopDetails:(state,response)=>{
        state.shop_details = response;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
