//declare State
const state = {
    warrantyType:'',
    dangersGoods:'',
    productColors:'',
    productSizes:'',
    productSkinTypes:'',
    allProducts:'',
};

//declare Getters
const getters = {
    warrantyTypes:(state)=> state.warrantyType,
    dangersGoods:(state)=> state.dangersGoods,
    productColors:(state)=>state.productColors,
    sizes:(state)=>state.productSizes,
    skinTypes:(state)=>state.productSkinTypes,
    products:(state)=>state.allProducts,
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
    async getProducts({commit}){

        try {
            return await axios.get('/admin/collection/product')
                .then(response=>{
                    commit('getProductData', response.data);
                    return response;
                })
        }catch (error) {
            commit('getProductData', error.data)
        }
    },
    async storeProductData({commit}, fromData){
        try {
            return await axios.post('/admin/product', fromData)
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
    },
    getProductData:(state, response)=>{
        state.allProducts = response.data;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
