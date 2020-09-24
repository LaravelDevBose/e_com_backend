//declare State
const state = {
    setting_info:[]
};

//declare Getters
const getters = {
    settingData:(state)=>state.setting_info,
};

const actions = {
    async getSettingInformation({commit}){
        try {
            return await axios.get('/admin/setting/data')
                .then(response=>{
                    if(response.data.code === 200){
                        commit('setSettingInformation', response.data.data);
                        return response.data;
                    }else{
                        commit('setResponse', response.data);
                    }
                })
        }catch (error) {
            commit('setResponse', error);
        }
    },
    async storeContactSetting({commit}, formData){
        try {
            console.log(formData);
            return  await axios.post('/admin/setting/contact/store', formData)
                .then(response=>{
                    commit('setResponse', response.data);
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    setSettingInformation:(state, response)=> {
        state.setting_info= response.contactSetting;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
