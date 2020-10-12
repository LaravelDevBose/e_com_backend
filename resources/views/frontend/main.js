import  Vue from 'vue'
require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.$baseUrl = window.BASE_URL;

import VueCarousel from '@chenfengyuan/vue-carousel';
Vue.use(VueCarousel);

import store from './store'
import router from './router';

import vSelect from 'vue-select'
Vue.component('v-select', vSelect);

import StarRating from 'vue-star-rating';
Vue.component('star-rating', StarRating);


import VueClazyLoad from 'vue-clazy-load';
Vue.use(VueClazyLoad);


import VueNoty from 'vuejs-noty'
Vue.use(VueNoty, {
    timeout: 2000,
    progressBar: true,
    layout: 'topRight'
})

const token = localStorage.getItem('token')
if (token) {
    axios.defaults.headers.common['Authorization'] = token
}


const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('mainApp', require('./MainApp').default);

const app = new Vue({
    el: '#main',
    store:store,
    router,
});
