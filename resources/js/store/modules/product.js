//declare State
const state = {
    warrantyType:'',
    dangersGoods:'',
    productColors:'',
    productSizes:'',
    productSkinTypes:'',
};

//declare Getters
const getters = {
    warrantyTypes:(state)=> state.warrantyType,
    dangersGoods:(state)=> state.dangersGoods,
    productColors:(state)=>state.productColors,
    sizes:(state)=>state.productSizes,
    skinTypes:(state)=>state.productSkinTypes,
};

const actions = {
    async getProductCreateDependency({commit},catID){
        try {
            await axios.get(`/admin/create/product/dependency/${catID}`)
                .then(response=>{
                    commit('productCreateDependency', response.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeProductData({commit}, fromData){
        try {
            return axios.post('/admin/product', fromData)
                .then(response=>{
                    console.log(response);
                    commit('setResponse',response.data);
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    productCreateDependency:(state,response)=>{
        state.warrantyType = response.warrantyType;
        state.dangersGoods = response.dangersGoods;
        state.productColors = response.colors;
        state.productSizes = response.sizes;
        state.productSkinTypes = response.skinTypes;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
