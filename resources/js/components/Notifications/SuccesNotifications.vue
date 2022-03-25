<template>
    <div class="absolute z-40 top-20 right-10 rounded-xl">
        <div class="max-w-md bg-green-600 text-white rounded-xl">
            <div class="flex justify-start h-18 gap-2 w-80 h-16 mx-4 my-2">
                <div class="my-auto">
                    <div class="text-lg">
                        <i class="fas fa-check-circle"></i> &nbsp <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SuccesNotifications",
};
</script>

<style scoped></style>
