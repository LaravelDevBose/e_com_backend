//declare State
const state = {
    warrantyType:[],
    dangersGoods:[],
    product_colors:[],
    productSizes:[],
    productSkinTypes:[],
    allProducts:[],
    singleProduct:{},
    product_type:[],
    status_list:[],

    product_data:{},
    product_details:{},
    variations:[],
    product_images:[],
};

//declare Getters
const getters = {
    warrantyTypes:(state)=> state.warrantyType,
    dangersGoods:(state)=> state.dangersGoods,
    productColors:(state)=>state.product_colors,
    sizes:(state)=>state.productSizes,
    skinTypes:(state)=>state.productSkinTypes,
    products:(state)=>state.allProducts,
    product:(state)=>state.singleProduct,
    productType:(state)=>state.product_type,
    productStatus:(state)=>state.status_list,

    proData:(state)=>state.product_data,
    proDetails:(state)=>state.product_details,
    proVariations:(state)=>state.variations,
    proImages:(state)=>state.product_images,
};

const actions = {
    async getProductCreateDependency({commit},catID){
        try {
            await axios.get(`/seller/product/dependency/${catID}`)
                .then(response=>{
                    commit('productCreateDependency', response.data.data);
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
                    console.log(response);
                    commit('getProductData', response.data.data);
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
            return await axios.get(`/seller/single/product/${productID}`)
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
    },
    async deleteProductImage({commit},imageId){
        try {
            return await axios.delete(`/seller/product/image/delete/${imageId}`,)
                .then(function (response) {
                    commit('productImageRemove', imageId);
                    return response.data;
                }).catch(function (errors) {
                    console.log(errors);
                    commit('setResponse', errors.data);
                    return errors.data;
                });
        }catch (error) {
            console.log(error);
        }
    },
    async variationDataDelete({commit},reqData){
        try {
            return await axios.delete(`/seller/product/${reqData.product_id}/validation/${reqData.variation_id}/delete`,)
                .then(function (response) {
                    return response.data;
                }).catch(function (errors) {
                    console.log(errors);
                    commit('setResponse', errors.data);
                    return errors.data;
                });
        }catch (error) {
            console.log(error);
        }
    },
    async updateProductData({commit}, fromData){
        try {
            return await axios.put(`/seller/product/${fromData.product_id}`, fromData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteProductData({commit}, productId){
        try {
            return await axios.delete(`/seller/product/${productId}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeProductData', productId);
                    }
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
};

const mutations = {
    productCreateDependency:(state,response)=>{
        state.product_colors = response.colors;
        state.productSizes = response.sizes;
    },
    productCreateNeedData:(state,response)=>{
        state.warrantyType = response.warrantyType;
        state.dangersGoods = response.dangersGoods;
        state.productSkinTypes = response.skinTypes;
        state.product_type = response.product_type;
    },
    getProductData:(state, response)=>{
        state.allProducts = response;
    },
    singleProductData:(state, response)=>{
        state.singleProduct = response;

        state.product_details = response.details;
        delete response.details;
        state.variations = response.variations;
        delete response.variations;
        state.product_images = response.productImages;
        delete response.productImages;
        state.product_data = response;
    },
    productImageRemove:(state,imageId)=>{
        state.product_images = state.product_images.filter(image=>{
            return image.id !== imageId;
        })
    },
    removeProductData:(state, productId)=> {
        state.allProducts = state.allProducts.filter(product => {
            if(product.id !== productId){
                return product;
            }
        })
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
}
