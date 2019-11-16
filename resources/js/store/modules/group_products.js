//declare State
const state = {
    group_type:[],
    group_list:[],
};

//declare Getters
const getters = {
    groupTypes:(state)=>state.group_type,
    groupList:(state)=>state.group_list,
};

const actions = {
    async getGroupProductsDependency({commit}){
        try {
            await axios.get('/admin/group/products/create')
                .then(response=>{
                    commit('setGroupProductDependency', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async groupProductsStore({commit},reqData){
        try {
            return await axios.post('/admin/group/products/store',reqData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getGroupList({commit}){
        try {
            await axios.get('/admin/group/products/index')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setGroupList', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteGroupProduct({commit}, groupId){
        try {
            await axios.delete(`/admin/group/products/${groupId}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeGroupProduct', groupId);
                    }
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
};

const mutations = {
    setGroupProductDependency:(state,response)=>{
        state.group_type = response.groups;
    },
    setGroupList:(state,response)=>state.group_list = response,
    removeGroupProduct:(state, groupId)=>state.group_list = state.group_list.filter(group=>group.group_id !== groupId),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
