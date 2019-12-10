//declare State
const state = {
    brands_data:[],
    brand_list:[],
};

//declare Getters
const getters = {
    brands:(state)=> state.brands_data,
    brandList:(state)=>state.brand_list,
};

const actions = {
    async getAccountData({commit}){
        try {
            await axios.get('/admin/brands')
                .then(response=>{
                    commit('setBrands', response.data.data.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async getBrandList({commit}){
        try {
            await axios.get('/admin/brand/list')
                .then(response=>{
                    commit('setBrandList', response.data);
            })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeBrand({commit}, from){
        try {
            return  await axios.post('/admin/brand/store', from)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('storeBrand', response.data.data);
                    }
                    return response.data;
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async updateBrandInfo({commit},fromData){
        try {
            return await axios.put(`/admin/brand/${fromData.id}/update`, fromData)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('updateBrandData', response.data.data);
                    }
                    return response.data;
                });
        }catch (error) {
            return  error.data;
        }
    },
    async deleteBrand({commit}, brandID){
        try {
            return await axios.delete(`/admin/brand/${brandID}`)
                .then(response=>{
                    if(response.data.status === "success"){
                        commit('removeBrand', brandID);
                    }
                    commit('setResponse', response.data);
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
            return error.data;
        }
    }
};

const mutations = {
    setBrands:(state, response)=>state.brands_data = response,
    storeBrand:(state,response)=> state.brands_data.unshift(response),
    removeBrand:(state, brandId)=>state.brands_data = state.brands_data.filter(brand=>brand.id !==brandId),
    setBrandList:(state,response)=>state.brand_list = response,
    updateBrandData:(state,response)=>{
        state.brands_data = state.brands_data.filter(brand=>{
            if(brand.id == response.id){
                brand.id = response.id;
                brand.name = response.name;
                brand.status = response.status;
                brand.attachment = response.attachment;
            }
            return brand;
        });
    },

};

export default {
    state,
    getters,
    actions,
    mutations,
}
