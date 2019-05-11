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
import DeliveryCost from './components/deliveryCost/DeliveryCost';
import Campaign from './components/campaign/Campaign';
import Voucher from  './components/voucher/Voucher';
import CreateVoucher from './components/voucher/CreateVoucher';
import Attachment from './components/attachment/Attachment';


const app = new Vue({
    el: '#app',
    store:store,
    components:{
        AdminLogin,
        'attachment':Attachment,
        Category,
        Color,
        'tag':Tag,
        'size':Size,
        'delivery-cost':DeliveryCost,
        'campaign':Campaign,
        'voucher':Voucher,
        'create-voucher':CreateVoucher,

    }
});
