<template>
    <div class="bg-gray-100">
        <sidebar />
        <div class="relative md:ml-64">
            <admin-navbar />
            <header-stats />
        </div>
        <div class="z-10 relative md:ml-64 md:mt-28">
            <div class="absolute px-4 md:px-12 mx-auto w-full -m-24">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<script>
import AdminNavbar from "../components/Navbars/AdminNavbar.vue";
import Sidebar from "../components/Sidebar/Sidebar.vue";
import HeaderStats from "../components/Headers/HeaderStats.vue";
import FooterAdmin from "../components/Footers/FooterAdmin.vue";
export default {
    name: "Admin",
    components: {
        AdminNavbar,
        Sidebar,
        HeaderStats,
        FooterAdmin,
    },
};
</script>
