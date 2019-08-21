import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);



//import Modules
import  alertNotify  from './modules/includes/alertNotify'
import  modelNotify from './modules/includes/modelNotify'
import  pNotify from './modules/includes/pNotify'
import  login from './modules/login'
import  category from './modules/category'
import  color from './modules/color'
import  tag from './modules/tag'
import  size from './modules/size'
import  delivery_cost from "./modules/delivery_cost";
import  campaign from './modules/campaign';
import  voucher from './modules/voucher';
import  attachment from './modules/attachment';
import  productHelper from './modules/helper/productHelper';
import  product from './modules/product';
import  excel_import from './modules/helper/excel_import';
import  brand from './modules/brand';
import  skin_type from './modules/skin_type';
import  imageCropper from './modules/imageCropper';

export default new Vuex.Store({
    state:{
        resData:'',
    },
    getters:{},
    actions:{

    },
    mutations:{
        setResponse:(state, res)=>{
            state.resData = res;
        }
    },
    modules:{
        alertNotify,
        modelNotify,
        pNotify,
        login,
        attachment,
        category,
        color,
        tag,
        size,
        delivery_cost,
        campaign,
        voucher,
        productHelper,
        product,
        excel_import,
        brand,
        skin_type,
        imageCropper,
    }
})


