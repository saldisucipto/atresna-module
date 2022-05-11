<template>
    <div>
        <div class="h-28 bg-dark-secondary rounded-lg drop-shadow-lg">
            <div class="flex mx-2 gap-1">
                <div class="flex justify-center">
                    <slot name="images"></slot>
                </div>
                <div class="">
                    <slot name="desc"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardStatic",
};
</script>

<style scoped></style>
