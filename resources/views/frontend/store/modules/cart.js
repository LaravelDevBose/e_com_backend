//declare State
const state = {
    carts:[],
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
            await axios.get('/front/cart/suggested/products',reqData)
                .then(response=>{
                    if(typeof response.data.status !== "undefined" && response.data.status === 200){
                        commit('setCartSuggestedProducts', response.data.data);
                    }
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
            return await axios.delete('/front/destroy/cart')
                .then(response =>{
                    if(typeof response.data.status !== "undefined" && response.data.status === 200){
                        commit('setCartDetails', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            commit('updateResponse', {message: "Invalid Information", type: 'Error'});
            return error;
        }
    },
    async updateCart({commit},updateDate){
        try {
            return await axios.put('/front/cart/update',updateDate)
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
        if(response){
            state.carts = (response.carts)? response.carts : [];
            state.qty = (response.qty)? response.qty : 0;
            state.weight = (response.weight)? response.weight: 0;
            state.subtotal = (response.subtotal)? response.subtotal: 0;
            state.discount = (response.discount)? response.discount: 0;
            state.total = (response.total)? response.total: 0;
        }else{
            state.carts =  [];
            state.qty =0;
            state.weight = 0;
            state.subtotal = 0;
            state.discount = 0;
            state.total = 0;
        }

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
