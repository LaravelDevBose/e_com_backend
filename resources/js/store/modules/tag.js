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
            await axios.get('/admin/tags')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setTags', response.data.data.data);
                    }
                })
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async storeTag({commit}, formData){
        try {
            return await axios.post('/admin/tag/store',formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 201){
                        commit('tagStore',response.data.data);
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
    async updateTag({commit}, formData){
        try {
            return await axios.put(`/admin/tag/${formData.tag_id}/update`,formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('tagUpdateInfo',response.data.data);
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
    async deleteTag({commit},tagID){
        try {
            return await axios.delete(`/admin/tag/delete/${tagID}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeTag', tagID);
                    }
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
    tagUpdateInfo:(state, response)=>{
        state.allTags = state.allTags.filter(tag =>{
            if(tag.id === response.id){
                tag.title =response.title;
                tag.status = response.status;
            }
            return tag;
        })
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
