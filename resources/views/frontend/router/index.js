import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import HomePage from "../pages/HomePage";
export default new Router({
    mode: 'history',
    routes:[
        {
            path: "/",
            name: "Home",
            component: HomePage,
        },
        {
            path: "/about",
            name: "About Us",
            component: ()=>import("../pages/AboutPage.vue")
        },
        {
            path: "/category/:slug/products",
            name: "Category Products",
            component: ()=> import("../pages/ProductsPage.vue"),
        }
    ]
})
