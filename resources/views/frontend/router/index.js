import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);
import store from '../store';


const ifNotAuthenticated = (to, from, next) => {
    if (!store.getters.isAuthenticated) {
        next();
        return;
    }else if (store.getters.cartTotal && store.getters.cartTotal > 0){
        next('/checkout');
        return ;
    }else{
        next('/buyer/dashboard');
    }

}

const ifAuthenticated = (to, from, next) => {
    if (store.getters.isAuthenticated) {
        next();
        return;
    }
    next('/login');
}


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
            path: "/shopping-bag",
            name: "shopping_bag",
            component: ()=> import("../pages/CartPage.vue"),
        },
        {
            path: "/login",
            name: "auth",
            component: ()=> import("../pages/AuthPage.vue"),
            beforeEnter: ifNotAuthenticated,
        },
        {
            path: "/checkout",
            name: "checkout",
            component: ()=> import("../pages/CheckoutPage.vue"),
            beforeEnter: ifAuthenticated,
        },
        {
            path: "/buyer",
            component: ()=> import("../pages/buyer/BuyerLayout.vue"),
            beforeEnter: ifAuthenticated,
            children:[
                {
                    path: "dashboard",
                    name: "dashboard",
                    component: ()=> import("../pages/buyer/Dashboard.vue"),
                    beforeEnter: ifAuthenticated,

                }
            ]
        },
        {
            path: "/page_not_found",
            name: "not_found",
            component: ()=> import("../pages/PageNotFound.vue"),
        }
    ]
})
