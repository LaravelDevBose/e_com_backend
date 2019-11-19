//declare State
const state = {
    crop_images:[],
    errors:null,
    crop_imageIds:[],

};

//declare Getters
const getters = {
    cropImages:(state)=>state.crop_images,
    cropImageIds:(state)=>state.crop_imageIds,
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
    },
    resetCropImages({commit}){
        commit('emptyImageArray',true);
    }

};

const mutations = {
    setCropImage:(state,response)=>{
        response.attachments.forEach(file=>{
            state.crop_images.unshift(file);
            state.crop_imageIds.push(file.id);
        });
    },
    emptyImageArray:(state,length)=>{
        console.log(length);
        state.crop_images.length = 0;
        state.crop_imageIds.length = 0;
    },

};

export default {
    state,
    getters,
    actions,
    mutations,
}
