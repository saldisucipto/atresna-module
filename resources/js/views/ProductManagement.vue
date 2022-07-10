<template>
    <div>
        <Transition v-if="message !== null" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>
        <admin>
            <section class="mb-10">
                <div class="">
                    <h1 class="text-xl uppercase font-bold text-dark-secondary">
                        Produk
                    </h1>
                    <span class="text-sm text-gray-800"
                        >| Ini Adalah Halaman Untuk Mengatur Produk</span
                    >
                </div>
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
                                Buat Produk Baru
                            </p>

                            <!-- Modal Close Button -->
                            <div class="modal-close cursor-pointer z-50">
                                <button @click="modalController()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- <img
                            v-if="this.images != null"
                            :src="'servis/' + this.images"
                            alt=""
                            class="max-h-56 mx-auto my-2"
                        /> -->

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
                                <div class="my-2 mx-3">
                                    <div class="flex gap-1 text-left mt-5">
                                        <div class="flex-1 flex flex-col">
                                            <label for="title"
                                                >Nama Produk</label
                                            >
                                            <input
                                                class="py-1 rounded-md px-2 active:outline-none focus:outline-none my-1"
                                                placeholder="Nama Produk"
                                                type="text"
                                                name=""
                                                id=""
                                                v-model="title"
                                                required
                                            />
                                        </div>
                                        <div class="flex-1 flex flex-col">
                                            <label for="title"
                                                >Pilih Kategori Produk</label
                                            >
                                            <select
                                                class="py-1 rounded-md px-2 active:outline-none focus:outline-none my-1"
                                                name=""
                                                id=""
                                                placeholder="Plih Kategori Produk"
                                            >
                                                <option
                                                    selected
                                                    aria-readonly="true"
                                                    disabled
                                                >
                                                    Pilih Kategori Produk
                                                </option>
                                                <option
                                                    aria-readonly="true"
                                                    value=""
                                                >
                                                    Kategori Produk
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex gap-1 text-left my-5">
                                        <div class="flex-1 flex flex-col">
                                            <label for="title"
                                                >Link Produk Tokopedia</label
                                            >
                                            <input
                                                class="py-1 rounded-md px-2 active:outline-none focus:outline-none my-1"
                                                placeholder="Link Produk Tokopedia "
                                                type="text"
                                                name=""
                                                id=""
                                                v-model="title"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="flex gap-1 text-left my-5">
                                        <div class="flex-1 flex flex-col">
                                            <label for="title"
                                                >Select Images</label
                                            >
                                            <input
                                                class="py-1 rounded-md active:outline-none focus:outline-none my-1"
                                                type="file"
                                                @change="selectImage()"
                                                accept="image/*"
                                                ref="imagesInput"
                                            />
                                        </div>
                                    </div>
                                    <div class="my-1 flex gap-1">
                                        <div
                                            v-for="images in imageProduct"
                                            :key="images"
                                            class="h-32 w-32 rounded-xl bg-white relative"
                                        >
                                            <img
                                                :src="previewImages(images)"
                                                class="object-cover rounded-xl"
                                                alt=""
                                            />
                                            <div
                                                class="absolute h-32 w-32 bg-black bg-opacity-40 rounded-xl top-0"
                                            >
                                                <div
                                                    class="flex flex-col justify-center text-center h-full text-white"
                                                >
                                                    <button>
                                                        <i
                                                            class="fas fa-trash"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col text-left my-5">
                                        <label for="title"
                                            >Deksripsi Produk</label
                                        >
                                        <ckeditor
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
                                    @click="updateAction()"
                                    type="button"
                                    class="block w-full bg-primary-color text-white py-1.5 px-3 rounded transition hover:bg-dark-secondary"
                                >
                                    Update Konten
                                </button>
                                <button
                                    @click="deleteAction()"
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
                                Create Produk
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
import http from "../services/http-config";
import CardLarge from "../components/Cards/CardLarge.vue";
import moment from "moment";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
    name: "ProductManagement",
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
            message: null,
            dbData: [],
            modal: true,
            moment: moment,
            images: null,
            modalUpdate: false,
            previewImage: [],
            curenntImage: null,
            title: null,
            slugs: null,
            imageProduct: [],
        };
    },
    computed: {},
    methods: {
        previewImages(imagesData) {
            return URL.createObjectURL(imagesData);
        },
        modalController() {
            this.modal = !this.modal;
            this.title = null;
            this.description = null;
            this.images = null;
            this.curenntImage = null;
            this.previewImage = null;
        },
        getData() {
            return http.get("servis").then((response) => {
                this.dbData = response.data.data;
            });
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
                .post("servis", form, config)
                .then((res) => {
                    this.message = res.data.message;
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
        selectImage() {
            this.imageProduct.push(this.$refs.imagesInput.files.item(0));
            // this.previewImage.push(URL.createObjectURL(this.imageProduct));
            // console.log(this.imageProduct);
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
                .post("servis/" + this.slugs + "/update", form, config)
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
                .delete("servis/" + this.slugs + "/update", config)
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

<style scoped></style>
