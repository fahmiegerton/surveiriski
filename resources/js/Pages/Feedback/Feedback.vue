<script setup>
import { ref } from 'vue'
import { Head, Link } from "@inertiajs/inertia-vue3";
import feather from "feather-icons";
import { Inertia } from "@inertiajs/inertia";

defineProps({
    data: Array,
});

const iconSvg = (icon) => {
    return feather.icons[icon].toSvg();
};

const loading = ref(false)

const deleteFeedback = (id) => {
    Inertia.delete(route('feedback.destroy', id), {
        onBefore: () => confirm('Yakin ingin dihapus?'),
        onStart: () => loading.value = true,
        onFinish: () => loading.value = false
    })
}

function truncate(input) {
    if (input.length > 66) {
        return input.substring(0, 66) + '...';
    }
    return input;
};
</script>

<template>

    <Head title="Umpan Balik" />

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full border">
                        <thead class="border">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Nama
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Email
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Pesan
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border">
                                <td class="px-6 border py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    1
                                </td>
                                <td class="text-sm border text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    Hendrik
                                </td>
                                <td class="text-sm border text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    hendrik@mail.com
                                </td>
                                <td class="text-sm border text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ truncate('Perlu peningkatan di sisi user interface agar mudah digunakan') }}
                                </td>
                                <td class="text-sm border text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <div
                                        class="bg-white px-6 py-4 my-3 w-3/4 mx-auto shadow rounded-md flex items-center">
                                        <button type="button" :disabled="loading"
                                            class="border bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                            <div v-html="iconSvg('eye')"></div>
                                        </button>
                                        <button type="button" :disabled="loading"
                                            class="border bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                            @click.prevent="deleteFeedback(1)">
                                            <div v-html="iconSvg('trash-2')"></div>
                                        </button>
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
