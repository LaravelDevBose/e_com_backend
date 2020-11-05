//declare State
const state = {
    review_list:[],
    review_items:[],
    product_reviews:[],
};

//declare Getters
const getters = {
    reviewList:(state)=>state.review_list,
    reviewItems:(state)=>state.review_items,
    productReviews:(state)=>state.product_reviews,
};

const actions = {
    async getBuyerReviews({commit}){
        try {
            await axios.get('/api/reviews/list')
                .then(({data})=>{
                    if (typeof data.status !== "undefined" && data.status === 200){
                        commit('setBuyerReviews', data.data);
                    }
                })
        }catch (e) {
            console.log(e);
        }
    },
    async getOrderReviewItems({commit},orderId){
        try {
            await axios.get(`/api/reviews/order/${orderId}/items`)
                .then(({data})=>{
                    if (typeof data.status !== "undefined" && data.status === 200){
                       commit('setOrderReviewItems', data.data);
                    }
                });
        }catch (e) {
            console.log(e);
        }
    },
    async storeBuyerReview({commit},formData){
        try {
            return await axios.post(`/api/reviews/store`, formData)
                .then(({data})=>{
                    if(typeof data.status !== "undefined" && data.status === 200){
                        commit('updateResponse', {message: data.message, type: data.statusText});
                    }else if(data.status === 400){
                        commit('updateResponse', {message: data.message, type: 'Warning'});
                    }else{
                        commit('updateResponse', {message: "Invalid Information", type: 'Error'});
                    }
                    return data;
                })
        }catch (e) {
            console.log(error);
            commit('updateResponse', {message: "Invalid Information", type: 'Error'});
        }
    }
};

const mutations = {
    setBuyerReviews:(state,response)=>{
        if(response.hasOwnProperty('current_page')){
          state.review_list = response.data;
          delete response.data;
          state.paginate = response;
        }else{
            state.review_list = response;
        }
    },
    setOrderReviewItems:(state,response)=>{
        state.review_items = response
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
