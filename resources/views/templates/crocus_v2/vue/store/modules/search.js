//declare State
const state = {
    search_result:{},
};

//declare Getters
const getters = {
    searchResult:(state)=>state.search_result,
};

const actions = {
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
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
