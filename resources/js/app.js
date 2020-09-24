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

import AdminLogin from './components/auth/AdminLogin';
import Category from './components/category/Category';
import Color from './components/color/Color';
import Tag from './components/tag/Tag';
import SizeGroup from './components/size/SizeGroup';
import Attachment from './components/attachment/Attachment';
import ProductList from './components/product/ProductList';
import CreateProduct from './components/product/CreateProduct';
import ShowProduct from './components/product/ShowProduct';
import ImportData from "./components/helper/ImportData";
import Brand from './components/brand/Brand';
import SliderPage from './components/cms/slider/SliderPage';
import SliderCreatePage from "./components/cms/slider/SliderCreatePage";
import CreateGeneralPages from "./components/cms/pages/CreateGeneralPages";
import GeneralPagesList from "./components/cms/pages/GeneralPagesList";
import ShowGeneralPages from "./components/cms/pages/ShowGeneralPages";
import EditGeneralPages from "./components/cms/pages/EditGeneralPages";
import SettingPage from "./components/cms/setting/SettingPage";


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
        'product-list':ProductList,
        'create-product':CreateProduct,
        'show-product':ShowProduct,
        'slider-page':SliderPage,
        'slider-create-page':SliderCreatePage,
        'create-general-pages':CreateGeneralPages,
        'general-pages-list':GeneralPagesList,
        'show-general-pages':ShowGeneralPages,
        'edit-general-pages':EditGeneralPages,
        'setting-page':SettingPage,
    }
});
