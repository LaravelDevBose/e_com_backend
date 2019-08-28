//declare State
const state = {
    setting_info:'',
    campaign_setting:''
};

//declare Getters
const getters = {
    settingData:(state)=>state.setting_info,
    campaignSetting:(state)=>state.campaign_setting,
};

const actions = {
    async getSettingInformation({commit}){
        try {
            return await axios.get('/admin/setting/data')
                .then(response=>{
                    if(response.data.code == 200){
                        commit('setSettingInformation', response.data.data);
                        return response.data;
                    }else{
                        commit('setResponse', response.data);
                    }
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeContactSetting({commit}, formData){
        try {
            return  await axios.post('/admin/cms/pages', formData)
                .then(response=>{
                    commit('setResponse', response.data);
                    return response.data;

                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeCampaignSetting({commit},pageId){
        try {

            return  await axios.get(`/admin/cms/pages/${pageId}`)
                .then(response=>{
                    if(response.data.code == 200){
                        commit('setGeneralPageData', response.data.data);
                    }else{
                        commit('setResponse', response.data);
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

};

const mutations = {
    setSettingInformation:(state, response)=> {
        state.setting_info= response.contactSetting;
        state.campaign_setting = response.campaignSetting;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
