import Vue from 'vue'
require('../../../../js/bootstrap');

window.Vue = require('vue');

import store from './store'
import VueNoty from '../../../../js/helper/Noty'
Vue.use(VueNoty);

import AppStorage from "../../../../js/helper/AppStorage";
window.AppStorage = AppStorage;

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('index', require('./components/IndexPage').default);

const crocus_v2 = new Vue({
    el: '#kuteshop_v1',
    store: store,
    components: {

    }
});
