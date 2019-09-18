//declare State
const state = {
    carts:{},
    qty:0,
    weight:'',
    subtotal:0,
    discount:0,
    total:0
};

//declare Getters
const getters = {
    cartList:(state)=>state.carts,
    cartTotal:(state)=>state.qty,
    cartWeight:(state)=>state.weight,
    cartSubTotal:(state)=>state.subtotal,
    cartDiscount:(state)=>state.discount,
    cartTotalPrice:(state)=>state.total,
};

const actions = {
    async getCartDetails({commit},reqData=null){
        try {
            return await axios.get('/cart/list',reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setCartDetails', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
        }
    },
    async addToCartProduct({commit},cartInfo){
        try {
            return await axios.post('/cart/add',cartInfo)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setCartDetails', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error;
        }
    },
    async removeFromCart({commit},cartId){
        try {
            return await axios.delete(`/cart/${cartId}/remove`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setCartDetails', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error;
        }
    },
    async destroyCart({commit}){
        try {
            return await axios.delete('/destroy/cart')
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setCartDetails', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error;
        }
    },
    async updateCart({commit},updateDate){
        try {
            return await axios.put('/cart/update',updateDate)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setCartDetails', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error;
        }
    },

};

const mutations = {
    setCartDetails:(state,response)=>{
        state.carts = response.carts;
        state.qty = response.qty;
        state.weight = response.weight;
        state.subtotal = response.subtotal;
        state.discount = response.discount;
        state.total = response.total;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
