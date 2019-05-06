import  Vue from 'vue'
require('./bootstrap');

window.Vue = require('vue');

import store from './store'


Vue.component('dashboard', require('./components/home/Dashboard').default);

import AdminLogin from './components/auth/AdminLogin';
import Category from './components/category/Category';
import Color from './components/color/Color';
import Tag from './components/tag/Tag';
import Size from './components/size/Size';




const app = new Vue({
    el: '#app',
    store:store,
    components:{
        AdminLogin,
        Category,
        Color,
        'tag':Tag,
        'size':Size,
    }
});
