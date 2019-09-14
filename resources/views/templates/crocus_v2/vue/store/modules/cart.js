//declare State
const state = {
    cart_list:{},
};

//declare Getters
const getters = {
    cartList:(state)=>state.cart_list,
};

const actions = {
    async getCartDetails({commit},reqData=null){
        try {
            return await axios.get('/buyer/cart/list',reqData)
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
            return await axios.post('/buyer/add_to/cart',cartInfo)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setAddToCart', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error;
        }
    },
    async productRemoveFromCart({commit},cartId){
        try {
            return await axios.post(`/buyer/remove_from/cart/${cartId}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeProductFromCart', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error;
        }
    }

};

const mutations = {
    setCartDetails:(state,response)=>state.cart_list = response,
    setAddToCart:(state, response)=>state.cart_list = response,
    removeProductFromCart:(state, cartId)=>state.cart_list = state.cart_list.filter(cart=>cart.row_id !==cartId),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
