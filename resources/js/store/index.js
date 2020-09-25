import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);



//import Modules
import  authentication from "./modules/authentication";
import  category from './modules/category'
import  color from './modules/color'
import  tag from './modules/tag'
import  size from './modules/size'
import  attachment from './modules/attachment';
import  productHelper from './modules/helper/productHelper';
import  product from './modules/product';
import  excel_import from './modules/helper/excel_import';
import  brand from './modules/brand';
import  imageCropper from './modules/imageCropper';
import  slider from "./modules/cms/slider";
import  general_pages from "./modules/cms/general_pages";
import  setting from "./modules/cms/setting";
import order from "./modules/order";
import buyer from "./modules/buyer";
import delivery_method from "./modules/delivery_method";
import admin from "./modules/admin";
import seller from "./modules/seller";


export default new Vuex.Store({
    state:{
        resData:'',
        errors:null,
        paginate_data:[]

    },
    getters:{
        paginate:(state)=>state.paginate_data,
    },
    actions:{

    },
    mutations:{
        setResponse:(state, res)=>{
            state.resData = res;
        }
    },
    modules:{
        authentication,
        attachment,
        category,
        color,
        tag,
        size,
        productHelper,
        product,
        excel_import,
        brand,
        imageCropper,
        slider,
        general_pages,
        setting,
        order,
        buyer,
        delivery_method,
        admin,
        seller,
    }
})


