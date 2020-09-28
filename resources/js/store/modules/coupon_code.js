//declare State
const state = {
    coupon_code_list:[],
    edit_id: '',
};

//declare Getters
const getters = {
    couponCodes:(state)=>state.coupon_code_list,
    editCouponCodeId:(state)=>state.edit_id,
};

const actions = {
    async getCouponCodes({commit}){
        try {
            await axios.get('/admin/coupon-code/list')
                .then(response=>{
                    commit('setCouponList', response.data.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeCouponCode({commit}, from){
        try {
            return  await axios.post('/admin/coupon-code/store', from)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('storeCouponCode', response.data.data);
                    }
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async updateCouponInfo({commit},fromData){
        try {
            return await axios.put(`/admin/coupon-code/${fromData.id}/update`, fromData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateCouponData', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            return  error.data;
        }
    },
    async deleteCouponCode({commit}, couponId){
        try {
            return await axios.delete(`/admin/coupon-code/${couponId}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeCoupon', couponId);
                    }
                    commit('setResponse', response.data);
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
            return error.data;
        }
    },
    async editCouponCode({state}, couponId){
        state.edit_id = couponId;
    }
};

const mutations = {
    storeCouponCode:(state,response)=> state.coupon_code_list.unshift(response),
    removeCoupon:(state, couponId)=>state.coupon_code_list = state.coupon_code_list.filter(coupon=>coupon.id !==couponId),
    setCouponList:(state,response)=>state.coupon_code_list = response,
    updateCouponData:(state,response)=>{
        state.coupon_code_list = state.coupon_code_list.filter(coupon=>{
            if(coupon.id === response.id){
                coupon.title = response.title;
                coupon.code = response.code;
                coupon.amount = response.amount;
                coupon.min_order = response.min_order;
                coupon.qty = response.qty;
                coupon.expire = response.expire;
                coupon.status = response.status;
                coupon.is_live = response.is_live;
                coupon.attachment = response.attachment;
            }
            return coupon;
        });
    },

};

export default {
    state,
    getters,
    actions,
    mutations,
}
