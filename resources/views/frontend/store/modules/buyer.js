//declare State
const state = {
    order_list: []
};

//declare Getters
const getters = {
    orderList:(state)=>state.order_list,
};

const actions = {
    async getOrderList({commit}){
        try {
            await axios.get('/api/order-list')
                .then(({data})=>{
                    console.log(data);
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('setOrderList', data.data);
                    }
                });
        }catch (error) {
            console.log(error);
        }
    }
};

const mutations = {
    setOrderList:(state, response)=>{
        state.order_list = response;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
