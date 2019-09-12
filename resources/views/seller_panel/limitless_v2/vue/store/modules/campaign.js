//declare State
const state = {
    campaign_list:{},
};

//declare Getters
const getters = {
    campaigns:(state)=>state.campaign_list,
};

const actions = {
    async getCampaignList({commit},formData=null){
        try {
            await axios.get('/seller/campaigns',formData)
                .then(response=>{
                    if(response.data.code !== undefined && response.data.code === 200){
                        commit('setCampaignList', response.data.data);
                    }else{
                        console.log(response)
                    }

                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
};

const mutations = {
    setCampaignList:(state,response)=>state.campaign_list = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
