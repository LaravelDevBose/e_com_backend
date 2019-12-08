import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);



//import Modules
import  authentication from "./modules/authentication";
import  alertNotify  from './modules/includes/alertNotify'
import  modelNotify from './modules/includes/modelNotify'
import  pNotify from './modules/includes/pNotify'
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
import  slider from "./modules/cms/slider";
import  general_pages from "./modules/cms/general_pages";
import  setting from "./modules/cms/setting";
import order from "./modules/order";
import buyer from "./modules/buyer";
import shop from "./modules/shop";
import homepage_section from "./modules/homepage_section";
import group_products from "./modules/group_products";
import unpublish_product from "./modules/unpublish_product";
import delivery_method from "./modules/delivery_method";

export default new Vuex.Store({
    state:{
        resData:'',
        attachmentsFile:[],
        errors:null,
        attachment_ids:[],
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
        alertNotify,
        modelNotify,
        pNotify,
        authentication,
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
        slider,
        general_pages,
        setting,
        order,
        buyer,
        shop,
        homepage_section,
        group_products,
        unpublish_product,
        delivery_method,
    }
})


