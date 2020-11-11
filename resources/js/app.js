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

import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

const files = require.context('./', true, /\.vue$/i, 'lazy').keys();
files.forEach(file => {
    Vue.component(file.split('/').pop().split('.')[0], () => import(`${file}`));
});
Vue.component('dashboard', ()=>import('./components/home/Dashboard'));


const app = new Vue({
    el: '#app',
    store:store,
});
