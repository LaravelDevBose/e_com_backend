//declare State
const state = {
    allTags:'',
};

//declare Getters
const getters = {
    tags:(state)=>state.allTags,
};

const actions = {
    async getTags({commit}){
        try {
            const response = await axios.get('/admin/tags');
            commit('setTags', response.data.data);
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async storeTag({commit}, formData){
        try {
            return await axios.post('/admin/tag/store',formData).then(response=>{
                commit('tagStore',response.data.tag);
                commit('setResponse', response.data.res);
                return response.data.res;
            }).catch(error=>{
               commit('setResponse', error.data);
            });
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteTag({commit},tagID){
        try {
            return await axios.delete(`/admin/tag/delete/${tagID}`).then(response=>{
                commit('removeTag', tagID);
                commit('setResponse', response.data);
                return response.data;
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    setTags:(state, response)=>state.allTags = response,
    tagStore:(state, response)=>state.allTags.unshift(response),
    removeTag:(state, tagID)=> state.allTags = state.allTags.filter(tag => tag.id !== parseInt(tagID)),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
