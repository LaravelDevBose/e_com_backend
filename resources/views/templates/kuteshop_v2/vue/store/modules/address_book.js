//declare State
const state = {
    address_books:[],
};

//declare Getters
const getters = {
    addressBooks:(state)=>state.address_books,
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
    }
};

const mutations = {
    setAddressBooks:(state,response)=> {
        state.address_books = response;
    },
    setAddressBook:(state, response)=>{
        state.address_books.push(response);
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
