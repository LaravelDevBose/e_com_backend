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
import VueCarousel from '@chenfengyuan/vue-carousel';
Vue.use(VueCarousel);

import Croppa from 'vue-croppa'
Vue.use(Croppa);

Vue.use(require('vuejs-datatable'));
import store from './store'
import Notify from './helper/pNotify'
window.Notify = Notify;

import AppStorage from "./helper/AppStorage";
window.AppStorage = AppStorage;

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('dashboard', require('./components/home/Dashboard').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const AdminLogin = ()=> import('./components/auth/AdminLogin');
const Category = () => import( './components/category/Category');
const Color = () => import( './components/color/Color');
const Tag = () => import( './components/tag/Tag');
const SizeGroup = () => import( './components/size/SizeGroup');
const DeliveryCost = () => import( './components/deliveryCost/DeliveryCost');
const CreateCampaign = () => import( './components/campaign/CreateCampaign');
const Campaign = () => import( './components/campaign/Campaign');
const ShowCampaign = () => import(  './components/campaign/ShowCampaign');
const ManageCampaignProduct = () => import( './components/campaign/ManageCampaignProduct');
const Voucher = () => import(  './components/voucher/Voucher');
const CreateVoucher = () => import( './components/voucher/CreateVoucher');
const Attachment = () => import( './components/attachment/Attachment');
const ProductList = () => import( './components/product/ProductList');
const CreateProduct = () => import( './components/product/CreateProduct');
const ShowProduct = () => import( './components/product/ShowProduct');
const ImportData = () => import( "./components/helper/ImportData");
const Brand = () => import( './components/brand/Brand');
const SkinType = () => import( './components/skin_type/SkinType');
const SliderPage = () => import( './components/cms/slider/SliderPage');
const SliderCreatePage = () => import( "./components/cms/slider/SliderCreatePage");
const CreateGeneralPages = () => import( "./components/cms/pages/CreateGeneralPages");
const GeneralPagesList = () => import( "./components/cms/pages/GeneralPagesList");
const ShowGeneralPages = () => import( "./components/cms/pages/ShowGeneralPages");
const EditGeneralPages = () => import( "./components/cms/pages/EditGeneralPages");
const SettingPage = () => import( "./components/cms/setting/SettingPage");


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
        'show-product':ShowProduct,
        'skin-type':SkinType,
        'slider-page':SliderPage,
        'slider-create-page':SliderCreatePage,
        'create-general-pages':CreateGeneralPages,
        'general-pages-list':GeneralPagesList,
        'show-general-pages':ShowGeneralPages,
        'edit-general-pages':EditGeneralPages,
        'setting-page':SettingPage,
    }
});
