<template>
    <div class="w-full h-full bg-gray-50 p-2 rounded-md drop-shadow-md">
        <h1 class="text-gray-800 font-semibold text-lg">Sales Chart</h1>
        <canvas id="sales-chart"></canvas>
    </div>
</template>

<script>
import Chart from "chart.js";
import salesData from "./data";
export default {
    name: "SalesChart",
    data() {
        return {
            salesData: salesData,
        };
    },
    mounted() {
        const ctx = document.getElementById("sales-chart");
        new Chart(ctx, this.salesData);
    },
};
</script>

<style scoped></style>
b
