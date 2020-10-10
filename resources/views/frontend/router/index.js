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
            path: "/category/:category_slug/products",
            name: "Category Products",
            component: ()=> import("../pages/ProductsPage.vue"),
        },
        {
            path: "/all-category",
            name: "all_category",
            component: ()=> import("../pages/AllCategoryPage.vue"),
        },
        {
            path: "/brand/:brand_slug/products",
            name: "Brand Products",
            component: ()=> import("../pages/ProductsPage.vue"),
        },
        {
            path: "/section/:section_slug/products",
            name: "Section Products",
            component: ()=> import("../pages/ProductsPage.vue"),
        },
        {
            path: "/tag/:tag_slug/products",
            name: "TagProducts",
            component: ()=> import("../pages/ProductsPage.vue"),
        },
        {
            path: "/product/:slug",
            name: "Product",
            component: ()=> import("../pages/ProductDetailPage.vue"),
        },
        {
            path: "/page_not_found",
            name: "not_found",
            component: ()=> import("../pages/PageNotFound"),
        }
    ]
})
