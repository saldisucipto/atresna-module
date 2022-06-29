import { createRouter, createWebHistory } from "vue-router";
import store from "../module/store";

const routes = [
    {
        path: "/login",
        component: () => import("../views/auth/Login.vue"),
    },
    {
        path: "/",
        component: () => import("../views/Welcome.vue"),
        name: "Home",
        meta: {
            auth: true,
        },
    },
    {
        path: "/user-management",
        component: () => import("../views/UserManagement.vue"),
        meta: {
            auth: true,
        },
    },
    {
        path: "/static-management",
        component: () => import("../views/StaticManagement.vue"),
        name: "StaticManagement",
        meta: {
            auth: true,
        },
    },
    {
        path: "/why-choose-us",
        component: () => import("../views/WhyChooseUs.vue"),
        name: "WhyChooseUs",
        meta: {
            auth: true,
        },
    },
    {
        path: "/servis-management",
        component: () => import("../views/ServisManagement.vue"),
        name: "ServisManagement",
        meta: {
            auth: true,
        },
    },
    {
        path: "/contact",
        component: () => import("../views/Contact.vue"),
        name: "Contact",
        meta: {
            auth: true,
        },
    },
    {
        path: "/news",
        component: () => import("../views/NewsAndArtikel.vue"),
        name: "NewsAndArtikel",
        meta: {
            auth: true,
        },
    },
    {
        path: "/our-client",
        component: () => import("../views/OurClient.vue"),
        name: "OurClient",
        meta: {
            auth: true,
        },
    },
    {
        path: "/product-management",
        component: () => import("../views/ProductManagement.vue"),
        name: "ProductManagement",
        meta: {
            auth: true,
        },
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    linkActiveClass: "",
});

router.beforeEach((to, from, next) => {
    if (to.meta.auth) {
        let token = localStorage.getItem("token");
        // console.log(token);
        if (token === null) {
            next("/login");
            return;
        }
    }
    next();
    // return;
});

export default router;
