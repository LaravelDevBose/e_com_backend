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
            const response = await axios.get('/admin/skin_types');
            commit('setSkinTypes', response.data.data);
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async storeSkinType({commit}, formData){
        try {
            return await axios.post('/admin/skin_types/store',formData).then(response=>{
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
    async deleteSkinType({commit},skinTypeID){
        try {
            return await axios.delete(`/admin/skinTypes/delete/${skinTypeID}`).then(response=>{
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
};

export default {
    state,
    getters,
    actions,
    mutations,
}
