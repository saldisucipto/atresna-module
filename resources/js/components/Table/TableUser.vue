<template>
    <div>
        <Transition v-if="notif" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>
        <div class="flex flex-col gap-2 justify-start p-1">
            <div class="bg-white h-10 rounded-xl my-1">
                <div class="flex justify-between h-full mx-4">
                    <div class="flex-1 my-auto">Table Header</div>
                    <div class="flex-1 my-auto justify-end gap-1 flex">
                        <span class="text-xs font-semibold my-auto"
                            >Search</span
                        >
                        <input
                            class="bg-gray-100 rounded-xl px-2 m-1 text-sm py-1 active:outline-none focus:outline-none"
                            type="text"
                            placeholder="Search data"
                        />
                    </div>
                </div>
            </div>
            <button
                @click.prevent="modalController"
                class="my-1 bg-secondary-color text-xs w-20 text-white py-1 rounded-lg drop-shadow-lg"
            >
                New Data
                <span
                    class="font-bold w-2 h-2 bg-white text-secondary-color rounded-full px-1"
                    >+</span
                >
            </button>
            <div class="bg-white w-full rounded-xl">
                <div class="mx-2 py-1">
                    <table class="table-auto w-full">
                        <tr class="border-b-2 my-2">
                            <th class="font-semibold text-sm text-gray-800 w-4">
                                No
                            </th>
                            <th class="font-semibold text-sm text-gray-800 w-4">
                                Nama
                            </th>
                            <th class="font-semibold text-sm text-gray-800 w-4">
                                Email
                            </th>
                            <th class="font-semibold text-sm text-gray-800 w-4">
                                User Role
                            </th>
                            <th class="font-semibold text-sm text-gray-800 w-4">
                                Action
                            </th>
                        </tr>
                        <tr
                            v-for="userInfo in userData"
                            :key="userInfo.id"
                            class="w-full border-b-2"
                        >
                            <td
                                class="font-thin py-2 text-xs text-gray-800 text-center"
                            >
                                {{ userInfo.id }}
                            </td>
                            <td
                                class="font-thin py-2 text-xs text-gray-800 text-center"
                            >
                                {{ userInfo.name }}
                            </td>
                            <td
                                class="font-thin py-2 text-xs text-gray-800 text-center"
                            >
                                {{ userInfo.email }}
                            </td>
                            <td
                                class="font-thin py-2 text-xs text-gray-800 text-center"
                            >
                                {{ userInfo.user_role }}
                            </td>
                            <td
                                class="font-thin py-2 text-xs text-secondary-color cursor-pointer text-center"
                            >
                                <i class="fas fa-plus-circle"></i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
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
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                    <div class="py-4 text-left px-6">
                        <!--Title-->
                        <div class="flex justify-between items-center pb-4">
                            <p class="text-2xl font-bold">User Account</p>
                            <!-- Modal Close Button -->
                            <div class="modal-close cursor-pointer z-50">
                                <button @click.prevent="modalController">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form>
                            <span
                                v-if="this.message"
                                class="text-xs text-red-600 my-3"
                            >
                                {{ message_error }}
                            </span>
                            <!-- Name -->
                            <div class="mb-3">
                                <label class="inline-block mb-2">Name</label>
                                <input
                                    type="text"
                                    class="block w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                                    placeholder="Enter Name"
                                    v-model="this.name"
                                />
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="inline-block mb-2">Email</label>
                                <input
                                    type="email"
                                    class="block w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                                    placeholder="Enter Email"
                                    v-model="this.email"
                                />
                            </div>
                            <!-- Age -->
                            <div class="mb-3">
                                <label class="inline-block mb-2"
                                    >Role User</label
                                >
                                <select
                                    name="userRole"
                                    id=""
                                    class="block w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                                    aria-placeholder="Select User Role"
                                    v-model="this.user_role"
                                >
                                    <option disabled selected>
                                        Select User Role
                                    </option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="inline-block mb-2"
                                    >Password</label
                                >
                                <input
                                    type="password"
                                    class="block w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                                    placeholder="Password"
                                    v-model="this.password"
                                />
                            </div>
                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label class="inline-block mb-2"
                                    >Confirm Password</label
                                >
                                <input
                                    type="password"
                                    class="block w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                                    placeholder="Confirm Password"
                                    v-model="this.confirm_password"
                                />
                                <span
                                    v-if="this.message"
                                    class="text-xs text-red-600"
                                >
                                    {{ message_error }}
                                </span>
                            </div>
                            <button
                                @click.prevent="createNewUser"
                                class="block w-full bg-purple-600 text-white py-1.5 px-3 rounded transition hover:bg-purple-700"
                            >
                                Submit
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
import UserInfoDataServices from "../../services/UserInfoDataServices";
import SuccesNotifications from "../Notifications/SuccesNotifications.vue";

export default {
    name: "TableUser",
    data() {
        return {
            userData: [],
            modalCreate: false,
            name: null,
            email: null,
            password: null,
            confirm_password: null,
            user_role: null,
            message: false,
            notif: false,
            message: "",
        };
    },
    components: {
        SuccesNotifications,
    },
    methods: {
        modalController() {
            this.modalCreate = !this.modalCreate;
        },
        getUserInfo() {
            UserInfoDataServices.getUserData().then((resp) => {
                this.userData = resp.data;
            });
        },
        createNewUser() {
            // data
            let data = {
                name: this.name,
                email: this.email,
                password: this.password,
                user_role: this.user_role,
            };
            if (
                data.name == null &&
                data.email == null &&
                data.password == null &&
                data.user_role == null
            ) {
                this.modalCreate = true;
                this.message = true;
                this.message_error =
                    "Hai.. Ada Data Yang kosong di Kolomnya, Tolong lengkapi ya!";
                return;
            }
            // validated
            if (this.password !== this.confirm_password && this.name === null) {
                this.modalCreate = true;
                this.message = true;
                this.message_error =
                    "Passwordnya Nggas Sama Nih, Periksa Lagi ya";
                return;
            }
            UserInfoDataServices.createUser(data).then((resp) => {
                this.notif = true;
                this.message = resp.data.message;
                setTimeout(() => {
                    this.notif = false;
                    this.getUserInfo();
                }, 2000);
                this.name = null;
                this.email = null;
                this.password = null;
                this.user_role = null;
            });
            // console.log(data);
            this.modalCreate = !this.modalCreate;
            this.getUserInfo();
        },
    },
    mounted() {
        this.getUserInfo();
    },
};
</script>

<style scoped></style>
