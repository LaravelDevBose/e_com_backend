//declare State
const state = {
    addedProductIDs:[],
    imagesFile:[],
    image_ids:[],
};

//declare Getters
const getters = {
    selectedProductIDs:(state)=> state.addedProductIDs,
    productImages:(state)=>state.imagesFile,
    imageIds: (state)=>state.image_ids,
    pri_id: (state)=>state.pri_id,
};

const actions = {
    getActiveProducts({commit}, productIds){
        commit('setProductIds', productIds);
    },
    async uploadProductImage({commit},formData){
        try {
            return await axios.post('/admin/product/image/store',formData,{
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function (response) {

                if(response.status === 200){
                    commit('setProductImage', response.data);
                }
                let responseData= {
                    'status': response.data.status,
                    'message':response.data.message,
                };
                commit('setResponse', responseData);
                return responseData;

            }).catch(function (errors) {
                console.log(errors);
                commit('setResponse', errors.data);
                return errors.data;
            });


        }catch (error) {
            console.log(error);
        }
    },

};

const mutations = {
    setProductIds:(state, productIds)=>state.addedProductIDs = productIds,
    setProductImage:(state,response)=>{
        response.images.forEach(image=>{
            state.imagesFile.push(image);
            let d = {
                'pri_id':image.pri_id,
                'image_id':image.id,
            };
            state.image_ids.push(d);
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
