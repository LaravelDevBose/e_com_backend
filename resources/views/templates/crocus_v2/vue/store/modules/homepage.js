//declare State
const state = {
    section_list:[],
    paginate_data:{},

};

//declare Getters
const getters = {
    sectionList:(state)=>state.section_list,
    sectionPagination:(state)=>state.paginate_data,
};

const actions = {
    async getHomePageSections({commit},reqUrl){
        try {
            return await axios.get(reqUrl)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setHomepageSections', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
        }
    },
    async getSectionProducts({commit},sectionId){
        try {
            return await axios.get(`get/section/${sectionId}/products`)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            console.log(error);
        }
    },
};

const mutations = {
    setHomepageSections:(state, response)=>{
        if(response.hasOwnProperty('current_page')){
            response.data.filter(section=>{
                state.section_list.push(section);
            })
            /*response.data.forEach((item)=>{

            });*/
            delete response.data;
            state.paginate_data = response;
        }else{
            state.section_list = response
        }
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
