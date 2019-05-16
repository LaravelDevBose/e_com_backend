//declare State
const state = {
    applyTo:[],
    voucherTypes:[],
    discountType:[],
};

//declare Getters
const getters = {
    applyTo:(state)=>state.applyTo,
    voucherTypes: (state)=> state.voucherTypes,
    discountTypes:(state)=>state.discountType,
};

const actions = {
    async getFormDate({commit}){
        try{
            const response = await axios.get('/admin/formData/voucher');
            commit('setFormData', response.data);
        }catch (error) {
            commit('setResponse', error.data);
        }
    },
    async storeVoucher({commit},formData){
        try {
            return await axios.post('/admin/voucher/store',formData)
                .then(response=>{
                    commit('setResponse', response.data);
                    return response.data;
                })
        }catch(error){
            commit('setResponse', error.data)
        }
    }
};

const mutations = {
    setFormData:(state, response)=>{

    setTimeout(function () {
        $.each(response.voucherType,function (key, value) {
            state.voucherTypes.push({id:key, text:value});
        });
        $.each(response.applyTo,function (key, value) {
            state.applyTo.push({id:key, text:value});
        });
        $.each(response.discountType,function (key, value) {
            state.discountType.push({id:key, text:value});
        });

    },800)


    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
