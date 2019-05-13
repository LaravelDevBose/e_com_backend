

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
        return  await axios.post('/admin-panel/login',formData).then(response=>{
            commit('loginResponse', response);
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
