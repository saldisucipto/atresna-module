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
                                :src="'/news-artikel/' + konten.images_utama"
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
        <!-- Modal -->
        <div v-if="modal" class="fixed z-10 inset-0 overflow-y-auto" id="modal">
            <div
                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    >&#8203;</span
                >

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
                >
                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                    <div class="py-4 text-left px-6">
                        <!--Title-->
                        <div class="flex justify-between items-center pb-4">
                            <p
                                class="text-2xl font-bold"
                                v-if="this.title != null"
                            >
                                Update {{ this.title }}
                            </p>
                            <p v-else class="text-2xl font-bold">
                                Buat Data Baru
                            </p>

                            <!-- Modal Close Button -->
                            <div class="modal-close cursor-pointer z-50">
                                <button @click="modalController()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <img
                            v-if="this.images != null"
                            :src="'news-artikel/' + this.images"
                            alt=""
                            class="max-h-56 mx-auto my-2"
                        />

                        <form
                            enctype="multipart/form-data"
                            method="POST"
                            ref="formrEF"
                        >
                            <span
                                v-if="this.message != null"
                                class="text-xs text-red-600 my-3"
                            >
                                {{ message }}
                            </span>
                            <div
                                class="w-full bg-gray-200 h-full mb-4 rounded-md flex flex-col justify-evenly text-center"
                            >
                                <div
                                    v-if="previewImage == null"
                                    class="mx-auto mt-5"
                                >
                                    <i class="fas fa-plus"></i>
                                    <span>Tambahkan Gambar Utama</span>
                                </div>

                                <div
                                    v-else
                                    class="flex justify-center gap-2 mx-3 my-2"
                                >
                                    <div>
                                        <img
                                            :src="previewImage"
                                            alt="Image"
                                            class="max-h-52"
                                        />
                                    </div>

                                    <div
                                        class="flex h-52 flex-col justify-center"
                                    >
                                        <h1
                                            class="text-gray-900 text-sm font-bold"
                                        >
                                            <i class="fas fa-info"></i> Gambar
                                            Baru Sebelum di Upload Ke Server
                                        </h1>
                                    </div>
                                </div>
                                <input
                                    type="file"
                                    class="mx-3 mb-1"
                                    accept="image/*"
                                    ref="imagesInput"
                                    @change="selectImage()"
                                    required
                                />
                                <div class="my-2 flex flex-col mx-3">
                                    <div class="flex flex-col text-left">
                                        <label for="title">Judul Posting</label>
                                        <input
                                            class="py-1 rounded-md px-2 active:outline-none focus:outline-none my-1"
                                            placeholder="Judul Posting Konten"
                                            type="text"
                                            name=""
                                            id=""
                                            v-model="title"
                                            required
                                        />
                                    </div>
                                    <div class="flex flex-col text-left">
                                        <label for="title"
                                            >Isi Konten Posting</label
                                        >
                                        <ckeditor
                                            class="h-28"
                                            :editor="editor"
                                            v-model="description"
                                            :config="editorConfig"
                                            aria-required="true"
                                        ></ckeditor>
                                    </div>
                                </div>
                            </div>

                            <div v-if="modalUpdate" class="flex gap-4">
                                <button
                                    @click="updateAction(this.slugs)"
                                    type="button"
                                    class="block w-full bg-primary-color text-white py-1.5 px-3 rounded transition hover:bg-dark-secondary"
                                >
                                    Update Konten
                                </button>
                                <button
                                    @click="deleteAction(this.slugs)"
                                    type="button"
                                    class="block w-full bg-red-600 text-white py-1.5 px-3 rounded transition hover:bg-dark-secondary"
                                >
                                    Delete Post
                                </button>
                            </div>

                            <button
                                @click="createPOST()"
                                type="button"
                                v-else
                                class="block w-full bg-dark-secondary text-white py-1.5 px-3 rounded transition hover:bg-primary-color"
                            >
                                Create Konten
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
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
    name: "NewsAndArtikel",
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
            images: null,
            modalUpdate: false,
            previewImage: null,
            curenntImage: null,
            title: null,
            slugs: null,
            singleData: [],
        };
    },
    methods: {
        modalController() {
            this.modal = !this.modal;
            this.title = null;
            this.description = null;
            this.images = null;
            this.curenntImage = null;
            this.previewImage = null;
        },
        selectImage() {
            this.curenntImage = this.$refs.imagesInput.files.item(0);
            this.previewImage = URL.createObjectURL(this.curenntImage);
        },
        createPOST() {
            let form = new FormData();
            form.append("title", this.title);
            form.append("description", this.description);
            form.append("images", this.curenntImage);
            const config = {
                headers: {
                    "Content-type": "multipart/form-data",
                },
            };
            return http
                .post("/news-artikel/create", form, config)
                .then((response) => {
                    // console.log(response.data.message);
                    this.message = response.data.message;
                    this.getData();
                    setTimeout(() => {
                        this.message = null;
                        this.title = "";
                        this.editorData = "";
                        this.currentImage = "";
                        this.previewImage = null;
                        this.description = null;
                    }, 2000);
                    this.modal = !this.modal;
                })
                .catch((e) => console.log(e));
        },
        async getData() {
            return http.get("news-artikel").then((response) => {
                this.dbData = response.data.data;
            });
        },
        dataFormat(input) {
            var d = new Date(Date.parse(input.replace(/-/g, "/")));
            var month = [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ];
            var date =
                d.getDay().toString() +
                " " +
                month[d.getMonth().toString()] +
                ", " +
                d.getFullYear().toString();
            return date;
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
        updateAction() {
            let form = new FormData();
            form.append("title", this.title);
            form.append("description", this.description);
            form.append("images", this.curenntImage);
            const config = {
                headers: {
                    "Content-type": "multipart/form-data",
                },
            };
            return http
                .post("news-artikel/" + this.slugs + "/update", form, config)
                .then((response) => {
                    // console.log(response.data.message);
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
                })
                .catch((e) => console.log(e));
        },
        deleteAction() {
            const config = {
                headers: {
                    "Content-type": "multipart/form-data",
                },
            };
            return http
                .delete("news-artikel/" + this.slugs + "/update", config)
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
