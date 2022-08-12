<script setup>
import { ref } from 'vue'
import { Head, Link } from "@inertiajs/inertia-vue3";
import feather from "feather-icons";
import { Inertia } from "@inertiajs/inertia";

defineProps({
    data: Object,
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
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="p-5 overflow-x-auto">
                    <table class="min-w-full border">
                        <thead class="border">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Pesan
                                </th>
                                <th scope="col" class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 border whitespace-nowrap">
                                    1
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 border whitespace-nowrap">
                                    Hendrik
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 border whitespace-nowrap">
                                    hendrik@mail.com
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 border whitespace-nowrap">
                                    {{ truncate('Perlu peningkatan di sisi user interface agar mudah digunakan') }}
                                </td>
                                <td class="px-6 py-4 text-sm font-light text-gray-900 border whitespace-nowrap">
                                    <div
                                        class="flex items-center w-3/4 px-3 py-2 mx-auto my-3">
                                        <button type="button" :disabled="loading"
                                            class="px-4 py-2 m-2 text-white transition duration-500 bg-indigo-500 border rounded-md select-none ease hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                            <div v-html="iconSvg('eye')"></div>
                                        </button>
                                        <button type="button" :disabled="loading"
                                            class="px-4 py-2 m-2 text-white transition duration-500 bg-red-500 border rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline"
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
