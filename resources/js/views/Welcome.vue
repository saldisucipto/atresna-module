<template>
    <div class="">
        <Transition v-if="notif" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>

        <admin>
            <section class="hape:mt-16">
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
                                <div class="flex flex-col gap-1">
                                    <label
                                        class="text-sm text-gray-600 font-semibold"
                                        for=""
                                        >Company Maps Links</label
                                    >
                                    <textarea
                                        cols="10"
                                        rows="5"
                                        class="focus:outline-none p-2 text-sm"
                                        placeholder="Company Maps Links"
                                        v-model="company_maps_links"
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
                                id="parent"
                                v-if="
                                    company_image_logo ===
                                    '/path/images/images.png'
                                "
                                :src="previewImage"
                                alt=""
                                class="mx-auto py-3 px-9 max-h-48"
                            />
                            <img
                                id="parent1"
                                v-else-if="company_image_logo === currentImage"
                                :src="previewImage"
                                alt=""
                                class="mx-auto py-3 px-9 max-h-48"
                            />

                            <img
                                id="parent1"
                                v-else
                                :src="'/logo-images/' + company_image_logo"
                                alt=""
                                class="mx-auto py-3 px-9 max-h-48"
                            />
                            <div class="py-3 px-4">
                                <form
                                    class="flex"
                                    action=""
                                    enctype="multipart/form-data"
                                >
                                    <div class="flex-1">
                                        <input
                                            class=""
                                            type="file"
                                            accept="image/*"
                                            ref="imagesInput"
                                            @change="selectImage()"
                                            required="true"
                                        />
                                    </div>
                                    <div
                                        v-if="currentImage !== undefined"
                                        class="flex justify-center flex-1 h-10"
                                    >
                                        <button
                                            class="bg-blue-600 px-5 py-2 text-white rounded-xl hover:bg-secondary-color"
                                            type="submit"
                                            @click.prevent="changeImages()"
                                        >
                                            Change Logo
                                        </button>
                                    </div>
                                </form>
                            </div>
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
import UploadImageServices from "../services/UploadImageServices";
import SuccesNotifications from "../components/Notifications/SuccesNotifications.vue";
import { mapState } from "vuex";

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
            company_maps_links: "",
            currentImage: undefined,
            previewImage: "/images/logo.png",
            notif: false,
            message: "",
        };
    },
    components: {
        Admin,
        SalesChart,
        PieChart,
        SuccesNotifications,
    },
    computed: {
        ...mapState({
            isLoggedIn: "isLoggedIn",
            users: "users",
        }),
    },
    methods: {
        selectImage() {
            this.currentImage = this.$refs.imagesInput.files.item(0);
            this.company_image_logo = this.$refs.imagesInput.files.item(0);
            this.previewImage = URL.createObjectURL(this.currentImage);
        },
        getCompanyInfo() {
            CompanyInfoDataServices.getCompanyInfo()
                .then((response) => {
                    console.log(response.data);
                    (this.company_name = response.data.data.company_name),
                        (this.company_phone = response.data.data.company_phone),
                        (this.company_wa_number =
                            response.data.data.company_wa_number),
                        (this.company_email = response.data.data.company_email),
                        (this.company_image_logo =
                            response.data.data.company_image_logo),
                        (this.company_address =
                            response.data.data.company_address);
                    this.company_maps_links =
                        response.data.data.company_maps_links;
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
                company_maps_links: this.company_maps_links,
            };
            CompanyInfoDataServices.editCompanyInfo(data)
                .then((response) => {
                    this.notif = true;
                    this.message = response.data.message;
                    setTimeout(() => {
                        this.notif = false;
                    }, 2000);
                })
                .catch((e) => {
                    console.log(e);
                });
        },
        changeImages() {
            UploadImageServices.upload(this.currentImage).then((response) => {
                this.notif = true;
                this.message = response.data.message;
                this.$refs.imagesInput.value = null;
                setTimeout(() => {
                    this.notif = false;
                }, 2000);
            });
        },
    },
    mounted() {
        // get the company info
        this.getCompanyInfo();
        // this.getUserInfo();
    },
};
</script>

<style scoped>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>
