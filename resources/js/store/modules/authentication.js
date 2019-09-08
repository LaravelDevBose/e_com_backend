

//declare State
const state={
    loginRes:{}
};

//declare Getters
const getters = {
    getResponse:(state)=>state.loginRes,
};

const actions={
    async loginAdmin({commit}, formData){
        return  await axios.post('/admin-panel/login',formData).then(response=>{
            commit('loginResponse', response);
            return response.data;
        });

    },
    async loginBuyer({commit}, formData){
        return  await axios.post('/login',formData).then(response=>{
            return response.data;
        });

    },
    async registerBuyer({commit}, formData){
        return  await axios.post('/register',formData)
            .then(response=>{
                return response.data;
            });

    },
    async loginSeller({commit}, formData){
        return  await axios.post('/seller-panel/login',formData).then(response=>{
            commit('sellerLoginResponse', response);
            return response.data;
        });

    },
    async registerSeller({commit}, formData){
        return  await axios.post('/seller/register',formData)
            .then(response=>{
                commit('sellerRegisterResponse', response);
                return response.data;
            });

    }
};

const mutations ={
    loginResponse:(state,res)=>(state.loginRes = res.data),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
