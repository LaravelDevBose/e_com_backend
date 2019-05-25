//declare State
const state = {

};

//declare Getters
const getters = {

};

const actions = {
    async importData({commit},formData){
        try {
            return await axios.post(formData.url,formData.formData,{
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function (response) {
                if(response.data.status === "success"){
                    commit('setResponse',response.data.status);
                    return response.data.status;
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

};

export default {
    state,
    getters,
    actions,
    mutations,
}
