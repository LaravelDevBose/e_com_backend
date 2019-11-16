//declare State
const state = {
    allSkinTypes:'',
};

//declare Getters
const getters = {
    skin_types:(state)=>state.allSkinTypes,
};

const actions = {
    async getSkinTypes({commit}){
        try {
            const response = await axios.get('/admin/skinType');

            commit('setSkinTypes', response.data.data);
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async storeSkinType({commit}, formData){
        try {
            return await axios.post('/admin/skinType',formData).then(response=>{
                commit('skinTypeStore',response.data.tag);
                commit('setResponse', response.data.res);
                return response.data.res;
            }).catch(error=>{
                commit('setResponse', error.data);
            });
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async updateSkinType({commit}, formData){
        try {
            return await axios.put(`/admin/skinType/${formData.id}`,formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('skinTypeUpdateInfo',response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                });
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteSkinType({commit},skinTypeID){
        try {
            return await axios.delete(`/admin/skinType/${skinTypeID}`).then(response=>{
                commit('removeSkinType', skinTypeID);
                commit('setResponse', response.data);
                return response.data;
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    setSkinTypes:(state, response)=>state.allSkinTypes = response,
    skinTypeStore:(state, response)=>state.allSkinTypes.unshift(response),
    removeSkinType:(state, skinTypeID)=> state.allSkinTypes = state.allSkinTypes.filter(tag => tag.id !== parseInt(skinTypeID)),
    skinTypeUpdateInfo:(state, response)=>{
        state.allSkinTypes = state.allSkinTypes.filter(skin =>{
            if(skin.id === response.id){
                skin.skinType_title =response.skinType_title;
                skin.skinType_status = response.skinType_status;
            }
            return skin;
        })
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
