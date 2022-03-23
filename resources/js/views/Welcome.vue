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
                                        v-model="company_name"
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
                                        v-model="company_phone"
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
                                        v-model="company_wa_number"
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
                                        v-model="company_email"
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
                                        v-model="company_address"
                                    ></textarea>
                                </div>
                                <div class="">
                                    <button
                                        @click.prevent="changeCompanyInfo()"
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
                                v-if="
                                    company_image_logo ===
                                    '/path/images/images.png'
                                "
                                src="/images/logo.svg"
                                alt=""
                                class="mx-auto py-3 px-9 max-h-48"
                            />
                            <img
                                v-else
                                src="/images/logo.svg"
                                alt=""
                                class="mx-auto py-3 px-9 max-h-48"
                            />
                            <input
                                type="file"
                                name="images"
                                ref="imagesInput"
                            />
                        </div>
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
import CompanyInfoDataServices from "../services/CompanyInfoDataServices";

export default {
    name: "Welcome",
    data() {
        return {
            company_name: "",
            company_phone: "",
            company_wa_number: "",
            company_email: "",
            company_image_logo: "",
            company_address: "",
        };
    },
    components: {
        Admin,
        SalesChart,
        PieChart,
    },
    methods: {
        getCompanyInfo() {
            CompanyInfoDataServices.getCompanyInfo()
                .then((response) => {
                    (this.company_name = response.data.company_name),
                        (this.company_phone = response.data.company_phone),
                        (this.company_wa_number =
                            response.data.company_wa_number),
                        (this.company_email = response.data.company_email),
                        (this.company_image_logo =
                            response.data.company_image_logo),
                        (this.company_address = response.data.company_address);
                })
                .catch((e) => {
                    console.log(e);
                });
        },
        changeCompanyInfo() {
            var data = {
                company_name: this.company_name,
                company_phone: this.company_phone,
                company_wa_number: this.company_wa_number,
                company_email: this.company_email,
                company_address: this.company_address,
            };
            CompanyInfoDataServices.editCompanyInfo(data)
                .then((response) => {
                    console.log(response.data);
                })
                .catch((e) => {
                    console.log(e);
                });
        },
    },
    mounted() {
        // get the company info
        this.getCompanyInfo();
    },
};
</script>

<style scoped></style>
