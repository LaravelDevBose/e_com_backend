//declare State
const state = {
    address_list:[],
    billing_address:{},
    billing_address_id:'',
    shipping_address:{},
    shipping_address_id:'',
    shipping_method:'',
    payment_info:{},
    payment_method_id:'',
    shipping_method_id:'',
    payment_methods:[],
    shipping_methods:[],
    shipping_price:'',
    billing:false,
    shopping:true,
    method:false,
    payment:false,
    cart_tab:false,
    charge:0,
    delivery_methods:[],
};

//declare Getters
const getters = {
    addressList:(state)=>state.address_list,
    billingAddress:(state)=>state.billing_address,
    billingAddressId:(state)=>state.billing_address_id,
    shippingAddress:(state)=>state.shipping_address,
    shippingAddressId:(state)=>state.shipping_address_id,
    paymentMethods:(state)=>state.payment_methods,
    shippingMethods:(state)=>state.shipping_methods,
    deliveryCharge:(state)=>state.shipping_price,
    paymentInfo:state=>state.payment_info,
    paymentMethodId:(state)=>state.payment_method_id,
    shippingMethodId:(state)=>state.shipping_method_id,
    billingTab:(state)=>state.billing,
    shoppingTab:(state)=>state.shopping,
    methodTab:(state)=>state.method,
    paymentTab:(state)=>state.payment,
    cartTab:(state)=>state.cart_tab,
    deliveryCost:(state)=>state.charge,
    deliveryMethods:(state)=>state.delivery_methods,
};

const actions = {
    async getAddressBookList({commit},reqData=null){
        try {
            return await axios.get('/buyer/checkout',reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setAddressBookList', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },

    async storeAddressInfo({commit},formData){
        try {
            return await axios.post('/buyer/address-book',formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        let resData = {
                            address:response.data.data,
                            is_shipping:formData.is_shipping
                        };
                        commit('updateAddressBook', resData);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async addAddressInfo({commit}, formData){
        try {
            commit('setAddressInfo', formData);
        }catch (e) {
            console.log(error);
            return error.data;
        }
    },
    async getAddressInfo({commit},reqData){
        try {
            return await axios.get(`/buyer/address-book/${reqData.address_id}/`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        let responseData = {
                            address:response.data.data,
                            reqData: reqData,
                        };
                        commit('setAddressBookInfo', responseData);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async storePaymentMethod({commit}, formData){
        // TODO Payment method added
        try {
            commit('setPaymentMethodInfo', formData);
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async storeShippingMethod({commit}, formData){
        // TODO Payment method added
        try {
            commit('setShippingMethodInfo', formData);
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    tabChange({commit},data){
        commit('setTabChange',data);
    },
    async orderProceed({commit},formData){
        try {
            return await axios.post('/buyer/order/store',formData)
                .then(response=>{
                    commit('placeOrder', response);
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    deliveryChargeUpdate({commit}, charge){
        commit('setDeliveryCharge', charge);
    }
};

const mutations = {
    setAddressBookList:(state,response)=> {
        state.address_list = response.address_list;
        state.payment_methods = response.payment_methods;
        state.shipping_methods = response.shipping_methods;
        state.shipping_price = response.shipping_price;
        state.delivery_methods = response.delivery_methods;
    },
    updateAddressBook:(state,response)=> {
        let address = {
            id:response.address.address_id,
            text:response.address.full_address,
        };
        state.address_list.push(address);
        if(response.address.address_type === 1){
            state.billing_address = response.address;
            state.billing_address_id = response.address.address_id;
            if(response.is_shipping === 1 || response.is_shipping === true){
                state.shipping_address = response.address;
                state.shipping_address_id = response.address.address_id;
            }
        }else{
            state.shipping_address = response.address;
            state.shipping_address_id = response.address.address_id;
        }
    },
    setAddressInfo:(state,formData)=>{
        if(formData.address_type === 1){
            state.billing_address = formData;
            if(formData.is_shipping === 1 || formData.is_shipping === true){
                state.shipping_address = formData;
            }
        }else{
            state.shipping_address = formData;
        }
    },
    setAddressBookInfo:(state,response)=>{
        if(response.reqData.address_type === 1){
            state.billing_address = response.address;
            state.billing_address_id  = response.address.address_id;
            if(response.reqData.is_shipping === 1 || response.reqData.is_shipping === true ){
                state.shipping_address = response.address;
                state.shipping_address_id  = response.address.address_id;
            }
        }else{
            state.shipping_address = response.address;
            state.shipping_address_id  = response.address.address_id;
        }
    },
    setPaymentMethodInfo:(state,response)=>{
        //TODO payment Details after using payment gatwaye
        state.payment_info = state.payment_methods[response.payment_method_id];
        state.payment_method_id = response.payment_method_id;
    },
    setShippingMethodInfo:(state,response)=>{
        // TODO payment Details after using payment gatwaye
        // state.payment_info = state.payment_methods[response.payment_method_id];
        state.shipping_method_id = response.shipping_method_id;
        state.charge = response.cost_price;
    },
    setTabChange:(state,data)=>{
        if(data.billing){
            state.billing = data.billing.tabAction
        }
        if(data.shopping){
            state.shopping = data.shopping.tabAction
        }
        if(data.method){
            state.method = data.method.tabAction
        }
        if(data.payment){
            state.payment = data.payment.tabAction
        }
        if(data.cart_tab){
            state.cart_tab = data.cart_tab.tabAction
        }
    },
    placeOrder:(state,response)=>{
        console.log(response);
    },
    setDeliveryCharge:(state, charge)=>state.charge = charge,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
