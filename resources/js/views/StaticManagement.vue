<template>
    <div>
        <Transition v-if="notif" name="slide-fade">
            <succes-notifications>
                {{ message }}
            </succes-notifications>
        </Transition>
        <admin>
            <section>
                <div class="grid grid-cols-4 gap-2">
                    <card-static class="overflow-hidden">
                        <template v-slot:images>
                            <div class="flex flex-col justify-center h-28">
                                <img
                                    src="/images/intro-img.svg"
                                    alt=""
                                    class="object-cover h-20"
                                />
                            </div>
                        </template>
                        <template v-slot:desc>
                            <div
                                class="h-28 flex flex-col justify-center text-white"
                            >
                                <h1>Welcome</h1>
                                <p>Introduction</p>
                            </div>
                        </template>
                    </card-static>
                </div>
            </section>
        </admin>
    </div>
</template>

<script>
import Admin from "../layouts/Admin.vue";
import SuccesNotifications from "../components/Notifications/SuccesNotifications.vue";
import ConfirmAlert from "../components/Alert/ConfirmAlert.vue";
import CardStatic from "../components/Cards/CardStatic.vue";

export default {
    name: "StaticManagement",
    components: {
        Admin,
        SuccesNotifications,
        ConfirmAlert,
        CardStatic,
    },
};
</script>

<style scoped></style>
