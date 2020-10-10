//declare State
const state = {
    carts:{},
    qty:0,
    weight:'',
    subtotal:0,
    discount:0,
    total:0,
    suggested_products:[],
};

//declare Getters
const getters = {
    cartList:(state)=>state.carts,
    cartTotal:(state)=>state.qty,
    cartWeight:(state)=>state.weight,
    cartSubTotal:(state)=>state.subtotal,
    cartDiscount:(state)=>state.discount,
    cartTotalPrice:(state)=>state.total,
    sugProducts:(state)=>state.suggested_products,
};

const actions = {
    async getCartDetails({commit}){
        try {
            return await axios.get('/front/cart-list')
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('setCartDetails', data.data);
                    }
                });
        }catch (error) {
            console.log(error);
        }
    },
    async getCartSuggestedProducts({commit},reqData=null){
        try {
            return await axios.get('/cart/suggested/products',reqData)
                .then(response=>{
                    if(typeof response.data.status !== "undefined" && response.data.status === 200){
                        commit('setCartSuggestedProducts', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
        }
    },
    async addToCartProduct({commit},cartInfo){
        try {
            return await axios.post('/front/add-to-cart',cartInfo)
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('setCartDetails', data.data);
                        commit('updateResponse', {message: data.message, type: data.statusText});
                    }else if(data.status === 400){
                        commit('updateResponse', {message: data.message, type: 'Warning'});
                    }else{
                        commit('updateResponse', {message: "Invalid Information", type: 'Error'});
                    }
                })
                .catch((error)=>{
                    commit('updateResponse', {message: "Invalid Information", type: 'Error'});
                })
        }catch (error) {
            console.log(error);
            commit('updateResponse', {message: "Invalid Information", type: 'Error'});
        }
    },
    async removeFromCart({commit},cartId){
        try {
            await axios.get(`/front/cart/${cartId}/remove`)
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('setCartDetails', data.data);
                        commit('updateResponse', {message: data.message, type: data.statusText});
                    }else if(data.status === 400){
                        commit('updateResponse', {message: data.message, type: 'Warning'});
                    }else{
                        commit('updateResponse', {message: "Invalid Information", type: 'Error'});
                    }
                })
        }catch (error) {
            console.log(error);
            commit('updateResponse', {message: "Invalid Information", type: 'Error'});
        }
    },
    async destroyCart({commit}){
        try {
            return await axios.delete('/destroy/cart')
                .then(response=>{
                    if(typeof response.data.status !== "undefined" && response.data.status === 200){
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
                    if(typeof response.data.status !== "undefined" && response.data.status === 200){
                        commit('setCartDetails', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            return error;
        }
    },
    async addAllWListItemsToCart(){
        try {
            return await axios.get('/wishlist/toCart/products')
                .then(response=>{
                    return response.data;
                })
        }catch (ex) {
            console.log(ex);
            return  ex;
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
    setCartSuggestedProducts:(state,response)=>{
        state.suggested_products = response;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
