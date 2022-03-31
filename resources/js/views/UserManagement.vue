<template>
    <div>
        <Transition v-if="notif" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>
        <admin>
            <section>
                <div class="grid md:grid-cols-2 my-2 gap-2">
                    <div class="h-full rounded-md">
                        <div class="flex flex-col gap-3">
                            <div class="mx-auto">
                                <div
                                    class="h-32 w-32 rounded-full drop-shadow-xl bg-gray-200"
                                >
                                    <img
                                        class="object-cover h-32 w-32 rounded-full drop-shadow-xl"
                                        src="https://images.unsplash.com/photo-1648503013058-d83cf8d6b59b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <div>
                                <h1
                                    class="text-lg font-semibold text-secondary-color"
                                >
                                    Saldi Sucipto
                                </h1>
                                <h2 class="text-gray-800">
                                    saldisucipto@gmail.com
                                </h2>
                                <div class="flex flex-col justify-center">
                                    <span
                                        class="text-xs font-bold text-primary-color"
                                        >SuperAdmin</span
                                    >

                                    <button
                                        class="bg-green-700 text-white py-1 px-4 my-2 rounded-lg text-xs font-bold w-56 mx-auto"
                                    >
                                        <i class="fas fa-cogs"></i> Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-full rounded-md bg-gray-100">
                        <div class="flex flex-col gap-2 justify-start p-1">
                            <div class="bg-white h-10 rounded-xl my-1">
                                <div class="flex justify-between h-full mx-4">
                                    <div class="flex-1 my-auto">
                                        Table Header
                                    </div>
                                    <div
                                        class="flex-1 my-auto justify-end gap-1 flex"
                                    >
                                        <span
                                            class="text-xs font-semibold my-auto"
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
                            <div class="bg-white w-full rounded-xl">
                                <div class="mx-2 py-1">
                                    <table class="table-auto w-full">
                                        <tr class="border-b-2 my-2">
                                            <th
                                                class="font-semibold text-sm text-gray-800 w-4"
                                            >
                                                No
                                            </th>
                                            <th
                                                class="font-semibold text-sm text-gray-800 w-4"
                                            >
                                                Nama
                                            </th>
                                            <th
                                                class="font-semibold text-sm text-gray-800 w-4"
                                            >
                                                Email
                                            </th>
                                            <th
                                                class="font-semibold text-sm text-gray-800 w-4"
                                            >
                                                User Role
                                            </th>
                                            <th
                                                class="font-semibold text-sm text-gray-800 w-4"
                                            >
                                                Action
                                            </th>
                                        </tr>
                                        <tr class="w-full border-b-2">
                                            <td
                                                class="font-thin py-2 text-xs text-gray-800 text-center"
                                            >
                                                1
                                            </td>
                                            <td
                                                class="font-thin py-2 text-xs text-gray-800 text-center"
                                            >
                                                Saldi Sucipto
                                            </td>
                                            <td
                                                class="font-thin py-2 text-xs text-gray-800 text-center"
                                            >
                                                saldisucipto@gmail.com
                                            </td>
                                            <td
                                                class="font-thin py-2 text-xs text-gray-800 text-center"
                                            >
                                                Super Admin
                                            </td>
                                            <td
                                                class="font-thin py-2 text-xs text-secondary-color cursor-pointer text-center"
                                            >
                                                <i
                                                    class="fas fa-plus-circle"
                                                ></i>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </admin>
    </div>
</template>

<script>
import Admin from "../layouts/Admin.vue";
import SuccesNotifications from "../components/Notifications/SuccesNotifications.vue";

export default {
    name: "UserManagement",
    components: {
        Admin,
        SuccesNotifications,
    },
};
</script>

<style scoped></style>
