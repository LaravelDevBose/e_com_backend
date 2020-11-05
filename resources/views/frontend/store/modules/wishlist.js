//declare State
const state = {
    wish_list: [],
    wishlist_products: localStorage.getItem('wishlist_product_id') || [],
};

//declare Getters
const getters = {
    wishListItems: (state) => state.wish_list,
    wishlistProducts: (state) => state.wishlist_products,
};

const actions = {
    async getWishlistItems({commit}){
        try {
            await axios.get('/api/wishLists')
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('setWishList', data.data);
                    }else{
                        commit('updateResponse', {message: "Something wrong. Try again.", type: 'Error'});
                    }
                });
        }catch (error) {
            console.log(error);
            commit('updateResponse', {message: "Something wrong. Try again.", type: 'Error'});
        }
    },
    async removeFromWishlist({commit},slug){
        try {
            await axios.delete(`/api/wishlist/${slug}/remove`)
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('updateWishlist', slug);
                        commit('wishlistedProductUpdate', data.data);
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
    async addToWishlist({commit},slug){
        try {
            await axios.get(`/api/wishlist/${slug}/add`)
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('wishlistedProductUpdate', data.data);
                        commit('updateResponse', {message: data.message, type: data.statusText});
                    }else if(data.status === 400 || data.status === 401){
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
    async getLocalStorageWishList({state}){
        let wislistedId = localStorage.getItem('wishlist_product_id');
        if(wislistedId && wislistedId !== ''){
            state.wishlist_products = wislistedId.split(',').map(el=>{
                return Number(el);
            });
        }
    }
};

const mutations = {
    setWishList:(state, response) => state.wish_list = response,
    updateWishlist:(state, slug) =>{
        state.wish_list = state.wish_list.filter(product => product.slug !== slug);
    },
    wishlistedProductUpdate:(state, response)=>{
        state.wishlist_products = response;
        localStorage.setItem("wishlist_product_id", response);
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
