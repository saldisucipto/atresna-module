<template>
    <div>
        <Transition v-if="notif" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>
        <admin>
            <section>
                <div class="grid md:grid-cols-2 my-4 gap-2">
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
                        <!-- table -->
                        <table-user></table-user>
                    </div>
                </div>
            </section>
        </admin>
    </div>
</template>

<script>
import Admin from "../layouts/Admin.vue";
import SuccesNotifications from "../components/Notifications/SuccesNotifications.vue";
import TableUser from "../components/Table/TableUser.vue";
import ConfirmAlert from "../components/Alert/ConfirmAlert.vue";

export default {
    name: "UserManagement",
    components: {
        Admin,
        SuccesNotifications,
        TableUser,
        ConfirmAlert,
    },
};
</script>

<style scoped></style>
