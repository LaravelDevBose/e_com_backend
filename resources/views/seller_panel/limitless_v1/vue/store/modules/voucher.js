//declare State
const state = {
    applyTo:[],
    voucherTypes:[],
    discountType:[],
    voucherList:'',
};

//declare Getters
const getters = {
    applyTo:(state)=>state.applyTo,
    voucherTypes: (state)=> state.voucherTypes,
    discountTypes:(state)=>state.discountType,
    vouchers:(state)=> state.voucherList,
};

const actions = {
    async getVoucherList({commit}){
        const response = await axios.get('/admin/voucher_list');

        commit('setVoucherList', response.data.data);
    },
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
            return await axios.post('/admin/voucher',formData)
                .then(response=>{
                    commit('setResponse', response.data);
                    return response.data;
                })
        }catch(error){
            commit('setResponse', error.data)
        }
    },
    async voucherDelete({commit},voucherID){
        try{
            await axios.delete(`/admin/voucher/${voucherID}`)
                .then(response=>{
                    if(response.data.status === 'success'){
                        commit('deleteVoucher', voucherID);
                        commit('setResponse', response.data);
                        return response.data;
                    }else{
                        commit('setResponse', response.data);
                        return response.data;
                    }
                })
        }catch (error) {
            commit('setResponse', error.data);
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
    },
    setVoucherList(state,response){
        state.voucherList = response;
    },
    deleteVoucher(state,voucherID){
        state.voucherList = state.voucherList.filter(voucher=> voucher.id !== parseInt(voucherID))
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
