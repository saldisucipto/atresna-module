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
            <div class="grid grid-cols-5 gap-4">
                <div v-for="data in dbData" :key="data.id">
                    <h1>{{ data.nama }}</h1>
                </div>
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
        updateData(slugs) {
            this.modal = !this.modal;
            this.modalUpdate = true;
            let data = this.dbData.find(
                (element) => element.slugs.toLowerCase() === slugs
            );
            this.title = data.title;
            this.description = data.description;
            this.images = data.images_utama;
            this.slugs = slugs;
        },
        deleteAction() {
            const config = {
                headers: {
                    "Content-type": "multipart/form-data",
                },
            };
            return http
                .delete("static-contact/" + this.slugs + "/update", config)
                .then((response) => {
                    this.message = response.data.message;
                    this.getData();
                    setTimeout(() => {
                        this.message = null;
                        this.title = "";
                        this.editorData = "";
                        this.currentImage = "";
                        this.previewImage = null;
                        this.description = null;
                        this.modalUpdate = false;
                    }, 2000);
                    this.modal = false;
                });
        },
    },
    mounted() {
        this.getData();
    },
};
</script>

<style lang="scss" scoped></style>
