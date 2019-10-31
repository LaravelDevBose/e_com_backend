//declare State
const state = {
    account_info:{}
};

//declare Getters
const getters = {
    accountInfo:(state)=>state.account_info,
};

const actions = {
    async getAccountInfo({commit}){
        try {
            return await axios.get('/seller/account/info')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setAccountInfo', response.data.data);
                    }
                    delete response.data.data;
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async updateAccountInfo({commit},formData){
        try {
            return await axios.post('/seller/update/account/info',formData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async updatePassword({commit},formData){
        try {
            return await axios.post('/seller/update/password',formData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error.data;
        }
    }

};

const mutations = {
    setAccountInfo:(state, response)=>state.account_info = response
};

export default {
    state,
    getters,
    actions,
    mutations,
}
