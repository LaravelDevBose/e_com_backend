//declare State
const state = {
    active_section: 1,
    delivery_methods: [],
    checkout_data:{
        shipping_info:{},
        delivery_method_id: 0,
        coupon_id:'',
    },
    coupon_amount: 0,
    order_info: {},
};

//declare Getters
const getters = {
    deliveryMethods:(state) => state.delivery_methods,
    activeSection:(state) => state.active_section,
    checkoutData: (state) => state.checkout_data,
    couponAmount: (state) => state.coupon_amount,
    orderInfo: (state) => state.order_info,
};

const actions = {
    async checkoutSection({state, commit}, data){
        if (data > 1 && jQuery.isEmptyObject(state.checkout_data.shipping_info)){
            commit('updateResponse', {message: "Please enter shipping information", type: 'Warning'});
            data = 1;
        }else if(data > 2 && !state.checkout_data.delivery_method_id){
            commit('updateResponse', {message: "Please enter delivery information", type: 'Warning'});
            data = 2;
        }else{
            state.active_section = data;
        }

    },
    async updateShippingInfo({state, commit}, data){
        state.checkout_data.shipping_info = data;
        state.active_section = 2;
        commit('updateResponse', {message: "Shipping Information Update", type: 'Success'});
    },
    async selectedDeliveryMethod({state, commit}, data){
        state.checkout_data.delivery_method_id = data;
        state.active_section = 3;
        commit('updateResponse', {message: "Delivery Method Selected", type: 'Success'});
    },

    async getDeliveryMethods({commit}){
        try {
            await axios.get('/api/get/delivery-methods')
                .then(({data})=>{
                    commit('updateDeliveryMethod', data.data);
                });
        }catch (error) {
            console.log(error);
        }
    },
    async couponCodeApply({state, commit}, code){
        try {
            return await axios.post('/api/coupon-apply', code)
                .then(({data}) =>{
                    if(data.status === 200){
                        commit('updateVoucherInfo', data.data);
                        commit('updateResponse', {message: data.message, type: data.statusText});
                    }else if(data.status === 400){
                        commit('updateResponse', {message: data.message, type: 'Warning'});
                    }else{
                        commit('updateResponse', {message: "Invalid Coupon Information", type: 'Error'});
                    }
                    return data;
                });
        }catch (error){
            console.log(error);
            commit('updateResponse', {message: "Invalid Coupon Information", type: 'Error'});
        }
    },
    async orderSubmit({commit}, orderData){
        try {
            await axios.post('/api/buyer/order/store', orderData)
                .then(({data}) =>{
                    if(data.status === 201){
                        commit('updateOrderInfo', data.data);
                        commit('updateResponse', {message: data.message, type: data.statusText});
                    }else if(data.status === 400){
                        commit('updateResponse', {message: data.message, type: 'Warning'});
                    }else{
                        commit('updateResponse', {message: "Invalid Order Information", type: 'Error'});
                    }
                });
        }catch (error){
            console.log(error);
            commit('updateResponse', {message: 'Invalid Order Information', type: 'Error'});
        }
    }
};

const mutations = {
    updateDeliveryMethod:(state,response)=>{
        state.delivery_methods = response;
    },
    /*updateCheckoutInfo:(state,response)=>{
        state.shipping_data = response.shipping_data;
        state.shipping_method = response.shipping_method;
    }*/
    updateVoucherInfo:(state, response)=>{
        state.checkout_data.coupon_id = response.id;
        state.coupon_amount = response.amount;
    },
    updateOrderInfo:(state, response) =>{
        state.order_info = response;
        state.active_section = 4;
        state.carts =  [];
        state.qty =0;
        state.weight = 0;
        state.subtotal = 0;
        state.discount = 0;
        state.total = 0;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
