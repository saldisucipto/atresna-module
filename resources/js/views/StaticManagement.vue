<template>
    <div>
        <Transition v-if="message !== null" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>
        <admin>
            <section>
                <div>
                    <button
                        @click="modalController()"
                        class="bg-dark-secondary text-white text-sm my-2 py-1 px-3 rounded-lg"
                    >
                        <i class="fas fa-plus"></i> Buat Statik Konten Baru
                    </button>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <card-static
                        v-for="konten in staticContent"
                        :key="konten.id"
                        class="overflow-hidden"
                    >
                        <template v-slot:images>
                            <div class="flex flex-col justify-center h-28">
                                <i
                                    v-if="konten.imagesFile == null"
                                    class="fas fa-image fa-4x text-gray-50"
                                ></i>
                                <img
                                    v-else
                                    :src="'/static-konten/' + konten.imagesFile"
                                    alt=""
                                    class="object-cover h-20"
                                />
                            </div>
                        </template>
                        <template v-slot:desc>
                            <div
                                class="h-28 flex flex-col justify-center text-white my-2"
                            >
                                <h1 class="font-bold text-xs capitalize">
                                    {{ konten.title }}
                                </h1>
                                <span
                                    class="font-thin text px-2 text-center text-xs bg-green-800 text-white rounded-md"
                                    v-if="konten.konten_untuk == 'HeroKonten'"
                                    >Konten Hero Pages</span
                                >
                                <span
                                    class="font-thin px-2 text-center text-xs bg-yellow-600 text-white rounded-md"
                                    v-else
                                    >Konten Isi Pages</span
                                >
                                <button
                                    class="my-1 rounded-md font-thin bg-gray-50 text-xs py-1 text-dark-secondary"
                                    @click="updateStatic(konten.id)"
                                >
                                    update
                                </button>
                            </div>
                        </template>
                    </card-static>
                </div>
            </section>
        </admin>
        <!-- Modal -->
        <div
            v-if="modalCreate"
            class="fixed z-10 inset-0 overflow-y-auto"
            id="modal"
        >
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
                            <p v-if="modalUpdate" class="text-2xl font-bold">
                                {{ this.title }}
                            </p>
                            <p v-else class="text-2xl font-bold">
                                Statik Konten
                            </p>

                            <!-- Modal Close Button -->
                            <div class="modal-close cursor-pointer z-50">
                                <button @click.prevent="modalController()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <img
                            v-if="images != null"
                            :src="'static-konten/' + images"
                            alt=""
                            class="max-h-56 mx-auto my-2"
                        />

                        <form
                            enctype="multipart/form-data"
                            method="POST"
                            ref="formCreate"
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
                                        <label for="title">Konten Untuk</label>
                                        <select
                                            v-model="konten_untuk"
                                            class="py-1 rounded-md px-2 active:outline-none focus:outline-none my-1"
                                            required
                                        >
                                            <option value="HeroKonten">
                                                Main Konten
                                            </option>
                                            <option value="IsiKonten">
                                                Static Konten
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col text-left">
                                        <label for="title"
                                            >Isi Konten Posting</label
                                        >

                                        <ckeditor
                                            class="h-28"
                                            :editor="editor"
                                            v-model="editorData"
                                            :config="editorConfig"
                                            aria-required="true"
                                        ></ckeditor>
                                    </div>
                                </div>
                            </div>

                            <div v-if="modalUpdate" class="flex gap-4">
                                <button
                                    @click="updateAction(this.id)"
                                    type="button"
                                    class="block w-full bg-primary-color text-white py-1.5 px-3 rounded transition hover:bg-dark-secondary"
                                >
                                    Update Konten
                                </button>
                                <button
                                    @click="deleteAction(this.id)"
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
        <!-- Alert Confrim -->
        <!-- <confirm-alert
            v-if="modalConfirm"
            @closedButton="this.modalConfirm = false"
            @deleteConfirm="deleteUser"
        >
            {{ this.name }} || {{ this.email }}
        </confirm-alert> -->
        <!-- End Confirm Alert -->
    </div>
</template>

