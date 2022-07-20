<template>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                <th
                                    v-for="th in tableHeader"
                                    :key="th"
                                    scope="col"
                                    class="bg-dark-secondary text-white text-sm font-medium px-6 py-4 text-left"
                                >
                                    <div class="">
                                        {{ th.text }}
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="td in tableData"
                                :key="td"
                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
                            >
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                >
                                    {{ td.slugs }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                >
                                    {{ td.nama_produk }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                >
                                    {{ td.kategori_product.nama_kat_produk }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                >
                                    {{ td.link_produk_tokopedia }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                                >
                                    <div class="flex justify-between">
                                        <div>
                                            <button
                                                class="text-blue-500 drop-shadow-lg"
                                            >
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="text-yellow-400">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <button class="text-red-400">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TableBase",
    props: {
        column: Array,
        entries: Array,
    },
    computed: {
        tableHeader() {
            return this.column || [];
        },
        tableData() {
            return this.entries || [];
        },
    },
};
</script>

<style scoped></style>
