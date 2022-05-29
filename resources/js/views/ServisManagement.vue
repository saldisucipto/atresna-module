<template>
    <div>
        <Transition v-if="message !== null" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>
        <admin>
            <section class="mb-10">
                <div>
                    <button
                        @click="modalController()"
                        class="bg-dark-secondary text-white text-sm my-2 py-1 px-3 rounded-lg"
                    >
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </div>
            </section>
            <div v-if="dbData.length != 0" class="grid grid-cols-5 gap-4">
                <card-large
                    v-for="konten in dbData"
                    :key="konten.slugs"
                    class="overflow-hidden"
                >
                    <template v-slot:images>
                        <div class="flex flex-col justify-center mt-3 h-32">
                            <i
                                v-if="konten.images_utama == null"
                                class="fas fa-image fa-4x text-gray-50"
                            ></i>
                            <img
                                v-else
                                :src="'/servis/' + konten.images_utama"
                                alt=""
                                class="object-cover rounded-lg max-h-36 mx-2 mt-2"
                            />
                        </div>
                    </template>
                    <template v-slot:desc>
                        <div class="flex flex-col justify-center text-white">
                            <h1 class="font-bold justify-center my-1">
                                {{ konten.title }}
                            </h1>
                            <div
                                class="px-5 text-xs bg-green-500 text-white my-2 w-28 rounded-2xl"
                            >
                                {{
                                    moment(konten.created_at).format(
                                        "DD-MM-YYYY"
                                    )
                                }}
                            </div>
                            <button
                                class="my-1 rounded-md font-thin bg-gray-50 text-xs py-1 text-dark-secondary"
                                @click="updateData(konten.slugs)"
                            >
                                update
                            </button>
                        </div>
                    </template>
                </card-large>
            </div>
            <div v-else class="h-full text-center py-2 font-bold">
                <h1><i>'Belum Ada Data Pada Server'</i></h1>
            </div>
        </admin>
    </div>
</template>

<script>
import SuccesNotifications from "../components/Notifications/SuccesNotifications.vue";
import Admin from "../layouts/Admin.vue";
import http from "../services/http-config";
import CardLarge from "../components/Cards/CardLarge.vue";
import moment from "moment";

export default {
    name: "ServisManagement",
    components: {
        SuccesNotifications,
        Admin,
        CardLarge,
    },
    data() {
        return {
            message: null,
            dbData: [],
            modal: false,
            moment: moment,
        };
    },
    methods: {
        modalController() {},
        getData() {
            return http.get("servis").then((response) => {
                this.dbData = response.data.data;
            });
        },
    },
    mounted() {
        this.getData();
    },
};
</script>

<style scoped></style>