<script>
import Admin from "../layouts/Admin.vue";
import SuccesNotifications from "../components/Notifications/SuccesNotifications.vue";
import ConfirmAlert from "../components/Alert/ConfirmAlert.vue";
import CardStatic from "../components/Cards/CardStatic.vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import StaticContentServis from "../services/StaticContentServis";
import http from "../services/http-config";

export default {
    name: "StaticManagement",
    data() {
        return {
            modalCreate: false,
            editor: ClassicEditor,
            editorData: null,
            editorConfig: {
                // The configuration of the editor.
                width: 850,
            },
            currentImage: null,
            previewImage: null,
            title: "",
            id: "",
            message: null,
            staticContent: [],
            images: null,
            modalUpdate: false,
            konten_untuk: null,
        };
    },
    components: {
        Admin,
        SuccesNotifications,
        ConfirmAlert,
        CardStatic,
    },
    methods: {
        modalController() {
            this.modalCreate = !this.modalCreate;
            this.modalUpdate = false;
            this.previewImage = null;
            this.currentImage = null;
            this.konten_untuk = null;
            this.modalUpdate = false;
            this.title = "";
            this.editorData = "";
            this.images = "";
        },
        getDataStaticContent() {
            StaticContentServis.getStaticCOntent().then((response) => {
                // console.log(response.data);
                this.staticContent = response.data;
                // console.log(this.staticContent);
            });
        },
        selectImage() {
            this.currentImage = this.$refs.imagesInput.files.item(0);
            this.previewImage = URL.createObjectURL(this.currentImage);
        },
        updateStatic(id) {
            StaticContentServis.getStaticInfo(id).then((res) => {
                // console.log(res.data);
                this.id = res.data.id;
                this.title = res.data.title;
                this.editorData = res.data.desc;
                this.images = res.data.imagesFile;
                this.konten_untuk = res.data.konten_untuk;
            });
            this.modalCreate = true;
            this.modalUpdate = true;
        },
        updateAction(id) {
            let form = new FormData();
            form.append("title", this.title);
            form.append("desc", this.editorData);
            form.append("imagesFile", this.currentImage);
            form.append("konten_untuk", this.konten_untuk);
            const config = {
                headers: {
                    "Content-type": "multipart/form-data",
                },
            };
            return http
                .post("/static-content/info/" + id, form, config)
                .then((res) => {
                    // console.log(res.data);
                    this.message = res.data.message;
                    this.getDataStaticContent();

                    setTimeout(() => {
                        this.message = null;
                        this.id = "";
                        this.title = "";
                        this.editorData = "";
                        this.currentImage = "";
                        this.konten_untuk = null;
                        this.previewImage = null;
                    }, 2000);
                    this.modalCreate = false;
                });
        },
        async deleteAction(id) {
            await StaticContentServis.deleteStatic(id).then((response) => {
                this.modalCreate = false;
                this.message = response.data.message;
                this.getDataStaticContent();
            });
            setTimeout(() => {
                this.message = null;
                this.currentImage = "";
            }, 1000);
        },
        createPOST() {
            if (
                this.title == "" ||
                this.editorData == null ||
                // this.currentImage == undefined ||
                this.konten_untuk == null
            ) {
                this.modalCreate = true;
                this.message =
                    "Hai.. Ada Data Yang kosong di Kolomnya, Tolong lengkapi ya!";
                return false;
            } else {
                let form = new FormData();
                form.append("title", this.title);
                form.append("desc", this.editorData);
                form.append("imagesFile", this.currentImage);
                form.append("konten_untuk", this.konten_untuk);
                const config = {
                    headers: {
                        "Content-type": "multipart/form-data",
                    },
                };
                return http
                    .post("/static-content/create", form, config)
                    .then((Response) => {
                        // console.log(Response.data);
                        this.message = Response.data.message;
                        this.getDataStaticContent();
                        setTimeout(() => {
                            this.message = null;
                            this.title = "";
                            this.editorData = "";
                            this.currentImage = "";
                            this.previewImage = null;
                            this.konten_untuk = null;
                        }, 2000);
                        this.modalCreate = false;
                    })
                    .catch((e) => console.log(e));
            }
        },
    },
    // mounted() {
    //     this.getDataStaticContent();
    // },
    beforeMount() {
        this.getDataStaticContent();
    },
};
</script>

<style scoped></style>
