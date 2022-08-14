<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref } from 'vue'
import { Head, Link } from "@inertiajs/inertia-vue3";
import feather from "feather-icons";
import dayjs from 'dayjs'
import { Inertia } from '@inertiajs/inertia'

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
        onFinish: () => loading.value = false,
        onError: () => alert('idak dapat menghapus entri. Silahkan coba kembali lagi.')
    })
}

function truncate(input) {
    if (input.length > 66) {
        return input.substring(0, 66) + '...';
    }
    return input;
};

function formatDate(date) {
    const formatted = dayjs(date)
    return formatted.isValid() ? formatted.format('DD/M/YYYY') : '-'
}
</script>

<template>
    <AppLayout title="Feedback">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Feedback
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                    <Head title="Umpan Balik" />

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="p-5 overflow-x-auto">
                                    <table class="min-w-full border">
                                        <thead class="border">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900 border">
                                                    #
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900 border">
                                                    Nama
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900 border">
                                                    Email
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900 border">
                                                    Pesan
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900 border">
                                                    Tanggal Isi
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900 border">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border"
                                                v-for="(item, i) in data"
                                                :key="item.id">
                                                <td
                                                    class="px-3 py-2 text-sm font-medium text-center text-gray-900 border whitespace-nowrap">
                                                    {{ i + 1 }}
                                                </td>
                                                <td
                                                    class="px-3 py-2 text-sm font-light text-gray-900 border whitespace-nowrap">
                                                    {{ item.name }}
                                                </td>
                                                <td
                                                    class="px-3 py-2 text-sm font-light text-gray-900 border whitespace-nowrap">
                                                    {{ item.email }}
                                                </td>
                                                <td
                                                    class="px-3 py-2 text-sm font-light text-gray-900 border whitespace-nowrap">
                                                    {{ truncate(item.message) }}
                                                </td>
                                                <td
                                                    class="px-3 py-2 text-sm font-light text-gray-900 border whitespace-nowrap">
                                                    {{ formatDate(item.created_at) }}
                                                </td>
                                                <td class="text-sm font-light text-gray-900 border whitespace-nowrap">
                                                    <div class="flex items-center w-3/4 mx-auto my-3">
                                                        <button type="button"
                                                                :disabled="loading"
                                                                class="px-4 py-2 m-2 text-white transition duration-500 bg-indigo-500 border rounded-md select-none ease hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                                            <div v-html="iconSvg('eye')"></div>
                                                        </button>
                                                        <button type="button"
                                                                :disabled="loading"
                                                                class="px-4 py-2 m-2 text-white transition duration-500 bg-red-500 border rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                                                @click.prevent="deleteFeedback(item.id)">
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
                </div>
            </div>
        </div>
    </AppLayout>
</template>
