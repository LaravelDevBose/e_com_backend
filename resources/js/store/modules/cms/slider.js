//declare State
const state = {
    sliders:'',


};

//declare Getters
const getters = {
    slidersData:(state)=>state.sliders,
};

const actions = {
    async getSliders({commit}){
        try {
            await axios.get('/admin/cms/sliders')
                .then(response=>{
                    commit('setSliders', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeSlider({commit}, formData){
        try {
            return  await axios.post('/admin/cms/slider/store', formData)
                .then(response=>{
                    if(response.data.res.status === "success"){
                        commit('storeSlider', response.data.brand);
                        commit('setResponse', response.data.res);
                        return response.data.res;
                    }else{
                        return  response.data;
                    }
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteSlider({commit}, sliderID){
        try {
            return await axios.delete(`/admin/cms/slider/${brandID}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeSlider', brandID);
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

const mutations = {};

export default {
    state,
    getters,
    actions,
    mutations,
}
