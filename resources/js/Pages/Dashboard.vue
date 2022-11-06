<script setup>
import { ref } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from "@inertiajs/inertia-vue3";
import dayjs from 'dayjs'
import { Inertia } from '@inertiajs/inertia'

defineProps({
    data: Object
});

function formatDate(date) {
    const formatted = dayjs(date)
    return formatted.isValid() ? formatted.format('DD/M/YYYY') : '-'
}

function deleteItem(id) {
    if (typeof id == 'undefined' || id == null || id == '') return
    Inertia.delete(route('survey.destroy', id), {
        onBefore: () => confirm('Yakin ingin dihapus?'),
        onStart: () => loading.value = true,
        onFinish: () => loading.value = false,
        onError: () => alert('idak dapat menghapus entri. Silahkan coba kembali lagi.')
    })
}

const loading = ref(false)

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <Head title="Survei" />

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="p-5 overflow-hidden">
                                    <h4 class="font-bold">Hasil Index</h4>
                                    <table class="min-w-full text-center border">
                                        <thead class="border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 border-r">
                                                    #
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 border-r">
                                                    Tanggal Pengisian
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 border-r">
                                                    Nama
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 border-r">
                                                    Fakultas/Jurusan
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 border-r">
                                                    Email
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-gray-900">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-b"
                                                v-for="(i, index) in data?.entries"
                                                :key="i.id">
                                                <td
                                                    class="px-6 py-4 text-sm font-medium text-gray-900 border-r whitespace-nowrap">
                                                    {{ index + 1 }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 border-r whitespace-nowrap">
                                                    {{ formatDate(i?.created_at) }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 border-r whitespace-nowrap">
                                                    {{ i?.answers[0]?.value }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 border-r whitespace-nowrap">
                                                    {{ i?.answers[1]?.value }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 border-r whitespace-nowrap">
                                                    {{ i?.answers[2]?.value }}
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                    <a :href="route('laporan', i.id)"
                                                       :disabled="loading"
                                                       target="_blank"
                                                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-5 h-5 mr-2"
                                                             fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path fill="none"
                                                                  d="M0 0h24v24H0z" />
                                                            <path
                                                                  d="M11 7h2v10h-2V7zm4 4h2v6h-2v-6zm-8 2h2v4H7v-4zm8-9H5v16h14V8h-4V4zM3 2.992C3 2.444 3.447 2 3.999 2H16l5 5v13.993A1 1 0 0 1 20.007 22H3.993A1 1 0 0 1 3 21.008V2.992z" />
                                                        </svg>
                                                    </a>

                                                    <button :disabled="loading"
                                                            @click.prevent="deleteItem(i.id)"
                                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="w-5 h-5 mr-2"
                                                             fill="none"
                                                             viewBox="0 0 24 24"
                                                             stroke="currentColor">
                                                            <path stroke-linecap="round"
                                                                  stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
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

<style scoped>
.bg-gray-100 {
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
</style>
