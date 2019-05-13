//declare State
const state = {
    allColor:[],
};

//declare Getters
const getters = {
    colors:(state)=> state.allColor,
};

const actions = {

    async getColors({commit}){
        try {
            await axios.get('/admin/colors').then(response=>{
                commit('setColors', response.data.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }

    },
    async storeColor({commit}, formData){
        try {
            return await axios.post('/admin/color/store',formData).then(response=>{
                console.log(response.data);
                commit('storeColor',response.data.color);
                commit('setResponse', response.data.res);
                return response.data.res;
            }).catch(error=>{
                commit('setResponse', error.data);
            });

        }catch (error) {
            commit('setResponse', error.data);
        }

    },
    async deleteColor({commit},colorID){
        try{
            return await axios.post('/admin/color/delete', colorID).then(response=>{
                commit('colorDelete', colorID);
                commit('setResponse', response.data);
                return response.data;
            }).catch(error=>{
                commit('setResponse', error.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    setColors:(state ,response)=>{
        state.allColor = response;
    },
    storeColor:(state, color)=>{
        state.allColor.unshift(color);
    },
    colorDelete:(state, colorID)=>{
        state.allColor = state.allColor.filter(color=>{
            return color.id !== parseInt(colorID);
        });
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
