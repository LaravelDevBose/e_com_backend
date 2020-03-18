//declare State
const state = {
    ads_banner_list:[],
    ads_banner:{},
};

//declare Getters
const getters = {
    adsBannerList:(state)=>state.ads_banner_list,
    adsBanner: (state) => state.ads_banner,
};

const actions = {
    async getAdsBanners({commit}){
        try {
            await axios.get('/admin/ads_banner/list')
                .then(response=>{
                    commit('setAdsBanners', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getAdsBanner({commit}, adsBannerId){
        try {
            await axios.get(`/admin/ads_banner/${adsBannerId}`)
                .then(response=>{
                    commit('setAdsBanner', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeAdsBanner({commit}, fromData){
        try {
            return  await axios.post('/admin/ads_banner/store', fromData)
                .then(response=>{
                    /*if(response.data.status === "success"){
                        commit('storeAdsBanner', response.data.data);
                    }*/
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async updateAdsBanner({commit},fromData){
        try {
            return await axios.put(`/admin/ads_banner/update/${fromData.id}`, fromData)
                .then(response=>{
                    /*if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateAdsBannerData', response.data.data);
                    }*/
                    return response.data;
                });
        }catch (error) {
            return  error.data;
        }
    },
    async deleteAdsBanner({commit},adsBannerId){
        try {
            return await axios.delete(`/admin/ads_banner/${adsBannerId}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeAdsBanner', adsBannerId);
                    }
                    commit('setResponse', response.data);
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
            return error.data;
        }
    }
};

const mutations = {
    setAdsBanners:(state, response)=> state.ads_banner_list = response,
    setAdsBanner:(state, response)=> state.ads_banner = response,
    removeAdsBanner:(state, adsBannerId)=> state.ads_banner_list = state.ads_banner_list.filter(ads=>ads.id !==adsBannerId),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
