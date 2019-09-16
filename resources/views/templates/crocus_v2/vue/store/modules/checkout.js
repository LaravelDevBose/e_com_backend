//declare State
const state = {
    address_list:[],
    billing_address:{},
    billing_address_id:'',
    shipping_address:{},
    shipping_address_id:'',
    shipping_method:'',
    payment_info:'',
};

//declare Getters
const getters = {
    addressList:(state)=>state.address_list,
    billingAddress:(state)=>state.billing_address,
    billingAddressId:(state)=>state.billing_address_id,
    shippingAddress:(state)=>state.shipping_address,
    shippingAddressId:(state)=>state.shipping_address_id,
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
        }
    },

    async storeAddressInfo({commit},formData){
        try {
            return await axios.post('/buyer/address-book',formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateAddressBook', response.data.data, formData.address_type);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
        }
    },
};

const mutations = {
    setAddressBookList:(state,response)=> {
        state.address_list = response.address_list;
    },
    updateAddressBook:(state,response)=> {
        let address = {
            id:response.address_id,
            text:response.full_address,
        };
        state.address_list.push(address);
        if(response.address_type === 1){
            state.billing_address = response;
            state.billing_address_id = response.address_id;
        }else{
            state.shipping_address = response;
            state.shipping_address_id = response.address_id;
        }
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
