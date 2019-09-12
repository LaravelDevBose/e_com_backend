import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);


import product from "./modules/product";
import general_modules from "./modules/general_modules";
import productHelper from "./modules/helper/productHelper";
import excel_import from "./modules/helper/excel_import";
import attachment from "./modules/attachment";
import imageCropper from "./modules/imageCropper";
import campaign from "./modules/campaign";

export default new Vuex.Store({
    state:{
        resData:'',
        attachmentsFile:[],
        errors:null,
        attachment_ids:[],

    },
    getters:{

    },
    actions:{

    },
    mutations:{
        setResponse:(state, res)=>{
            state.resData = res;
        }
    },
    modules:{
        product,
        general_modules,
        productHelper,
        excel_import,
        attachment,
        imageCropper,
        campaign,
    }
})


