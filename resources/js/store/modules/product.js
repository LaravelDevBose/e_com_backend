//declare State
const state = {
    warrantyType:'',
    dangersGoods:'',
    productColors:'',
    productSizes:'',
    productSkinTypes:'',
    allProducts:'',
    singleProduct:'',
    selectedProIds:[],
    selected_date_time:[],

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
    selectedProIds:(state)=>state.selectedProIds,
    selectedDateTimes:(state)=>state.selected_date_time,
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
    },
    async singleProduct({commit}, productID){
        try {
            return await axios.get(`/admin/single/product/${productID}`)
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
    selectedProductIdUpdate({commit},selectData){
        commit('setSelectedProduct', selectData);
        return true;
    },
    selectedProductDateTimeUpdate({commit},selectData){
        commit('setSelectedDateTime', selectData);
        return true;
    },
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
    },
    singleProductData:(state, response)=>{
        state.singleProduct = response;
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

            state.selected_date_time.push({
                'productId':selectedData.productId,
                'date_time':selectedData.date_time
            });
        }else{
            state.selected_date_time = state.selected_date_time.filter(dateTime=>{
                if(dateTime.productId !== selectedData.productId){
                    return dateTime;
                }
            });
        }

    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
