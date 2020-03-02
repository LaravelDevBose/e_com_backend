//declare State
const state = {
    address_books:[],
    address_info:{},
};

//declare Getters
const getters = {
    addressBooks:(state)=>state.address_books,
    addressInfo:(state)=>state.address_info,
};

const actions = {
    async getAddressBooks({commit},reqData=null){
        try {
            return await axios.get('/buyer/address-book/list',reqData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setAddressBooks', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },

    async storeAddressBook({commit},formData){
        try {
            return await axios.post('/buyer/address-book',formData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setAddressBook', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async getAddressBookInfo({commit},addressId){
        try {
            return await axios.get(`/buyer/address-book/${addressId}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('setAddress_bookInfo', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
    async addressBookUpdate({commit},formData){
        try {
            return await axios.put(`/buyer/address-book/${formData.address_id}/update`,formData)
                .then(response=>{
                    return response.data;
                });
        }catch (error) {
            console.log(error);
            return error.data;
        }
    },
};

const mutations = {
    setAddressBooks:(state,response)=> {
        state.address_books = response;
    },
    setAddressBook:(state, response)=>{
        state.address_books.push(response);
    },
    setAddress_bookInfo:(state, response)=>{
        console.log(response);
        state.address_info = response
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
