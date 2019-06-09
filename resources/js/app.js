import  Vue from 'vue'
require('./bootstrap');

window.Vue = require('vue');

//Vue Date Time
import Datetime from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'
Vue.use(Datetime);
import { dateTime } from 'vue-datetime';
Vue.component('datetime', dateTime);


import store from './store'
import Notify from './helper/pNotify'
window.Notify = Notify;

Vue.component('dashboard', require('./components/home/Dashboard').default);

import AdminLogin from './components/auth/AdminLogin';
import Category from './components/category/Category';
import Color from './components/color/Color';
import Tag from './components/tag/Tag';
import SizeGroup from './components/size/SizeGroup';
import DeliveryCost from './components/deliveryCost/DeliveryCost';
import CreateCampaign from './components/campaign/CreateCampaign';
import Campaign from './components/campaign/Campaign';
import ShowCampaign from  './components/campaign/ShowCampaign';
import ManageCampaignProduct from './components/campaign/ManageCampaignProduct';
import Voucher from  './components/voucher/Voucher';
import CreateVoucher from './components/voucher/CreateVoucher';
import Attachment from './components/attachment/Attachment';
import ProductList from './components/product/ProductList';
import CreateProduct from './components/product/CreateProduct';
import ShowProduct from './components/product/ShowProduct';
import ImportData from "./components/helper/ImportData";
import Brand from './components/brand/Brand';



const app = new Vue({
    el: '#app',
    store:store,
    components:{
        AdminLogin,
        'attachment':Attachment,
        'import-date':ImportData,
        Category,
        Color,
        'brand':Brand,
        'tag':Tag,
        'size-group':SizeGroup,
        'delivery-cost':DeliveryCost,
        'create-campaign':CreateCampaign,
        'campaign':Campaign,
        'show-campaign':ShowCampaign,
        'manage-campaign-product':ManageCampaignProduct,
        'voucher':Voucher,
        'create-voucher':CreateVoucher,
        'product-list':ProductList,
        'create-product':CreateProduct,
        'show-Product':ShowProduct,
    }
});
