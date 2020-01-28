

//declare State
const state={
    loginRes:{}
};

//declare Getters
const getters = {
    getResponse:(state)=>state.loginRes,
};

const actions={
    async loginBuyer({commit}, formData){
        return  await axios.post('/login',formData).then(response=>{
            if(typeof response.data.code !== "undefined" && response.data.code === 200){
                AppStorage.storageClear();
                AppStorage.storeUserInfo(response.data.data);
            }
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
        return  await axios.post('/seller/login',formData).then(response=>{
            if(typeof response.data.code !== "undefined" && response.data.code === 200){
                AppStorage.storageClear();
                AppStorage.storeUserInfo(response.data.data);
            }
            commit('loginResponse', response);
            return response.data;
        });

    },
    async registerSeller({commit}, formData){
        return  await axios.post('/seller/register',formData)
            .then(response=>{
                return response.data;
            });

    },
    async sendPasswordResetLink({commit}, formData){
        return  await axios.post('/password/email',formData)
            .then(response=>{
                return response.data;
            });

    },
    async passwordReset({commit}, formData){
        return  await axios.post('/password/reset',formData)
            .then(response=>{
                return response.data;
            });

    },
    async getUserInfo({commit}){
        return  await axios.get('/buyer/user/info')
            .then(response=>{
                if(typeof response.data.code !== "undefined" && response.data.code === 200){
                    AppStorage.storageClear();
                    AppStorage.storeUserInfo(response.data.data);
                }
                return response.data;
            });

    },

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
