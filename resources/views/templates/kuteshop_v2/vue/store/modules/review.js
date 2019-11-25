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
            return await axios.get('/buyer/reviews/list')
                .then(response=>{
                    if (typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setBuyerReviews', response.data.data);
                        delete response.data.data;
                    }
                    return response.data;
                })
        }catch (e) {
            console.log(e);
        }
    },
    async getOrderReviewItems({commit},orderId){
        try {
            return await axios.get(`/buyer/reviews/order/${orderId}/items`)
                .then(response=>{
                    if (typeof response.data.code !== "undefined" && response.data.code === 200){
                       commit('setOrderReviewItems', response.data.data);
                       delete response.data.data;
                    }
                    return response.data;
                })
        }catch (e) {
            console.log(e);
        }
    },
    async storeBuyerReview({commit},formData){
        try {
            return await axios.post(`/buyer/reviews/store`, formData)
                .then(response=>{
                    return response.data;
                })
        }catch (e) {
            console.log(e);
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
