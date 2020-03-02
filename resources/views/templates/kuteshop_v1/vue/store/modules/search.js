//declare State
const state = {
    search_result:[],
    mini_search_result:[],
    category_list:[],
};

//declare Getters
const getters = {
    searchResult:(state)=>state.search_result,
    miniSearchResult:(state)=>state.mini_search_result,
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
                    if(typeof response.data.code !== "undefined" && response.data.status === 'success'){
                        if(reqData.hasOwnProperty('mini')){
                            commit('setMiniSearchResult', response.data.data);
                        }else{
                            commit('setSearchResult', response.data.data);
                        }
                    }

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
    setMiniSearchResult:(state,response)=>{
        state.mini_search_result = response;
    },
    setCategoryList:(state,response)=>state.category_list = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
