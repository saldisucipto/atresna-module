<template>
    <div class="">
        <admin>
            <section>
                <div class="grid md:grid-cols-2 my-3 gap-4">
                    <div
                        class="w-full h-full bg-gray-50 rounded-lg drop-shadow-lg"
                    >
                        <div class="p-3 flex flex-col justify-start gap-2">
                            <div>
                                <h1 class="text-gray-800 font-semibold text-lg">
                                    Company Information
                                </h1>
                            </div>
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-col gap-1">
                                    <label
                                        class="text-sm text-gray-600 font-semibold"
                                        >Company Name</label
                                    >
                                    <input
                                        class="focus:outline-none focus-within:ring-0 focus:ring-0 focus:border-0 p-2 text-sm"
                                        type="text"
                                        placeholder="Company Name"
                                    />
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label
                                        class="text-sm text-gray-600 font-semibold"
                                        >Company Phone</label
                                    >
                                    <input
                                        class="focus:outline-none focus-within:ring-0 focus:ring-0 focus:border-0 p-2 text-sm"
                                        type="tel"
                                        placeholder="Company Phone"
                                        maxlength="13"
                                        minlength="10"
                                    />
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label
                                        class="text-sm text-gray-600 font-semibold"
                                        >Company WhatsApp Number</label
                                    >
                                    <input
                                        class="focus:outline-none focus-within:ring-0 focus:ring-0 focus:border-0 p-2 text-sm"
                                        type="tel"
                                        placeholder="Company Whats App Number"
                                        maxlength="13"
                                        minlength="10"
                                    />
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label
                                        class="text-sm text-gray-600 font-semibold"
                                        >Company Email</label
                                    >
                                    <input
                                        class="focus:outline-none focus-within:ring-0 focus:ring-0 focus:border-0 p-2 text-sm"
                                        type="email"
                                        placeholder="Company Email"
                                    />
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label
                                        class="text-sm text-gray-600 font-semibold"
                                        for=""
                                        >Company Address</label
                                    >
                                    <textarea
                                        cols="10"
                                        rows="5"
                                        class="focus:outline-none p-2 text-sm"
                                        placeholder="Company Address"
                                    ></textarea>
                                </div>
                                <div class="">
                                    <button
                                        type="submit"
                                        class="bg-blue-700 text-white text-sm py-2 px-8 drop-shadow-lg hover:bg-blue-400"
                                    >
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-full bg-gray-50">
                        <div class="flex flex-col gap-2 justify-start p-3">
                            <div>
                                <h1 class="text-gray-800 font-semibold text-lg">
                                    Company Logo
                                </h1>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center w-full">
                            <img
                                src="/images/logo.svg"
                                alt=""
                                class="mx-auto py-3 px-9 max-h-48"
                            />
                        </div>
                        <button
                            type="submit"
                            class="bg-blue-700 text-white text-sm py-2 px-8 ml-3 drop-shadow-lg hover:bg-blue-400"
                        >
                            Change Logo
                        </button>
                    </div>
                </div>
            </section>
        </admin>
    </div>
    <footer>
        <hr />
    </footer>
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
