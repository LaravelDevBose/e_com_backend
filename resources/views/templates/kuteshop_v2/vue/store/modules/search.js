//declare State
const state = {
    search_result:{},
    category_list:[],
};

//declare Getters
const getters = {
    searchResult:(state)=>state.search_result,
    categories:(state)=>state.category_list,
};

const actions = {
    async getCategoryList({commit}){
        try {
            return await axios.get('/all/category/list')
                .then(response=>{
                    commit('setCategoryList', response.data.data);
                    return response.data;
                });
        }catch (error) {
            console.log(error);
        }
    },
    async getSearchDetails({commit},reqData){
        try {
            return await axios.post('/search',reqData)
                .then(response=>{
                    commit('setSearchResult', response.data.data);
                    return response.data;
                });
        }catch (error) {
            console.log(error);
        }
    },
};

const mutations = {
    setSearchResult:(state,response)=>{
        state.search_result = response;
    },
    setCategoryList:(state,response)=>state.category_list = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
