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
            <div class="flex gap-2">
                <div
                    class="flex-1 py-1 px-2 flex justify-start gap-2 text-gray-900 border-b-2 border-primary-color"
                >
                    <b>Show</b>
                    <select
                        v-model="curentEntries"
                        class="outline-none"
                        name=""
                        id=""
                        @change="paginateEntries"
                    >
                        <option
                            v-for="showEnt in showEntries"
                            :key="showEnt"
                            :value="showEnt"
                        >
                            {{ showEnt }}
                        </option>
                    </select>
                    <b>Entries</b>
                </div>
                <div class="flex-1 py-1 border-b-2 border-primary-color">
                    <div class="py-1">
                        <input
                            class="text-base placeholder:text-xs border border-secondary-color focus:outline-none px-2"
                            type="text"
                            placeholder="Search Data"
                        />
                    </div>
                </div>
            </div>
            <div v-if="dbData.length != 0" class="">
                <TableBase :column="columns" :entries="dbData" />
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
                                v-if="this.nama_produk !== null"
                            >
                                Update {{ this.nama_produk }}
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
                                            <label for="nama_produk"
                                                >Nama Produk</label
                                            >
                                            <input
                                                class="py-1 rounded-md px-2 active:outline-none focus:outline-none my-1"
                                                placeholder="Nama Produk"
                                                type="text"
                                                name=""
                                                id=""
                                                v-model="nama_produk"
                                                required
                                            />
                                        </div>
                                        <div class="flex-1 flex flex-col">
                                            <label for="id_kat_produk"
                                                >Pilih Kategori Produk</label
                                            >
                                            <select
                                                class="py-1 rounded-md px-2 active:outline-none focus:outline-none my-1"
                                                name=""
                                                id=""
                                                v-model="id_kat_produk"
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
                                                    v-for="kategori in dbKatData"
                                                    aria-readonly="true"
                                                    :value="kategori.slugs"
                                                >
                                                    {{
                                                        kategori.nama_kat_produk
                                                    }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex gap-1 text-left my-5">
                                        <div class="flex-1 flex flex-col">
                                            <label for="link_produk_tokopedia"
                                                >Link Produk Tokopedia</label
                                            >
                                            <input
                                                class="py-1 rounded-md px-2 active:outline-none focus:outline-none my-1"
                                                placeholder="Link Produk Tokopedia "
                                                type="text"
                                                name=""
                                                id=""
                                                v-model="link_produk_tokopedia"
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
                                                class="absolute h-32 w-32 bg-white bg-opacity-40 rounded-xl top-0"
                                            >
                                                <div
                                                    class="flex flex-col justify-center text-center h-full text-white"
                                                >
                                                    <button
                                                        @click.prevent="
                                                            deletePict(images)
                                                        "
                                                    >
                                                        <i
                                                            class="fa fa-trash-alt text-black fa-2x"
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
import uploadImagesServices from "../services/UploadImageServices";
import { strLimitTitle } from "../utils/utility";
import TableBase from "../components/Table/TableBase.vue";

export default {
    name: "ProductManagement",
    components: {
        SuccesNotifications,
        Admin,
        CardLarge,
        TableBase,
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
            dbKatData: [],
            modal: false,
            moment: moment,
            images: null,
            modalUpdate: false,
            previewImage: [],
            curenntImage: null,
            nama_produk: null,
            slugs: null,
            link_produk_tokopedia: null,
            id_kat_produk: null,
            imageProduct: [],
            imageProductFile: [],
            indexImage: 0,
            columns: [
                { name: "slugs", text: "ID" },
                { name: "nama_produk", text: "Nama Produk" },
                { name: "kat_produk", text: "Kategori Produk" },
                { name: "link_produk", text: "Link Ecommerce Produk" },
            ],
            showEntries: [5, 10, 20, 30, 50],
            curentEntries: 10,
            filterEntries: [],
        };
    },
    computed: {},
    methods: {
        previewImages(imagesData) {
            return URL.createObjectURL(imagesData);
        },
        strLimitTitle: strLimitTitle,
        modalController() {
            this.modal = !this.modal;
            this.nama_produk = null;
            this.link_produk_tokopedia = null;
            this.id_kat_produk = null;
            this.description = null;
            this.images = null;
            this.curenntImage = null;
            this.previewImage = null;
            this.modalUpdate = false;
        },
        getData() {
            return http.get("/product-management/produk").then((response) => {
                this.dbData = response.data.data;
            });
        },
        deletePict(pictData) {
            uploadImagesServices.remove_array_value(
                this.imageProduct,
                pictData
            );
            this.$refs.imagesInput.value = null;
        },
        async createPOST() {
            let form = new FormData();
            form.append("nama_produk", this.nama_produk);
            form.append("id_kat_produk", this.id_kat_produk);
            form.append("link_produk_tokopedia", this.link_produk_tokopedia);
            form.append("deskripsi_produk", this.description);
            this.imageProduct.forEach((element, index) => {
                form.append("images_produk[" + index + "]", element);
            });
            const config = {
                headers: {
                    "Content-type": "multipart/form-data",
                },
            };
            return http
                .post("product-management/produk", form, config)
                .then((res) => {
                    // console.log(form);
                    this.message = res.data.message;
                    this.getData();
                    setTimeout(() => {
                        this.message = null;
                        this.title = "";
                        this.editorData = "";
                        this.imageProduct = [];
                        this.previewImage = null;
                        this.nama_produk = null;
                        this.link_produk_tokopedia = null;
                        this.id_kat_produk = null;
                        this.description = null;
                    }, 2000);
                    // this.modal = !this.modal;
                })
                .catch((e) => console.log(e));
        },
        selectImage() {
            this.imageProduct.push(this.$refs.imagesInput.files.item(0));
            this.imageProduct.forEach((element) => {
                console.log(element, index);
            });
            console.log(this.imageProduct);
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
        async updateAction() {
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
        async deleteAction() {
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
        async getDataKategori() {
            return http.get("product-management/kategori").then((response) => {
                this.dbKatData = response.data.data;
            });
        },
        paginateEntries() {
            this.filterEntries = dbData.filterEntries;
        },
    },
    mounted() {
        this.getData();
        this.getDataKategori();
    },
};
</script>

<style scoped></style>
