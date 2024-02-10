import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import i18n from "../i18n";
import store from "../store";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeView,

        },
        {
            path: "/aboutus",
            name: "about",
            component: () => import("../views/AboutView.vue"),
        },
        {
            path: "/services",
            name: "services ",
            component: () => import("../views/ServicesView.vue"),
        },
        {
            path: "/contactus",
            name: "contactus",
            component: () => import("../views/ContactView.vue"),
        },
        {
            path: "/register",
            name: "register",
            component: () => import("../views/RegisterView.vue"),

        },
        {
            path: "/login",
            name: "login",
            component: () => import("../views/LoginView.vue"),

        },
        {
            path: "/forgetpassword",
            name: "forgetpassword",
            component: () => import("../views/ForgetPassword.vue"),
        },
        {
            path: "/resetPassword",
            name: "resetPassword",
            component: () => import("../views/RestPassword.vue"),
        },
        {
            path: "/logout",
            name: "logout",
        },
        {
            path: "/TermsAndConditions",
            name: "TermsAndConditions",
            component: () => import("../views/TermsView.vue"),
        },
        // not found
        {
            path: "/:pathMatch(.*)*",
            name: "NotFound",
            component: ()=> import("../components/Error404.vue")
        }

    ],
    scrollBehavior(to, from, savedPosition) {
        return savedPosition || { top: 0 };
    },
});

export default router;
