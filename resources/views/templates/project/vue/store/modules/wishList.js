//declare State
const state = {
    wish_list:{},
    wish_list_count:0,
};

//declare Getters
const getters = {
    wishLists:(state)=>state.wish_list,
};

const actions = {
    async getWishListDetails({commit},reqData=null){
        try {
            return await axios.get('/buyer/wishLists',{reqData})
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setWishListDetails', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            console.log(error);
        }
    },
    async insertToWishList({commit}, productSlug){
        try {
            return await axios.post('/buyer/wishList/add',{product_slug:productSlug})
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        // TODO add To Wist List;
                        commit('addToWishList', response.data.data);
                    }
                    return response.data;
                })
        }catch (ex) {
            console.log(ex);
            return  ex;
        }
    },
    async deleteFromWishList({commit}, productSlug){
        try {
            return await axios.post('/buyer/wishList/remove',{product_slug:productSlug})
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeFromWishList', productSlug);
                    }
                    return response.data;
                })
        }catch (ex) {
            console.log(ex);
            return  ex;
        }
    },

};

const mutations = {
    setWishListDetails:(state, response)=>state.wish_list = response,
    addToWishList:(state,response)=>state.wish_list_count++,
    removeFromWishList:(state,productSlug)=>{
        state.wish_list_count--;
        state.wish_list = state.wish_list.filter(product=>{
            if(product.product_slug !== productSlug){
                return product;
            }
        })
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
