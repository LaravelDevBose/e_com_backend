

//declare State
const state={
    loginRes:{}
};

//declare Getters
const getters = {
    getResponse:(state)=>state.loginRes,
};

const actions={
    async login({commit}, formData){
        const response = await axios.post('/admin-panel/login',formData);
        commit('loginResponse', response);
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
