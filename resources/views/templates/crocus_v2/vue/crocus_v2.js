import  Vue from 'vue'
require('../../../../js/bootstrap');

window.Vue = require('vue');

import store from './store'
import Notify from '../../../../js/helper/pNotify'
window.Notify = Notify;

import AppStorage from "../../../../js/helper/AppStorage";
window.AppStorage = AppStorage;

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('dashboard', require('./components/home/Dashboard').default);

const crocus_v2 = new Vue({
    el: '#crocus_v2',
    store:store,
    components:{

    }
});
