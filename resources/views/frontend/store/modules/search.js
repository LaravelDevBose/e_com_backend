//declare State
const state = {
    search_result:{
        products: [],
        brands: [],
        categories:[],
    },
    mini_search_result:{
        products: [],
        brands: [],
        categories:[],
    },
};

//declare Getters
const getters = {
    searchResult:(state)=>state.search_result,
    miniSearchResult:(state)=>state.mini_search_result,
};

const actions = {
    async getSearchDetails({commit},reqData){
        try {
            return await axios.post('/front/search',reqData)
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        if(reqData.hasOwnProperty('mini')){
                            commit('setMiniSearchResult', data.data);
                        }else{
                            commit('setSearchResult', data.data);
                        }
                    }

                    return data;
                });
        }catch (error) {
            console.log(error);
        }
    },
};

const mutations = {
    setSearchResult:(state,response)=>{
        state.search_result.products = (response.products.data)? response.products.data: [];
        state.search_result.brands = (response.brands.data)? response.brands.data: [];
        state.search_result.categories = (response.categories.data)? response.categories.data: [];
    },
    setMiniSearchResult:(state,response)=>{
        state.mini_search_result.products = (response.products.data)? response.products.data: [];
        state.mini_search_result.brands = (response.brands.data)? response.brands.data: [];
        state.mini_search_result.categories = (response.categories.data)? response.categories.data: [];
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
