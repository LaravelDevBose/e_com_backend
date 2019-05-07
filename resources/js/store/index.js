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



export default new Vuex.Store({
    state:{},
    getters:{},
    actions:{

    },
    mutations:{},
    modules:{
        alertNotify,
        modelNotify,
        pNotify,
        login,
        category,
        color,
        tag,
        size,
        delivery_cost,
        campaign,

    }
})


