import  Vue from 'vue'
require('../../../../js/bootstrap');

window.Vue = require('vue');

//Vue Date Time
import Datetime from 'vue-datetime'
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
import Notify from '../../../../js/helper/pNotify'
window.Notify = Notify;

import AppStorage from "../../../../js/helper/AppStorage";
window.AppStorage = AppStorage;

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('dashboard', require('./components/home/Dashboard').default);

new Vue({
    el: '#limitless_v2',
    store:store,
});
