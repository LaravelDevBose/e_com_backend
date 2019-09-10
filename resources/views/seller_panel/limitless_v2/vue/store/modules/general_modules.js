//declare State
const state = {
    categories:[],
    treeListCategories:[],
    resData:'',
    brands:{},
    brandList:{},
    allSkinTypes:{},
    allColor:{},
    allTags:{},
    allSizeGroups:{},
};

//declare Getters
const getters = {
    categories:(state)=>state.categories,
    treeList:(state)=>state.treeListCategories,
    brands:(state)=> state.brands,
    brandList:(state)=>state.brandList,
    skin_types:(state)=>state.allSkinTypes,
    colors:(state)=> state.allColor,
    tags:(state)=>state.allTags,

};

const actions = {
    async allCategory({commit}){

        try{
            const response = await axios.post('/admin/category');
            commit('setCategory', response.data.data);
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }

    },
    async allTreeListCategories({commit}){
        try{
            const response = await axios.post('/admin/all_category/tree_list');
            commit('setTreeListCategory', response.data.data);

        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getTreeListCategories({commit}){

        try{
            const response = await axios.post('/admin/category/tree_list');
            commit('setTreeListCategory', response.data.data);
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }

    },

    async getBrands({commit}){
        try {
            await axios.get('/admin/brands')
                .then(response=>{
                    commit('setBrands', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getBrandList({commit}){
        try {
            await axios.get('/admin/brand/list')
                .then(response=>{
                    commit('setBrandList', response.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getAllSizeInfo({commit}){
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
    async getSkinTypes({commit}){
        try {
            const response = await axios.get('/admin/skinType');

            commit('setSkinTypes', response.data.data);
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getColors({commit}){
        try {
            await axios.get('/admin/colors').then(response=>{
                commit('setColors', response.data.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }

    },
    async getTags({commit}){
        try {
            const response = await axios.get('/admin/tags');
            commit('setTags', response.data.data);
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
};

const mutations = {
    setCategory:(state,categories)=>{
        state.categories = categories;
    },
    setTreeListCategory:(state,treeList)=>{
        state.treeListCategories = treeList;
    },
    setBrands:(state, response)=>state.brands = response,
    setBrandList:(state,response)=>state.brandList = response,
    setSizeGroups:(state,response)=>state.allSizeGroups = response,
    setSkinTypes:(state, response)=>state.allSkinTypes = response,
    setColors:(state ,response)=>{
        state.allColor = response;
    },
    setTags:(state, response)=>state.allTags = response,

};

export default {
    state,
    getters,
    actions,
    mutations,
}
