import  Vue from 'vue'
require('../../../../js/bootstrap');

window.Vue = require('vue');

import store from './store'
import VueNoty from '../../../../js/helper/Noty'
Vue.use(VueNoty);

import CroppaImg from 'vue-croppa'
Vue.use(CroppaImg);

import AppStorage from "../../../../js/helper/AppStorage";
window.AppStorage = AppStorage;

import StarRating from 'vue-star-rating';
Vue.component('star-rating', StarRating);


import VueClazyLoad from 'vue-clazy-load';
Vue.use(VueClazyLoad);

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('dashboard', require('./components/auth/buyer/auth/BuyerAuthPage').default);

Vue.filter('two_digits', (value) => {
    if (value < 0) {
        return '00';
    }
    if (value.toString().length <= 1) {
        return `0${value}`;
    }
    return value;
});

const crocus_v2 = new Vue({
    el: '#crocus_v2',
    store:store,
});
