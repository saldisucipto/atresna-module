<template>
    <div>
        <!-- Modal -->
        <div class="fixed z-10 inset-0 overflow-y-auto">
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
                        <!-- CONFIRM ALERT -->
                        <div class="mx-auto mt-3">
                            <div class="flex flex-col justify-center gap-2">
                                <div class="text-center">
                                    <i
                                        class="fas fa-trash-alt fa-3x text-red-400"
                                    ></i>
                                </div>
                                <div
                                    class="text-center text-gray-800 font-semibold"
                                >
                                    <span>Kamu Yakin ?</span>
                                </div>
                                <div
                                    class="text-center text-gray-800 font-semibold"
                                >
                                    <span>Data ini Akan Dihapus :</span>
                                </div>
                                <div class="text-center text-red-500 font-bold">
                                    <span>
                                        <slot></slot>
                                    </span>
                                </div>
                                <hr />
                                <div class="flex justify-between">
                                    <div>
                                        <button
                                            @click="confirmDelete"
                                            class="py-1 px-6 bg-blue-400 text-white rounded-lg"
                                        >
                                            Yes
                                        </button>
                                    </div>
                                    <div>
                                        <button
                                            @click="closeModal"
                                            class="py-1 px-6 bg-red-400 text-white rounded-lg"
                                        >
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    </div>
</template>

<script>
export default {
    name: "ConfirmAlert",
    methods: {
        closeModal() {
            this.$emit("closedButton");
        },
        confirmDelete() {
            this.$emit("deleteConfirm");
        },
    },
};
</script>

<style></style>
