//declare State
const state = {
    page_list:'',
    page_dependency:'',

};

//declare Getters
const getters = {
    pagesList:(state)=>state.page_list,
    pageDependency:(state)=>state.page_dependency,
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
    async deleteSlider({commit}, sliderID){
        try {
            return await axios.delete(`/admin/cms/sliders/${brandID}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeSlider', brandID);
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

};

export default {
    state,
    getters,
    actions,
    mutations,
}
