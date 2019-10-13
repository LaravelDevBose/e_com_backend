//declare State
const state = {
    section_list:[],
    section_types:[],
    cat_products:[],
    section_info:{},
    selectedProIds:[],
};

//declare Getters
const getters = {
    homepageSections:(state)=> state.section_list,
    sectionTypes:(state)=>state.section_types,
    catProducts:(state)=>state.cat_products,
    sectionData:(state)=>state.section_info,
    selectedProIds:(state)=>state.selectedProIds,
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
    selectedProductIdUpdate({commit},selectData){
        commit('setSelectedProduct', selectData);
        return true;
    }
};

const mutations = {
    setSectionDependency:(state, response)=>{
        state.section_types = response.type;
    },
    setSectionList:(state, response)=>state.section_list = response,
    setSectionData:(state, response)=>state.section_info = response,
    setSectionCategoryProducts:(state,response)=>state.cat_products = response,
    setSelectedProduct:(state, selectData)=>{
        if(selectData.type === 'add'){
            state.selectedProIds.push(selectData.productId);
        }else{
            state.selectedProIds = state.selectedProIds.filter(productId=>{
                if(productId !== selectData.productId){
                    return productId;
                }
            });
        }

    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
