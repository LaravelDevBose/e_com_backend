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
            await axios.get('/admin/colors')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setColors', response.data.data.data);
                    }

                })
        }catch (error) {
            commit('setResponse', error.data);
        }

    },
    async storeColor({commit}, formData){
        try {
            return await axios.post('/admin/color/store',formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 201){
                        commit('storeColor',response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                });

        }catch (error) {
            commit('setResponse', error.data);
        }

    },
    async updateColor({commit}, formData){
        try {
            return await axios.put(`/admin/color/${formData.color_id}/update`,formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateColorInfo', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
            }).catch(error=>{
                commit('setResponse', error.data);
            });

        }catch (error) {
            commit('setResponse', error.data);
        }

    },
    async deleteColor({commit},colorID){
        try{
            return await axios.delete(`/admin/color/delete/${colorID}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('colorDelete', colorID);
                    }
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
    },
    updateColorInfo:(state, response)=>{
        state.allColor = state.allColor.filter(color=>{
            if(color.id === response.id){
                color.name = response.name;
                color.code= response.code;
                color.status = response.status;
            }
            return color;
        });
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
