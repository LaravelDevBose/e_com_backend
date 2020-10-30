import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);
import middleware from "./middleware";

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
            beforeEnter: middleware.ifHaveCartItem,
        },
        {
            path: "/login",
            name: "auth",
            component: ()=> import("../pages/AuthPage.vue"),
            beforeEnter: middleware.ifNotAuthenticated,
        },
        {
            path: "/checkout",
            name: "checkout",
            component: ()=> import("../pages/CheckoutPage.vue"),
            beforeEnter: middleware.ifAuthenticatedAndHaveCartItem,
        },
        {
            path: "/buyer",
            component: ()=> import("../pages/buyer/BuyerLayout.vue"),
            beforeEnter: middleware.ifAuthenticated,
            children:[
                {
                    path: "dashboard",
                    name: "dashboard",
                    component: ()=> import("../pages/buyer/Dashboard.vue"),
                    beforeEnter: middleware.ifAuthenticated,

                },
                {
                    path: "order/:order_no/invoice",
                    name: "invoice",
                    component: ()=> import("../pages/buyer/OrderDetailPage.vue"),
                    beforeEnter: middleware.ifAuthenticated,

                },
                {
                    path: "wishlist",
                    name: "wishlist",
                    component: ()=> import("../pages/buyer/WishListPage.vue"),
                    beforeEnter: middleware.ifAuthenticated,

                },
                {
                    path: "reviews",
                    name: "reviews",
                    component: ()=> import("../pages/buyer/ReviewPage.vue"),
                    beforeEnter: middleware.ifAuthenticated,

                },
                {
                    path: "add/:order_no/review",
                    name: "add_review",
                    component: ()=> import("../pages/buyer/AddReviewPage.vue"),
                    beforeEnter: middleware.ifAuthenticated,

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
