//declare State
const state = {
    attachmentsFile:[],
    attachment_ids:[],

    attachment:'',
    attachment_id:'',
};

//declare Getters
const getters = {
    attachments:(state)=>state.attachmentsFile,
    attachment_ids: (state)=>state.attachment_ids,
    singleAttachment:(state)=>state.attachment,
    attachmentId: (state)=>state.attachment_id,
};

const actions = {
    async uploadAttachment({commit},formData){
        try {
            await axios.post('/attachment/store',formData,{
                            headers: {
                                // 'Content-Type': 'multipart/form-data; boundary=someArbitraryUniqueString',
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(function (response) {
                            if(response.data.status === 'success'){
                                commit('setAttachment',response.data);
                            }
                        }).catch(function (errors) {
                            console.log(errors)
                        });
        }catch (error) {
            console.log(error);
        }
    },
    async uploadSingleAttachment({commit},formData){
        try {
            await axios.post('/attachment/store',formData,{
                headers: {
                    // 'Content-Type': 'multipart/form-data; boundary=someArbitraryUniqueString',
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function (response) {
                if(response.data.status === 'success'){
                    commit('setSingleAttachment',response.data);
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
    setAttachment:(state,response)=>{
        response.attachments.forEach(file=>{
            state.attachmentsFile.unshift(file);
            state.attachment_ids.unshift(file.id);
        });

    },
    setSingleAttachment:(state,response)=>{
        state.attachment = response.attachments[0];
        state.attachment_id= response.attachments[0].id;
    },
    emptyAttachmentFile:(state)=>{
        state.attachmentsFile = [];
        state.attachment_ids = [];
    },

};

export default {
    state,
    getters,
    actions,
    mutations,
}
