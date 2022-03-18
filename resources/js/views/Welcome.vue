<template>
    <div class="">
        <admin>
            <section>
                <div class="grid md:grid-cols-2 my-3 gap-2">
                    <SalesChart />
                    <PieChart />
                </div>
            </section>
        </admin>
    </div>
</template>

<script>
import Admin from "../layouts/Admin.vue";
import SalesChart from "../components/Chart/SalesChart.vue";
import PieChart from "../components/Chart/PieChart.vue";

export default {
    name: "Welcome",
    data() {
        return {};
    },
    components: {
        Admin,
        SalesChart,
        PieChart,
    },
};
</script>

<style scoped></style>
