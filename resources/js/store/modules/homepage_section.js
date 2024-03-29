//declare State
const state = {
    section_list:[],
    section_types:[],
    cat_products:[],
    section_info:{},
    selected_products:[],
};

//declare Getters
const getters = {
    homepageSections:(state)=> state.section_list,
    sectionTypes:(state)=>state.section_types,
    catProducts:(state)=>state.cat_products,
    sectionData:(state)=>state.section_info,
    selectedProducts:(state)=>state.selected_products,
};

const actions = {
    async getSectionCreateDependency({commit}){
        try {
            await axios.get('/admin/homepage/section/create')
                .then(response=>{
                    commit('setSectionDependency', response.data.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getSectionList({commit}){
        try {
            return await axios.get('/admin/homepage/section')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setSectionList', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getSectionData({commit}, sectionId){
        try {
            await axios.get(`/admin/homepage/section/${sectionId}`)
                .then(response=>{
                    commit('setSectionData', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getSectionCategoryProducts({commit}, sectionId){
        try {
            await axios.get(`/admin/homepage/section/${sectionId}/add/products`)
                .then(response=>{
                    commit('setSectionCategoryProducts', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeSectionDetails({commit}, fromData){
        try {
            return  await axios.post('/admin/homepage/section/store', fromData)
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
    async selectedProductStore({commit}, fromData){
        try {
            return  await axios.post('/admin/homepage/section/products/store', fromData)
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

    async getManageProductsData({commit}, sectionId){
        try {
            await axios.get(`/admin/homepage/section/${sectionId}/manage/products`)
                .then(response=>{
                    commit('setManageProductsData', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async sectionProductsUpdate({commit}, fromData){
        try {
            return  await axios.post('/admin/homepage/section/products/update', fromData)
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
    async updateSectionDetails({commit}, fromData){
        try {
            return  await axios.put(`/admin/homepage/section/${fromData.section_id}/update`, fromData)
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
    async deleteSectionDetails({commit}, sectionId){
        try {
            return  await axios.delete(`/admin/homepage/section/${sectionId}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeSectionInfo', sectionId);
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
    setSectionDependency:(state, response)=>{
        state.section_types = response.type;
    },
    setSectionList:(state, response)=>state.section_list = response,
    setSectionData:(state, response)=>state.section_info = response,
    setSectionCategoryProducts:(state,response)=>state.cat_products = response,
    setManageProductsData:(state,response)=>{
        state.selectedProIds = response.productIds;
        state.cat_products = response.products;
        state.selected_products = response.selected_products;
    },
    removeSectionInfo:(state, sectionId)=>state.section_list = state.section_list.filter(section=>section.id !== sectionId),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
