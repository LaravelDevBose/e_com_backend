//declare State
const state = {
    attachments:[],
    errors:null,
    attachment_ids:[],
};

//declare Getters
const getters = {
    attachments:(state)=>state.attachments,
    attachment_ids: (state)=>state.attachment_ids,
};

const actions = {
    async uploadAttachment({commit},formData){
        try {

            // const response = await axios.post('',{formData});

            await axios.post('/attachment/store',formData,{
                            headers:{
                                'Content-Type': 'multipart/form-data'
                            }
                        }).then(function (response) {
                            console.log(response);
                        }).catch(function (errors) {
                            console.log(errors)
                        });

            commit('setAttachment',response.data)
        }catch (error) {
            console.log(error);
        }
    }
};

const mutations = {
    setAttachment:(state,response)=>{
        if(response.status === 'success'){
            response.forEach(file=>{
                state.attachments.unshift(file);
                state.attachment_ids.push(file.id);
            });
            console.log(response);
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
