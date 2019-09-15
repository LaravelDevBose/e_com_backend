//declare State
const state = {
    cart_list:{},
    total_cart:0,
};

//declare Getters
const getters = {
    cartList:(state)=>state.cart_list,
    cartTotal:(state)=>state.total_cart,
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
            return await axios.get(`/cart/${cartId}/remove`)
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
            return await axios.get('/destroy/cart')
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
    }

};

const mutations = {
    setCartDetails:(state,response)=>{
        state.cart_list = response;
        state.total_cart = Object.keys(response).length;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
