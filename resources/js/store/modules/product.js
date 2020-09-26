//declare State
const state = {
    productColors:[],
    productSizes:[],
    allProducts:[],
    singleProduct:{},
    selectedProIds:[],
    selected_date_time:[],
    status_list:[],
    product_data:{},
    product_details:{},
    variations:[],
    product_images:[],
};

//declare Getters
const getters = {

    productColors:(state)=>state.productColors,
    sizes:(state)=>state.productSizes,
    products:(state)=>state.allProducts,
    product:(state)=>state.singleProduct,
    selectedProIds:(state)=>state.selectedProIds,
    selectedDateTimes:(state)=>state.selected_date_time,
    productStatus:(state)=>state.status_list,

    proData:(state)=>state.product_data,
    proDetails:(state)=>state.product_details,
    proVariations:(state)=>state.variations,
    proImages:(state)=>state.product_images,
};

const actions = {
    async getProductCreateDependency({commit},catID){
        try {
            await axios.get(`/admin/create/product/dependency/${catID}`)
                .then(response=>{
                    commit('productCreateDependency', response.data.data);
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getProductStatusList({commit}){
        try {
            await axios.get(`/admin/status/list/product`)
                .then(response=>{
                    commit('setProductStatusList', response.data.data);
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
    },
    async singleProduct({commit}, productID){
        try {
            return await axios.get(`/admin/single/product/${productID}`)
                .then(response=>{
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
    selectedProductIdUpdate({commit},selectData){
        commit('setSelectedProduct', selectData);
        return true;
    },
    selectedProductDateTimeUpdate({commit},selectData){
        commit('setSelectedDateTime', selectData);
        return true;
    },
    async productStatusChange({commit}, fromData){
        try {
            return await axios.post('/admin/product/status/update', fromData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateProductStatus', response.data.data);
                    }
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteProductImage({commit},imageId){
        try {
            return await axios.delete(`/admin/product/image/delete/${imageId}`,)
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
            return await axios.delete(`/admin/product/${reqData.product_id}/validation/${reqData.variation_id}/delete`,)
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
            return await axios.put(`/admin/product/${fromData.product_id}`, fromData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async deleteProductData({commit}, productId){
        try {
            return await axios.delete(`/admin/product/${productId}`)
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
        state.productColors = response.colors;
        state.productSizes = response.sizes;
    },
    getProductData:(state, response)=>{
        state.allProducts = response.data;
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
    setSelectedProduct:(state, selectData)=>{
        if(selectData.type === 'add'){
            state.selectedProIds.push(selectData.productId);
        }else{
            state.selectedProIds = state.selectedProIds.filter(productId=>{
                if(productId !== selectData.productId){
                    return productId;
                }
            });
        }

    },
    setSelectedDateTime:(state,selectedData)=>{
        if(selectedData.type === 'add'){
            state.selected_date_time.push(selectedData);
        }else{
            state.selected_date_time = state.selected_date_time.filter(dateTime=>{
                if(dateTime.productId !== selectedData.productId){
                    return dateTime;
                }
            });
        }

    },
    setProductStatusList:(state,response)=>state.status_list = response,

    updateProductStatus:(state,response)=>{
        state.allProducts = state.allProducts.filter(product=>{
            if(product.id === response.product_id){
                product.status = response.product_status;
                product.status_label = response.status_label;

            }
            return product;
        });
    },
    productImageRemove:(state,imageId)=>{
        state.product_images = state.product_images.filter(image=>{
            return image.id !== imageId;
        })
    },
    removeProductData:(state, productId)=> state.allProducts = state.allProducts.filter(product => product.id !== productId),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
