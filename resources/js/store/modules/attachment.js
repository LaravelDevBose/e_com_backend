//declare State
const state = {
    attachmentsFile:[],
    errors:null,
    attachment_ids:[],
};

//declare Getters
const getters = {
    attachments:(state)=>state.attachmentsFile,
    attachment_ids: (state)=>state.attachment_ids,
};

const actions = {
    async uploadAttachment({commit},formData){
        try {
            console.log(formData);
            await axios.post('/attachment/store',formData,{
                            headers: {
                                // 'Content-Type': 'multipart/form-data; boundary=someArbitraryUniqueString',
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(function (response) {
                            commit('setAttachment',response.data);
                        }).catch(function (errors) {
                            console.log(errors)
                        });

            
        }catch (error) {
            console.log(error);
        }
    }

};

const mutations = {
    setAttachment:(state,response)=>{
        if(response.status === 'success'){
            response.attachments.forEach(file=>{
                console.log(file);
                state.attachmentsFile.unshift(file);
                state.attachment_ids.push(file.id);
            });
            
        }else{
            state.errors = response;
        }
    }
};

export default {
    state,
    getters,
    actions,
    mutations,
}
