//declare State
const state = {
    warrantyType:[],
    dangersGoods:[],
    productColors:[],
    productSizes:[],
    productSkinTypes:[],
    allProducts:[],
    singleProduct:{},
    product_type:[],
    status_list:[],
};

//declare Getters
const getters = {
    warrantyTypes:(state)=> state.warrantyType,
    dangersGoods:(state)=> state.dangersGoods,
    productColors:(state)=>state.productColors,
    sizes:(state)=>state.productSizes,
    skinTypes:(state)=>state.productSkinTypes,
    products:(state)=>state.allProducts,
    product:(state)=>state.singleProduct,
    productType:(state)=>state.product_type,
    productStatus:(state)=>state.status_list,
};

const actions = {
    async getProductCreateDependency({commit},catID){
        try {
            await axios.get(`/seller/product/dependency/${catID}`)
                .then(response=>{
                    commit('productCreateDependency', response.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getProductCreateNeedData({commit}){
        try {
            await axios.get(`/seller/product/create`)
                .then(response=>{
                    commit('productCreateNeedData', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getProducts({commit}){

        try {
            return await axios.get('/seller/collection/product')
                .then(response=>{
                    commit('getProductData', response.data);
                    return response;
                })
        }catch (error) {
            commit('getProductData', error.data)
        }
    },
    async sellerStoreProductData({commit}, fromData){
        try {
            return await axios.post('/seller/product', fromData)
                .then(response=>{
                    commit('setResponse',response.data);
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async singleProduct({commit}, productID){
        try {
            return await axios.get(`/seller/product/${productID}`)
                .then(response=>{
                    console.log(response);
                    if(response.data.status === 'error'){
                        return response.data;
                    }else{
                        commit('singleProductData', response.data.data);
                    }
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    productCreateDependency:(state,response)=>{
        state.productColors = response.colors;
        state.productSizes = response.sizes;
    },
    productCreateNeedData:(state,response)=>{
        state.warrantyType = response.warrantyType;
        state.dangersGoods = response.dangersGoods;
        state.productSkinTypes = response.skinTypes;
        state.product_type = response.product_type;
    },
    getProductData:(state, response)=>{
        state.allProducts = response.data;
    },
    singleProductData:(state, response)=>{
        state.singleProduct = response;
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
