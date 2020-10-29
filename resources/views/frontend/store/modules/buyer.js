//declare State
const state = {
    order_list: [],
    order_info: {},
};

//declare Getters
const getters = {
    orderList:(state)=>state.order_list,
    orderInfo: (state)=> state.order_info,
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
    },
    async getOrderDetails({commit}, orderNo){
        try {
            await axios.get(`/api/order/${orderNo}/details`)
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        console.log(data.data);
                        commit('setOrderDetails', data.data);
                    }
                    return data;
                });
        }catch (error) {
            console.log(error);
        }
    },

};

const mutations = {
    setOrderList:(state, response)=>{
        state.order_list = response;
    },
    setOrderDetails:(state, response)=> {
        state.order_info = response;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
