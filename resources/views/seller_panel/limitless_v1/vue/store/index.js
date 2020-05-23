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
import order from './modules/order';
import shop from "./modules/shop";
import setting from "./modules/setting";


export default new Vuex.Store({
    state:{
        resData:'',
        attachmentsFile:[],
        errors:null,
        attachment_ids:[],
        cityList :[
            { key: '0', text: 'All'},
            { key: '1', text: 'Bosaso'},
            { key: '2', text: 'Qardho'},
            { key: '3', text : 'Hargeisa'},
            { key: '4', text: 'Badhan'},
            { key: '5', text : 'Ceerigaabo'},
            { key: '6', text : 'Garowe'},
            { key: '7', text : 'Muqdisho'},
            { key: '8', text : 'Carmo'},
            { key: '9', text : 'Burco'},
            { key: '10', text : 'Boorama'},
        ]
    },
    getters:{
        cities:(state)=>state.cityList,
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
        order,
        shop,
        setting,
    }
})


