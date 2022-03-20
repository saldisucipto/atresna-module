<template>
    <!-- Header -->
    <div class="relative md:pt-24 pt-24 bg-dark-secondary pb-4">
        <div class="px-4 md:px-10 mx-auto w-full">
            <div>
                <!-- Card stats -->
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <card-stats
                            statSubtitle="TRAFFIC"
                            statTitle="350,897"
                            statArrow="up"
                            statPercent="3.48"
                            statPercentColor="text-emerald-500"
                            statDescripiron="Since last month"
                            statIconName="far fa-chart-bar"
                            statIconColor="bg-red-500"
                        />
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <card-stats
                            statSubtitle="PRODUCTS & SERVICES"
                            statTitle="2,356"
                            statArrow="down"
                            statPercent="3.48"
                            statPercentColor="text-red-500"
                            statDescripiron="Since last week"
                            statIconName="fas fa-chart-pie"
                            statIconColor=" bg-yellow-500 "
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardStats from "../Cards/CardStats.vue";

export default {
    components: {
        CardStats,
    },
};
</script>
