import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("../views/Welcome.vue"),
    },
    {
        path: "/user-management",
        component: () => import("../views/UserManagement.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
    linkActiveClass: "",
});

export default router;
