<template>
    <div>
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
                                <i class="fas fa-plus-circle"></i>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TableUser",
};
</script>

<style scoped></style>
