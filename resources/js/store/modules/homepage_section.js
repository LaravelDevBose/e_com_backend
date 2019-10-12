//declare State
const state = {
    section_list:[],
    section_types:[],
};

//declare Getters
const getters = {
    homepageSections:(state)=> state.section_list,
    sectionTypes:(state)=>state.section_types,
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
            await axios.get('/admin/homepage/section')
                .then(response=>{
                    commit('setSectionList', response.data.data);
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
    }
};

const mutations = {
    setSectionDependency:(state, response)=>{
        state.section_types = response.type;
    },
    setSectionList:(state, response)=>state.section_list = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
