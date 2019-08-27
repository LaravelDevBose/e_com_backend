//declare State
const state = {
    page_list:'',
    page_dependency:'',
    pageData:'',
};

//declare Getters
const getters = {
    pagesList:(state)=>state.page_list,
    pageDependency:(state)=>state.page_dependency,
    pageData:(state)=>state.pageData,
};

const actions = {
    async generalPagesFormDependency({commit}){
        try {
            await axios.get('/admin/cms/pages/create')
                .then(response=>{
                    console.log(response);
                    if(response.data.code == 200){
                        commit('setGeneralPagesDependency', response.data.data);
                    }else{
                        commit('setResponse', response.data);
                    }
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getGeneralPagesList({commit}){
        try {
            await axios.get('/admin/cms/list/pages')
                .then(response=>{
                    if(response.data.code == 200){
                        commit('setGeneralPagesList', response.data.data);
                    }else{
                        commit('setResponse', response.data);
                    }
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeGeneralPages({commit}, formData){
        try {
            return  await axios.post('/admin/cms/pages', formData)
                .then(response=>{
                    console.log(response);
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
    async singleGeneralPageData({commit},pageId){
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
    async deleteGeneralPage({commit}, pageId){
        try {
            return await axios.delete(`/admin/cms/pages/${pageId}`)
                .then(response=>{
                    if(response.data.code === 200){
                        commit('removeGeneralPage', pageId);
                    }
                    commit('setResponse', response.data);
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
            return error.data;
        }
    }
};

const mutations = {
    setGeneralPagesDependency:(state, response)=> state.page_dependency = response,
    setGeneralPagesList:(state, response)=> state.page_list = response,
    setGeneralPageData:(state,response)=>state.pageData = response,
    removeGeneralPage:(state, pageId)=>state.page_list = state.page_list.filter(page=>page.id !==pageId),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
