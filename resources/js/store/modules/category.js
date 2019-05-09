//declare State
const state = {
    categories:[],
    treeListCategories:[],
};

//declare Getters
const getters = {
    categories:(state)=>state.categories,
    treeList:(state)=>state.treeListCategories,
};

const actions = {
    async allCategory({commit}){

        try{
            const response = await axios.post('/admin/category');
            commit('setCategory', response.data.data);
        }catch (error) {
            console.log(error);
        }

    },
    async getTreeListCategories({commit}){

        try{
            const response = await axios.post('/admin/category/tree_list');
            commit('setTreeListCategory', response.data.data);
        }catch (error) {
            console.log(error);
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
};

export default {
    state,
    getters,
    actions,
    mutations,
}
