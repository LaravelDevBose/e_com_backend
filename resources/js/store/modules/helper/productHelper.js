//declare State
const state = {
    addedProductIDs:[],
    imagesFile:[],
    errors:null,
    image_ids:[],
    pri_id:'',
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
            console.log(formData);
            return await axios.post('/admin/product/image/store',formData,{
                headers: {
                    // 'Content-Type': 'multipart/form-data; boundary=someArbitraryUniqueString',
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
                console.log(responseData);

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

    setVariationPriId({commit}, priId){
        commit('setPriId', priId);
        console.log(priId);
    }
};

const mutations = {
    setProductIds:(state, productIds)=>state.addedProductIDs = productIds,
    setPriId:(state, priId)=>state.pri_id = priId,
    setProductImage:(state,response)=>{
        response.images.forEach(image=>{
            state.imagesFile.push(image);
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
