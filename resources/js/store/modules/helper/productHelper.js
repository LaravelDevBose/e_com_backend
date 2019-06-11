//declare State
const state = {
    addedProductIDs:[],
    imagesFile:{
        images:[],
    },
    errors:null,
    image_ids:{
        ids:[],
    },
};

//declare Getters
const getters = {
    selectedProductIDs:(state)=> state.addedProductIDs,
    productImages:(state)=>state.imagesFile,
    imageIds: (state)=>state.image_ids,
};

const actions = {
    getActiveProducts({commit}, productIds){
        commit('setProductIds', productIds);
    },
    async uploadProductImage({commit},formData){
        try {
            return await axios.post('/admin/product/image/store',formData,{
                headers: {
                    // 'Content-Type': 'multipart/form-data; boundary=someArbitraryUniqueString',
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(function (response) {
                if(response.data.status === "success"){
                    commit('setProductImage', response.data.attachments, formData.pri_id);
                }
                commit('setResponse', response.data);
                return response.data;

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
    setProductImage:(state,response, pri_id)=>{
        if(response.status === 'success'){
            response.forEach(file=>{
                state.imagesFile.images[pri_id].push(file);
                state.image_ids.ids[pri_id].push(file.id);
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
