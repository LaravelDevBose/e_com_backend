//declare State
const state = {
    adds_positions:[],
};

//declare Getters
const getters = {
    positions:(state)=>state.adds_positions,
};

const actions = {
    async getAddsPositions({commit}){
        await axios.get('/admin/campaign/create')
            .then(response=>{
                if(typeof response.data.code !== "undefined" && response.data.code === 200){
                    commit('setAddsPositions', response.data.data);
                }
            })
    },
    async storeCampaign({commit}, formData){
        try{
            return await axios.post('/admin/campaign',formData)
                .then(response=>{
                    return response.data;
                })
        }catch(error){
            console.log(error);
            return  error;
        }
    }

};

const mutations = {
    setAddsPositions:(state,response)=>state.adds_positions = response.positions,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
