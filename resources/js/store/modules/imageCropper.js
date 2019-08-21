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
    async uploadCropImage({commit},formData){
        try {
            return await axios.post('/crop_image/store',formData)
                .then(function (response) {

                    console.log(response);
                    commit('setCropImage',response.data);
                    return response.data;
                }).catch(function (errors) {
                    console.log(errors)
                });
        }catch (error) {
            console.log(error);
        }
    }

};

const mutations = {
    setCropImage:(state,response)=>{
        if(response.status === 'success'){
            response.attachments.forEach(file=>{
                state.cropImage.unshift(file);
                state.attachment_ids.push(file.id);
            });

        }else{
            state.errors = response;
        }
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
