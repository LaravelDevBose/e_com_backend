//declare State
const state = {
    bkash_access_token: {},
};

//declare Getters
const getters = {
    bkashAccessToken: (state) => state.bkash_access_token,
};

const actions = {
    async getBKashAccessToken({commit}){
        try {
            return await axios.post('/api/get-bkash-token')
                .then(response=>{
                    console.log(response);
                    commit('setBKashAccessToken', response);
                    return response;
                });
        }catch (error) {
            console.log(error);
        }
    },
    async bkashCreateRequest({commit}){
        try {
            return await axios.post('/api/get-bkash-token')
                .then(response=>{
                    console.log(response);
                    commit('setBKashAccessToken', response);
                });
        }catch (error) {
            console.log(error);
        }
    },
    async bkashExecuteRequest({commit}){
        try {
            return await axios.post('/api/get-bkash-token')
                .then(response=>{
                    console.log(response);
                    commit('setBKashAccessToken', response);
                });
        }catch (error) {
            console.log(error);
        }
    }
};

const mutations = {
    setBKashAccessToken:(state,response)=> state.bkash_access_token = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
