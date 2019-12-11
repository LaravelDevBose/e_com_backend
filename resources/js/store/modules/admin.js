//declare State
const state = {
    admin_list:[],
    admin_data:{},
};

//declare Getters
const getters = {
    adminList:(state)=>state.admin_list,
    adminData:(state)=> state.admin_data,
};

const actions = {
    async getAdminList({commit}){
        try {
            await axios.get('/admin/account/list')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setAdminList', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getAdminData({commit}, adminId){
        try {
            await axios.get(`/admin/account/${adminId}`)
                .then(response=>{
                    if (typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setAdminData', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeAdminInfo({commit}, formData){
        try {
            return  await axios.post('/admin/account/store', formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('adminInfoStore', response.data.data);
                        delete response.data.data;
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
    async updateAdminInfo({commit},formData){
        try {
            return await axios.put(`/admin/account/${formData.id}/update`, formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateAdminInfo', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
                });
        }catch (error) {
            return  error.data;
        }
    },
    async deleteAdminAccount({commit}, adminId){
        try {
            return await axios.delete(`/admin/account/${adminId}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeAdminInfo', adminId);
                    }
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
            return error.data;
        }
    },
    async updateAccountDetails({commit}, formData){
        try {
            return  await axios.post('/admin/account/details/update', formData)
                .then(response=>{
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },

    async updateAccountPassword({commit}, formData){
        try {
            return  await axios.post('/admin/account/password/update', formData)
                .then(response=>{
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
    setAdminList:(state, response)=>state.admin_list = response,
    setAdminData:(state, response)=>state.admin_data = response,
    adminInfoStore:(state,response)=> state.admin_list.unshift(response),
    updateAdminInfo:(state,response)=>{
        state.admin_list = state.admin_list.filter(admin=>{
            if(admin.id === response.id){
                admin.id = response.id;
                admin.fullName = response.fullName;
                admin.userName = response.userName;
                admin.email = response.email;
                admin.phoneNo = response.phoneNo;
                admin.role = response.role;
                admin.role_label = response.role_label;
                admin.status = response.status;
                admin.status_label = response.status_label;
            }
            return admin;
        });
    },
    removeAdminInfo:(state, adminId)=>state.admin_list = state.admin_list.filter(admin=>admin.id !== adminId),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
