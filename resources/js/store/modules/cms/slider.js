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
            await axios.get('/admin/cms/list/slider')
                .then(response=>{
                    if(response.data.code == 200){
                        console.log(response.data.code);
                        commit('setSliders', response.data.data);
                    }else{
                        commit('setResponse', response.data);
                    }
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeSlider({commit}, formData){
        try {
            return  await axios.post('/admin/cms/sliders', formData)
                .then(response=>{
                    console.log(response);
                    commit('setResponse', response.data);
                    return response.data;

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
            return await axios.delete(`/admin/cms/sliders/${sliderID}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeSlider', sliderID);
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
    setSliders:(state, response)=> state.sliders = response,
    removeSlider:(state, sliderId)=>{
        state.sliders = state.sliders.filter(slider=>{
            return slider.id !== sliderId;
        })
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
