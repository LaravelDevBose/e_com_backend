//declare State
const state = {
    categories:[],
    treeListCategories:[],
    resData:'',
    category_products:[],
    category_data:{},
};

//declare Getters
const getters = {
    categories:(state)=>state.categories,
    treeList:(state)=>state.treeListCategories,
    categoryProducts:(state)=>state.category_products,
    category:(state)=>state.category_data,
};

const actions = {
    async allCategory({commit}){
        try{
            await axios.get('/admin/category')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setCategory', response.data.data.data);
                    }
                });

        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async getCategoryData({commit},categoryId){
        try{
            await axios.get(`/admin/category/${categoryId}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setCategoryData', response.data.data);
                    }
                });

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
    async storeCategory({commit},data){

        try{
            return await axios.post('/admin/category/store',data).then(response=>{
                commit('categoryStore', response.data);
                return response.data;
            });

        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }

    },
    async updateCategory({commit},data){

        try{
            return await axios.put(`/admin/category/${data.id}/update`,data)
                .then(response=>{
                    return response.data;
                });

        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }

    },
    async categoryDelete({commit}, catId){
        try{
            return await axios.post('/admin/category/delete',{category_id:catId}).then(response=>{

                commit('deleteCategory', catId);
                return response.data;

            }).catch(errors=>{
                console.log(error);
                commit('setResponse', errors.data);
            })
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async categoryWishProducts({commit}, reqData){
        try{
            return await axios.post('/admin/category/wish/products',reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setCategoryProducts', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
            }).catch(errors=>{
                console.log(error);
                commit('setResponse', errors.data);
            })
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    setCategory:(state,categories)=>{
        state.categories = categories;
    },
    setTreeListCategory:(state,treeList)=>{
        state.treeListCategories = treeList;
    },
    categoryStore:(state,response)=>{
        state.resData = response;
    },
    deleteCategory:(state, catID)=>{
        state.categories = state.categories.filter(category=>{
            return category.id !== parseInt(catID);
        });
    },
    setCategoryProducts:(state,response)=>{
        state.category_products = response;
    },
    setCategoryData:(state,response)=>state.category_data = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
