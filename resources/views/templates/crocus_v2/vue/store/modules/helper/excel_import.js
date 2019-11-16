//declare State
const state = {
    excel_status:0,
};

//declare Getters
const getters = {
    import_status:(state)=>state.excel_status,
};

const actions = {
    async importData({commit},formData){
        try {
            return await axios.post(formData.url,formData.formData,{
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function (response) {
                console.log(response)
                if(response.data.status === "success"){
                    commit('setImportSuccess',1);
                    commit('setResponse',response.data.status);
                    return response.data;
                }
            }).catch(function (errors) {
                console.log(errors)
            });


        }catch (error) {
            console.log(error);
        }
    }

};

const mutations = {
    setImportSuccess:(state, status)=>state.excel_status = status,
};

export default {
    state,
    getters,
    actions,
    mutations,
}
