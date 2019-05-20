//declare State
const state = {
    allSizeGroups:'',
    allSizes:'',

};

//declare Getters
const getters = {
    sizeGroups:(state)=>state.allSizeGroups,
    productSizes:(state)=>state.allSizes,
};

const actions = {
    async getAllSizeGroups({commit}){
        try{
            await axios.get('/admin/size_group').then(response=>{
                commit('setSizeGroups', response.data.data);
            }).catch(error=>{
                commit('setResponse', error.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getAllSizes(){

    },
    async storeSizeGroup({commit},formData){
        try {
            await axios.post('/admin/size_group', formData)
                .then(response=>{
                    if(response.data.res.status === "success"){
                        commit('addSizeGroup', response.data.sizeGroup);
                        commit('setResponse',response.data.res);
                        return response.data.res;
                    }else{
                        commit('setResponse', response.data);
                        return  response.data;
                    }
                })
                .catch(error=>{
                    commit('setResponse', error.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeProductSize(){

    },
    async deleteSizeGroup({commit},SGroupId){
        try{
            await axios.delete(`/admin/size_group/delete/${SGroupId}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeSizeGroup', SGroupId);
                        commit('setResponse', response.data);
                        return response.data;
                    }else{
                        commit('setResponse', response.data);
                        return response.data;
                    }
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteSize(){

    }
};

const mutations = {
    setSizeGroups:(state,response)=>state.allSizeGroups = response,
    addSizeGroup:(state, response)=> state.allSizeGroups.unshift(response),
    removeSizeGroup:(state, SGroupId)=> state.allSizeGroups = state.allSizeGroups.filter(sizeGroup => sizeGroup.id === parseInt(SGroupId))
};

export default {
    state,
    getters,
    actions,
    mutations,
}
