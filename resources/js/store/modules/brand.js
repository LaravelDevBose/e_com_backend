//declare State
const state = {
    brands:'',
    brandList:'',
};

//declare Getters
const getters = {
    brands:(state)=> state.brands,
    brandList:(state)=>state.brandList,
};

const actions = {
    async getBrands({commit}){
        try {
            await axios.get('/admin/brands')
                .then(response=>{
                    commit('setBrands', response.data.data);
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
                    if(response.data.res.status === "success"){
                        commit('storeBrand', response.data.brand);
                        commit('setResponse', response.data.res);
                        return response.data.res;
                    }else{
                        return  response.data;
                    }
                }).catch(error=>{
                    commit('setResponse', error.data);
                    return error.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
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
    setBrands:(state, response)=>state.brands = response,
    storeBrand:(state,response)=> state.brands.unshift(response),
    removeBrand:(state, brandId)=>state.brands = state.brands.filter(brand=>brand.id !==brandId),
    setBrandList:(state,response)=>state.brandList = response,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
