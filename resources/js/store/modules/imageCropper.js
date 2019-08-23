//declare State
const state = {
    cropImages:[],
    errors:null,
    cropImageIds:[],

};

//declare Getters
const getters = {
    cropImages:(state)=>state.cropImages,
    cropImageIds:(state)=>state.cropImageIds,
};

const actions = {
    async uploadCropImage({commit},formData){
        try {
            return await axios.post('/crop_image/store',formData)
                .then(function (response) {
                    if(response.data.code === 200){
                        commit('setCropImage',response.data);
                    }else{
                        commit('setResponse', response.data)
                    }
                    return response.data;
                }).catch(function (errors) {
                    console.log(errors);
                    return errors;
                });
        }catch (error) {
            console.log(error);
            return error;
        }
    }

};

const mutations = {
    setCropImage:(state,response)=>{
        response.attachments.forEach(file=>{
            state.cropImages.unshift(file);
            state.cropImageIds.push(file.id);
        });
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
