//declare State
const state = {
    start_dates: [],
    discount_percents:[],
    expire_ats:[],
    discount_products:[],
};

//declare Getters
const getters = {
    selectedExpireAts:(state)=>state.expire_ats,
    selectedStartDates:(state)=>state.start_dates,
    selectedPercents:(state)=>state.discount_percents,
    discountProductList:(state)=>state.discount_products,
};

const actions = {
    startDateUpdate({state},selectData){
        if(selectData.type === 'add'){
            let newPro = true;
            state.start_dates = state.start_dates.filter(dateTime=>{
                if(dateTime.productId === selectData.productId){
                    newPro = false;
                    dateTime.date_time = selectData.date_time;

                }
                return dateTime;
            });
            if (newPro){
                state.start_dates.push(selectData);
            }
        }else{
            state.start_dates = state.start_dates.filter(dateTime=>{
                if(dateTime.productId !== selectData.productId){
                    return dateTime;
                }
            });
        }
    },
    expireAtUpdate({state},selectData){
        if(selectData.type === 'add'){
            let newPro = true;
            state.expire_ats = state.expire_ats.filter(dateTime=>{
                if(dateTime.productId === selectData.productId){
                    newPro = false;
                    dateTime.date_time = selectData.date_time;

                }
                return dateTime;
            });
            if (newPro){
                state.expire_ats.push(selectData);
            }
        }else{
            state.expire_ats = state.expire_ats.filter(dateTime=>{
                if(dateTime.productId !== selectData.productId){
                    return dateTime;
                }
            });
        }
    },
    discountPercentUpdate({state},selectData){
        if(selectData.type === 'add'){
            let newPro = true;
            state.discount_percents = state.discount_percents.filter(dateTime=>{
                if(dateTime.productId === selectData.productId){
                    newPro = false;
                    dateTime.percent = selectData.percent;

                }
                return dateTime;
            });
            if (newPro){
                state.discount_percents.push(selectData);
            }
        }else{
            state.discount_percents = state.discount_percents.filter(dateTime=>{
                if(dateTime.productId !== selectData.productId){
                    return dateTime;
                }
            });
        }
    },

    async getDiscountProductList({commit}){
        try {
            await axios.get('/admin/discount-product/list')
                .then(response=>{
                    commit('setDiscountList', response.data.data);
                })
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async discountProductsStore({}, formData){
        try {
            return await axios.post('/admin/discount-product/store', formData)
                .then(response=>{
                    return response.data;
                })
        }catch (error) {
            console.log(error);
            commit('setResponse', error.data);
        }
    },
    async deleteDiscountProduct({commit},disProId){
        try {
            return await axios.delete(`/admin/discount-product/delete/${disProId}`)
                .then(response=>{
                    if(typeof response.data.code !== "undefined" && response.data.code === 200){
                        commit('removeDiscountProduct', disProId);
                    }
                    return response.data;
                })
        }catch (error) {
            commit('setResponse', error.data);
        }
    }
};

const mutations = {
    setDiscountList:(state, response)=>state.discount_products = response,
    removeDiscountProduct:(state, disProId)=> state.discount_products = state.discount_products.filter(disPro => disPro.id !== parseInt(disProId)),
};

export default {
    state,
    getters,
    actions,
    mutations,
}
