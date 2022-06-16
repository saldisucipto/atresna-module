<template>
    <div>
        <Transition v-if="message !== null" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>
        <admin>
            <div v-if="dbData.length != 0" class="grid grid-cols-5 gap-4 py-10">
                <div v-for="data in dbData" :key="data.id">
                    <!-- <h1>{{ data.nama }}</h1> -->
                    <div
                        class="h-56 bg-indigo-300 rounded-lg drop-shadow-md p-2"
                    >
                        <!-- title -->
                        <div class="">
                            <div
                                class="text-gray-800 font-semibold flex flex-col justify-start gap-0"
                            >
                                <div class="flex justify-between">
                                    <h1>
                                        {{ data.nama }}
                                    </h1>
                                    <button
                                        type="button"
                                        @click="deleteAction(data.id)"
                                    >
                                        <i
                                            class="fas fa-trash text-red-500"
                                        ></i>
                                    </button>
                                </div>
                                <span class="text-white text-xs font-thin">{{
                                    moment(data.created_at).format("DD-MM-YYYY")
                                }}</span>
                                <div>
                                    <div class="my-1">
                                        <span
                                            class="text-gray-800 font-semibold"
                                            >Pesan :</span
                                        >
                                    </div>
                                    <div
                                        class="bg-gray-50 bg-opacity-50 p-1 rounded-md text-sm italic"
                                        v-html="data.description"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="h-full text-center py-10 font-bold">
                <h1><i>'Belum Ada Contact'</i></h1>
            </div>
        </admin>
    </div>
</template>

<script>
import SuccesNotifications from "../components/Notifications/SuccesNotifications.vue";
import Admin from "../layouts/Admin.vue";
import CardLarge from "../components/Cards/CardLarge.vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import http from "../services/http-config";
import moment from "moment";

export default {
    name: "Contact",
    components: {
        SuccesNotifications,
        Admin,
        CardLarge,
    },
    data() {
        return {
            editor: ClassicEditor,
            description: "isi posting",
            editorConfig: {
                // The configuration of the editor.
                width: 850,
            },
            moment: moment,
            modal: false,
            message: null,
            dbData: [],
            title: null,
            email: null,
            desc: null,
        };
    },
    methods: {
        async getData() {
            return http.get("/contact").then((response) => {
                // console.log(response);
                this.dbData = response.data;
            });
        },
        deleteAction(id) {
            const config = {
                headers: {
                    "Content-type": "multipart/form-data",
                },
            };
            return http.delete("contact/" + id, config).then((response) => {
                this.message = response.data.message;
                this.getData();
                setTimeout(() => {
                    this.message = null;
                }, 2000);
            });
        },
    },
    mounted() {
        this.getData();
    },
};
</script>

<style lang="scss" scoped></style>
