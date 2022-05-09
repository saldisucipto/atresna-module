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
