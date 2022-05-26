<template>
    <div>
        <div class="h-64 bg-dark-secondary rounded-lg drop-shadow-lg">
            <div class="flex flex-col justify-between gap-4">
                <div class="flex justify-center">
                    <slot name="images"></slot>
                </div>
                <div class="mx-3">
                    <slot name="desc"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardLarge",
};
</script>

<style lang="scss" scoped></style>
